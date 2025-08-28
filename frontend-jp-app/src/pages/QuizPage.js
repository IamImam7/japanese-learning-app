import React, { useEffect, useState } from 'react';
import { Container, Typography } from '@mui/material';
import { quizzesAPI } from '../services/api';
import QuizList from '../components/quiz/QuizList';
import LoadingSpinner from '../components/common/LoadingSpinner';
const QuizPage = () => {
  const [quizzes, setQuizzes] = useState([]);
  const [loading, setLoading] = useState(true);
  useEffect(() => {
    const fetchQuizzes = async () => {
      try {
        const response = await quizzesAPI.getAll();
        setQuizzes(response.data.data);
      } catch (error) {
        console.error('Error fetching quizzes:', error);
      } finally {
        setLoading(false);
      }
    };
    fetchQuizzes();
  }, []);
  if (loading) return <LoadingSpinner />;
  return (
    <Container maxWidth="lg" sx={{ py: 3, backgroundColor: '#f1f7ee' }}>
      <Typography variant="h4" gutterBottom>
        List Quiz
      </Typography>
      
      <QuizList quizzes={quizzes} />
    </Container>
  );
};
export default QuizPage;