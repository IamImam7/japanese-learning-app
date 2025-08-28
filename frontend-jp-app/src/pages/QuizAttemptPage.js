import React, { useState, useEffect, useCallback } from 'react';
import {
  Container,
  Typography,
  Box,
  Button,
  Radio,
  RadioGroup,
  FormControlLabel,
  FormControl,
  FormLabel,
  TextField,
  LinearProgress,
  Paper,
  Alert,
  Chip,
} from '@mui/material';
import { useParams, useNavigate } from 'react-router-dom';
import { quizzesAPI } from '../services/api';
import LoadingSpinner from '../components/common/LoadingSpinner';
import { useDispatch } from 'react-redux';
import { fetchStats, fetchUserProgress } from '../store/slices/progressSlice';

const QuizAttemptPage = () => {
  const { id } = useParams();
  const navigate = useNavigate();
  const dispatch = useDispatch();

  const [quiz, setQuiz] = useState(null);
  const [currentQuestionIndex, setCurrentQuestionIndex] = useState(0);
  const [answers, setAnswers] = useState({});
  const [timeLeft, setTimeLeft] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [submitted, setSubmitted] = useState(false);

  useEffect(() => {
    const fetchQuiz = async () => {
      try {
        const response = await quizzesAPI.getById(id);
        setQuiz(response.data.data);

        if (response.data.data.time_limit) {
          setTimeLeft(response.data.data.time_limit);
        }
      } catch (error) {
        console.error('Error fetching quiz:', error);
        setError('Gagal memuat quiz');
      } finally {
        setLoading(false);
      }
    };

    fetchQuiz();
  }, [id]);

  const handleSubmit = useCallback(async () => {
    try {
      const response = await quizzesAPI.submitAttempt(id, {
        answers,
        time_spent: quiz?.time_limit ? quiz.time_limit - timeLeft : 0,
      });

      setSubmitted(true);

      // Refetch progress data setelah submit quiz
      dispatch(fetchStats());
      dispatch(fetchUserProgress());

      // Kirim hasil ke halaman result
      navigate(`/quiz/${id}/results`, {
        state: {
          result: {
            ...response.data.data,
            quiz: {
              ...response.data.data.quiz,
              questions: quiz.questions,
            },
          },
        },
      });
    } catch (error) {
      console.error('Error submitting quiz:', error);
      setError('Gagal mengirim jawaban');
    }
  }, [id, answers, timeLeft, quiz, dispatch, navigate]);

  // Timer
  useEffect(() => {
    if (timeLeft === null || timeLeft <= 0 || submitted) return;

    const timer = setInterval(() => {
      setTimeLeft((prevTime) => prevTime - 1);
    }, 1000);

    return () => clearInterval(timer);
  }, [timeLeft, submitted]);

  // Auto-submit ketika habis waktu
  useEffect(() => {
    if (timeLeft === 0 && !submitted) {
      handleSubmit();
    }
  }, [timeLeft, submitted, handleSubmit]);

  const handleAnswerChange = (questionId, value) => {
    setAnswers({
      ...answers,
      [questionId]: value,
    });
  };

  const handleNext = () => {
    if (currentQuestionIndex < quiz.questions.length - 1) {
      setCurrentQuestionIndex(currentQuestionIndex + 1);
    }
  };

  const handlePrevious = () => {
    if (currentQuestionIndex > 0) {
      setCurrentQuestionIndex(currentQuestionIndex - 1);
    }
  };

  if (loading) return <LoadingSpinner />;
  if (error) return <Alert severity="error">{error}</Alert>;
  if (!quiz) return <Alert severity="error">Quiz tidak ditemukan</Alert>;

  const currentQuestion = quiz.questions[currentQuestionIndex];
  const progress = ((currentQuestionIndex + 1) / quiz.questions.length) * 100;

  // Styling untuk chip timer
  const getTimerColor = () => {
    if (timeLeft === null) return 'default';
    if (timeLeft < 30) return 'error';
    if (timeLeft < 60) return 'warning';
    return 'success';
  };

  return (
    <Container maxWidth="md" sx={{ py: 4, backgroundColor: '#f1f7ee' }}>
      <Paper
        elevation={4}
        sx={{
          p: 4,
          borderRadius: 3,
          background: 'linear-gradient(145deg, #ffffff, #f9f9fb)',
        }}
      >
        <Typography
          variant="h4"
          gutterBottom
          sx={{ fontWeight: 'bold', color: 'primary.main', textAlign: 'center', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
        >
          {quiz.title}
        </Typography>

        <Box
          sx={{
            display: 'flex',
            justifyContent: 'space-between',
            mb: 2,
            alignItems: 'center',
            fontFamily: "'M PLUS Rounded 1c', sans-serif"
          }}
        >
          <Typography variant="body1" fontWeight="bold" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            Pertanyaan {currentQuestionIndex + 1} / {quiz.questions.length}
          </Typography>

          {timeLeft !== null && (
            <Chip
              label={`Waktu: ${Math.floor(timeLeft / 60)}:${(
                timeLeft % 60
              )
                .toString()
                .padStart(2, '0')}`}
              color={getTimerColor()}
              variant="filled"
              sx={{ fontWeight: 'bold', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
            />
          )}
        </Box>

        <LinearProgress
          variant="determinate"
          value={progress}
          sx={{
            mb: 3,
            height: 12,
            borderRadius: 5,
            fontFamily: "'M PLUS Rounded 1c', sans-serif"
          }}
        />

        {!submitted ? (
          <>
            <Paper
              variant="outlined"
              sx={{
                p: 3,
                mb: 3,
                borderRadius: 2,
                bgcolor: '#fafafa',
              }}
            >
              <FormControl component="fieldset" sx={{ width: '100%' }}>
                <FormLabel component="legend">
                  <Typography variant="h6" gutterBottom fontWeight="bold" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                    {currentQuestion.question_text}
                  </Typography>
                </FormLabel>

                {currentQuestion.question_type === 'multiple_choice' ? (
                  <RadioGroup
                    value={answers[currentQuestion.id] || ''}
                    onChange={(e) =>
                      handleAnswerChange(currentQuestion.id, e.target.value)
                    }
                  >
                    {currentQuestion.options.map((option, index) => (
                      <FormControlLabel
                        key={index}
                        value={option}
                        control={<Radio color="primary" />}
                        label={option}
                        sx={{
                          my: 0.5,
                          p: 1,
                          borderRadius: 2,
                          '&:hover': { bgcolor: '#f0f0f0' },
                        }}
                      />
                    ))}
                  </RadioGroup>
                ) : (
                  <TextField
                    fullWidth
                    variant="outlined"
                    value={answers[currentQuestion.id] || ''}
                    onChange={(e) =>
                      handleAnswerChange(currentQuestion.id, e.target.value)
                    }
                    placeholder="Ketik jawaban Anda di sini..."
                    sx={{ mt: 2, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
                  />
                )}
              </FormControl>
            </Paper>

            <Box sx={{ display: 'flex', justifyContent: 'space-between', mt: 2, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
              <Button
                variant="outlined"
                color="inherit"
                onClick={handlePrevious}
                disabled={currentQuestionIndex === 0}
              >
                Sebelumnya
              </Button>

              {currentQuestionIndex < quiz.questions.length - 1 ? (
                <Button
                  variant="contained"
                  onClick={handleNext}
                  disabled={!answers[currentQuestion.id]}
                >
                  Selanjutnya
                </Button>
              ) : (
                <Button
                  variant="contained"
                  color="success"
                  onClick={handleSubmit}
                  disabled={!answers[currentQuestion.id]}
                >
                  Selesai
                </Button>
              )}
            </Box>
          </>
        ) : (
          <Alert severity="success" sx={{ mt: 3, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            Quiz telah diselesaikan! Mengarahkan ke hasil...
          </Alert>
        )}
      </Paper>
    </Container>
  );
};

export default QuizAttemptPage;
