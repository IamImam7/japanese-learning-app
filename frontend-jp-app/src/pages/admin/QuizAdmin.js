import React, { useState, useEffect } from 'react';
import {
  Container,
  Typography,
  Paper,
  TextField,
  Button,
  Box,
  MenuItem,
  FormControl,
  InputLabel,
  Select,
  List,
  ListItem,
  ListItemText,
  IconButton,
  Dialog,
  DialogTitle,
  DialogContent,
  DialogActions,
} from '@mui/material';
import {
  Add as AddIcon,
  Delete as DeleteIcon,
} from '@mui/icons-material';
import { quizzesAPI } from '../../services/api';

const QuizAdmin = () => {
  const [quizzes, setQuizzes] = useState([]);
  const [newQuiz, setNewQuiz] = useState({
    title: '',
    type: '',
    difficulty: 1,
    time_limit: null,
  });
  const [newQuestion, setNewQuestion] = useState({
    quiz_id: '',
    question_text: '',
    question_type: 'multiple_choice',
    options: ['', '', '', ''],
    correct_answer: '',
    explanation: '',
  });
  const [questionDialogOpen, setQuestionDialogOpen] = useState(false);

  useEffect(() => {
    fetchQuizzes();
  }, []);

  const fetchQuizzes = async () => {
    try {
      const response = await quizzesAPI.getAllForAdmin();
      setQuizzes(response.data.data);
    } catch (error) {
      console.error('Error fetching quizzes:', error);
    }
  };

  const handleCreateQuiz = async () => {
    try {
      await quizzesAPI.createQuiz(newQuiz);
      setNewQuiz({
        title: '',
        type: '',
        difficulty: 1,
        time_limit: null,
      });
      fetchQuizzes();
    } catch (error) {
      console.error('Error creating quiz:', error);
    }
  };

  const handleCreateQuestion = async () => {
    try {
      await quizzesAPI.createQuestion(newQuestion);
      setNewQuestion({
        quiz_id: '',
        question_text: '',
        question_type: 'multiple_choice',
        options: ['', '', '', ''],
        correct_answer: '',
        explanation: '',
      });
      setQuestionDialogOpen(false);
      fetchQuizzes();
    } catch (error) {
      console.error('Error creating question:', error);
    }
  };

  const handleDeleteQuiz = async (id) => {
    try {
      await quizzesAPI.deleteQuiz(id);
      fetchQuizzes();
    } catch (error) {
      console.error('Error deleting quiz:', error);
    }
  };

  const handleOptionChange = (index, value) => {
    const newOptions = [...newQuestion.options];
    newOptions[index] = value;
    setNewQuestion({ ...newQuestion, options: newOptions });
  };

  return (
    <Container maxWidth="lg" sx={{ py: 3 }}>
      <Typography variant="h4" gutterBottom>
        Quiz Administration
      </Typography>

      {/* Create Quiz Form */}
      <Paper sx={{ p: 3, mb: 3 }}>
        <Typography variant="h6" gutterBottom>
          Create New Quiz
        </Typography>
        <Box sx={{ display: 'flex', flexDirection: 'column', gap: 2 }}>
          <TextField
            label="Quiz Title"
            value={newQuiz.title}
            onChange={(e) => setNewQuiz({ ...newQuiz, title: e.target.value })}
          />
          <FormControl fullWidth>
            <InputLabel>Type</InputLabel>
            <Select
              value={newQuiz.type}
              label="Type"
              onChange={(e) => setNewQuiz({ ...newQuiz, type: e.target.value })}
            >
              <MenuItem value="hiragana">Hiragana</MenuItem>
              <MenuItem value="katakana">Katakana</MenuItem>
              <MenuItem value="kanji">Kanji</MenuItem>
              <MenuItem value="vocabulary">Vocabulary</MenuItem>
              <MenuItem value="grammar">Grammar</MenuItem>
            </Select>
          </FormControl>
          <TextField
            label="Difficulty (1-5)"
            type="number"
            inputProps={{ min: 1, max: 5 }}
            value={newQuiz.difficulty}
            onChange={(e) => setNewQuiz({ ...newQuiz, difficulty: parseInt(e.target.value) })}
          />
          <TextField
            label="Time Limit (seconds)"
            type="number"
            value={newQuiz.time_limit || ''}
            onChange={(e) => setNewQuiz({ ...newQuiz, time_limit: parseInt(e.target.value) || null })}
          />
          <Button
            variant="contained"
            onClick={handleCreateQuiz}
            disabled={!newQuiz.title || !newQuiz.type}
          >
            Create Quiz
          </Button>
        </Box>
      </Paper>

      {/* Quizzes List */}
      <Paper sx={{ p: 3 }}>
        <Typography variant="h6" gutterBottom>
          Existing Quizzes
        </Typography>
        <List>
          {quizzes.map((quiz) => (
            <ListItem
              key={quiz.id}
              secondaryAction={
                <>
                  <IconButton
                    onClick={() => {
                      setNewQuestion({ ...newQuestion, quiz_id: quiz.id });
                      setQuestionDialogOpen(true);
                    }}
                    sx={{ mr: 1 }}
                  >
                    <AddIcon />
                  </IconButton>
                  <IconButton onClick={() => handleDeleteQuiz(quiz.id)}>
                    <DeleteIcon />
                  </IconButton>
                </>
              }
            >
              <ListItemText
                primary={quiz.title}
                secondary={`Type: ${quiz.type} | Difficulty: ${quiz.difficulty} | Questions: ${quiz.questions?.length || 0}`}
              />
            </ListItem>
          ))}
        </List>
      </Paper>

      {/* Add Question Dialog */}
      <Dialog
        open={questionDialogOpen}
        onClose={() => setQuestionDialogOpen(false)}
        maxWidth="md"
        fullWidth
      >
        <DialogTitle>Add Question</DialogTitle>
        <DialogContent>
          <Box sx={{ display: 'flex', flexDirection: 'column', gap: 2, mt: 2 }}>
            <TextField
              label="Question Text"
              multiline
              rows={3}
              fullWidth
              value={newQuestion.question_text}
              onChange={(e) => setNewQuestion({ ...newQuestion, question_text: e.target.value })}
            />
            <FormControl fullWidth>
              <InputLabel>Question Type</InputLabel>
              <Select
                value={newQuestion.question_type}
                label="Question Type"
                onChange={(e) => setNewQuestion({ ...newQuestion, question_type: e.target.value })}
              >
                <MenuItem value="multiple_choice">Multiple Choice</MenuItem>
                <MenuItem value="fill_blank">Fill in the Blank</MenuItem>
              </Select>
            </FormControl>
            
            {newQuestion.question_type === 'multiple_choice' && (
              <>
                {newQuestion.options.map((option, index) => (
                  <TextField
                    key={index}
                    label={`Option ${index + 1}`}
                    value={option}
                    onChange={(e) => handleOptionChange(index, e.target.value)}
                  />
                ))}
              </>
            )}
            
            <TextField
              label="Correct Answer"
              value={newQuestion.correct_answer}
              onChange={(e) => setNewQuestion({ ...newQuestion, correct_answer: e.target.value })}
            />
            <TextField
              label="Explanation (Optional)"
              multiline
              rows={2}
              value={newQuestion.explanation}
              onChange={(e) => setNewQuestion({ ...newQuestion, explanation: e.target.value })}
            />
          </Box>
        </DialogContent>
        <DialogActions>
          <Button onClick={() => setQuestionDialogOpen(false)}>Cancel</Button>
          <Button
            onClick={handleCreateQuestion}
            disabled={!newQuestion.question_text || !newQuestion.correct_answer}
          >
            Add Question
          </Button>
        </DialogActions>
      </Dialog>
    </Container>
  );
};

export default QuizAdmin;