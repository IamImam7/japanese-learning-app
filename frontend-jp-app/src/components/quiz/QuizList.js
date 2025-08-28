import React from 'react';
import { Grid } from '@mui/material';
import QuizCard from './QuizCard';
const QuizList = ({ quizzes }) => {
  return (
    <Grid container spacing={3}>
      {quizzes.map((quiz) => (
        <Grid item xs={12} sm={6} md={4} key={quiz.id}>
          <QuizCard quiz={quiz} />
        </Grid>
      ))}
    </Grid>
  );
};
export default QuizList;