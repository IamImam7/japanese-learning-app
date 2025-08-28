import React from 'react';
import {
  Card,
  CardContent,
  CardActions,
  Typography,
  Button,
  Chip,
  Box,
} from '@mui/material';
import { useNavigate } from 'react-router-dom';

const QuizCard = ({ quiz }) => {
  const navigate = useNavigate();

  const handleAttempt = () => {
    navigate(`/quiz/${quiz.id}/attempt`);
  };

  // Fungsi menampilkan tingkat kesulitan
  const renderDifficulty = (difficulty) => {
    return (
      <span>
        {Array.from({ length: 5 }).map((_, i) => (
          <span
            key={i}
            style={{
              color: i < difficulty ? '#fbc02d' : '#e0e0e0',
              fontSize: '1rem',
            }}
          >
            ★
          </span>
        ))}
      </span>
    );
  };

  return (
    <Card
      sx={{
        height: '100%',
        display: 'flex',
        flexDirection: 'column',
        borderRadius: 2,
        boxShadow: 3,
        transition: '0.3s',
        '&:hover': { boxShadow: 6, transform: 'translateY(-3px)' },
      }}
    >
      <CardContent sx={{ flexGrow: 1 }}>
        <Typography
          variant="h6"
          component="h2"
          gutterBottom
          sx={{ fontWeight: 600, color: 'primary.main' }}
        >
          {quiz.title}
        </Typography>

        <Box sx={{ display: 'flex', gap: 1, mb: 1 }}>
          <Chip label={quiz.type} size="small" color="primary" variant="outlined" />
          <Chip
            label={`Level ${quiz.difficulty}`}
            size="small"
            color="secondary"
            variant="outlined"
          />
        </Box>

        <Typography variant="body2" color="text.secondary" sx={{ mb: 1 }}>
          Kesulitan: {renderDifficulty(quiz.difficulty)}
        </Typography>

        <Typography variant="body2" color="text.secondary" sx={{ mb: 1 }}>
          Waktu: {quiz.time_limit ? `${quiz.time_limit} detik` : 'Tidak terbatas'}
        </Typography>

        <Typography variant="body2">
          Jumlah pertanyaan:{' '}
          {quiz.questions_count || quiz.questions?.length || 0}
        </Typography>
      </CardContent>

      <CardActions>
        <Button
          size="small"
          variant="contained"
          onClick={handleAttempt}
          fullWidth
          sx={{ mx: 1, mb: 1, borderRadius: 2, fontWeight: 600 }}
        >
          Kerjakan Quiz
        </Button>
      </CardActions>
    </Card>
  );
};

export default QuizCard;
