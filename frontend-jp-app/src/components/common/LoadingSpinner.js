import React from 'react';
import { CircularProgress, Box, Typography } from '@mui/material';

const LoadingSpinner = ({ size = 40, fullScreen = false }) => {
  return (
    <Box
      display="flex"
      justifyContent="center"
      alignItems="center"
      flexDirection="column"
      minHeight={fullScreen ? "100vh" : "200px"}
      width={fullScreen ? "100vw" : "100%"}
    >
      <CircularProgress 
        size={size} 
        sx={{ color: "#e60012" }} 
      />
      <Typography 
        variant="subtitle1" 
        sx={{ mt: 2, color: "#333", fontWeight: "bold",  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
      >
       しばらくお待ちください...
      </Typography>
      <Typography 
        variant="caption" 
        sx={{ color: "gray" }}
      >
        Mohon tunggu sebentar
      </Typography>
    </Box>
  );
};

export default LoadingSpinner;
