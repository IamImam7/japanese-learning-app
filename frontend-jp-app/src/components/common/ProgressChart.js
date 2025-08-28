import React from 'react';
import { Doughnut } from 'react-chartjs-2';
import { Card, CardContent, Typography } from '@mui/material';
const ProgressChart = ({ data }) => {
  const chartData = {
    labels: ['Hiragana', 'Katakana', 'Kanji', 'Vocabulary', 'Grammar'],
    datasets: [
      {
        data: data || [10, 10, 10, 10, 10],
        backgroundColor: [
          '#FF6384',
          '#36A2EB',
          '#FFCE56',
          '#4BC0C0',
          '#9966FF'
        ],
        hoverBackgroundColor: [
          '#FF6384',
          '#36A2EB',
          '#FFCE56',
          '#4BC0C0',
          '#9966FF'
        ]
      }
    ]
  };
  return (
    <Card>
      <CardContent>
        <Typography variant="h6" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Progress Distribution
        </Typography>
        <Doughnut data={chartData} />
      </CardContent>
    </Card>
  );
};
export default ProgressChart;