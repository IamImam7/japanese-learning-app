import React from 'react';
import { useLocation, useParams, useNavigate } from 'react-router-dom';
import {
  Container,
  Typography,
  Paper,
  Box,
  Button,
  Chip,
  Alert,
  Divider,
} from '@mui/material';

const QuizResultsPage = () => {
  const { id } = useParams();
  const location = useLocation();
  const navigate = useNavigate();
  const result = location.state?.result;
  console.log(result)
  if (!result) {
    return (
      <Container maxWidth="md" sx={{ py: 3, fontFamily: "'M PLUS Rounded 1c', sans-serif", backgroundColor: '#f1f7ee' }}>
        <Alert severity="error" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Hasil quiz tidak ditemukan untuk ID {id}. Silakan coba lagi.
        </Alert>
        <Button 
          variant="contained" 
          onClick={() => navigate('/quiz')}
          sx={{ mt: 2, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
        >
          Kembali ke Daftar Quiz
        </Button>
      </Container>
    );
  }

  const questions = result?.quiz?.questions ?? [];
  const answers = result?.answers ?? [];

  return (
    <Container maxWidth="md" sx={{ py: 3 }}>
      <Paper sx={{ p: 4, borderRadius: 3, boxShadow: 4, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
        <Typography variant="h4" gutterBottom fontWeight="bold" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Hasil Quiz
        </Typography>
        
        {/* Ringkasan Skor */}
        <Box sx={{ textAlign: 'center', mb: 4 }}>
          <Chip
            label={`${result.score}/${result.total_questions}`}
            color="primary"
            sx={{ fontSize: '1.5rem', py: 2, px: 3, mb: 2 }}
          />
          <Typography variant="h6" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            Skor: {Math.round((result.score / result.total_questions) * 100)}%
          </Typography>
        </Box>
        
        {/* Detail Jawaban */}
        <Typography variant="h6" gutterBottom fontWeight="bold" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Detail Jawaban
        </Typography>
        
        <Box display="flex" flexDirection="column" gap={2}>
          {questions.length > 0 ? (
            questions.map((question, index) => {
              const userAnswer = answers[question.id] || 'Tidak dijawab';
              const isCorrect = userAnswer === question.correct_answer;

              return (
                <Paper
                  key={question.id}
                  elevation={2}
                  sx={{
                    p: 2,
                    borderRadius: 2,
                    bgcolor: isCorrect ? '#e8f5e9' : '#ffebee',
                    fontFamily: "'M PLUS Rounded 1c', sans-serif" // hijau / merah lembut
                  }}
                >
                  <Typography variant="subtitle1" fontWeight="bold" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                    {`Pertanyaan ${index + 1}: ${question.question_text}`}
                  </Typography>
                  
                  <Divider sx={{ mb: 2 }} />

                  <Typography 
                    variant="body1" 
                    sx={{ color: isCorrect ? 'success.main' : 'error.main', mb: 1, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
                  >
                    Jawaban Anda: {userAnswer}
                  </Typography>
                  <Typography variant="body1" sx={{ mb: 1, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                    Jawaban Benar: <strong>{question.correct_answer}</strong>
                  </Typography>
                  {question.explanation && (
                    <Typography variant="body2" color="text.secondary" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                      Penjelasan: {question.explanation}
                    </Typography>
                  )}
                </Paper>
              );
            })
          ) : (
            <Typography variant="body2" color="text.secondary" sx={{ p: 2, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
              Tidak ada detail pertanyaan tersedia.
            </Typography>
          )}
        </Box>
        
        {/* Tombol Navigasi */}
        <Box sx={{ mt: 4, display: 'flex', gap: 2, flexWrap: 'wrap', justifyContent: 'center', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          <Button 
            variant="contained" 
            size="large"
            onClick={() => navigate(`/quiz/${id}/attempt`)}
          >
            Coba Lagi
          </Button>
          <Button 
            variant="outlined" 
            size="large"
            onClick={() => navigate('/quiz')}
          >
            Kembali ke Daftar Quiz
          </Button>
        </Box>
      </Paper>
    </Container>
  );
};

export default QuizResultsPage;
