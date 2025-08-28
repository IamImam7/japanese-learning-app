import React from 'react';
import {
  Card,
  CardContent,
  Typography,
  RadioGroup,
  FormControlLabel,
  Radio,
  Button,
} from '@mui/material';
const Question = ({ question, onAnswerSubmit }) => {
  const [selectedAnswer, setSelectedAnswer] = React.useState('');
  const handleSubmit = () => {
    onAnswerSubmit(selectedAnswer);
    setSelectedAnswer('');
  };
  return (
    <Card>
      <CardContent>
        <Typography variant="h6" gutterBottom>
          {question.question_text}
        </Typography>
        <RadioGroup
          value={selectedAnswer}
          onChange={(e) => setSelectedAnswer(e.target.value)}
        >
          {question.options.map((option, index) => (
            <FormControlLabel
              key={index}
              value={option}
              control={<Radio />}
              label={option}
            />
          ))}
        </RadioGroup>
        <Button
          variant="contained"
          onClick={handleSubmit}
          disabled={!selectedAnswer}
          sx={{ mt: 2 }}
        >
          Submit Answer
        </Button>
      </CardContent>
    </Card>
  );
};
export default Question;