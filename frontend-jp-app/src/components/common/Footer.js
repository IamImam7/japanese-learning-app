import React from 'react';
import { Box, Typography } from '@mui/material';

const Footer = () => {
  return (
    <Box
      component="footer"
      sx={{
        py: 3,
        px: 2,
        mt: 'auto',
        backgroundColor: '#1E3A8A', // navy gelap
        textAlign: 'center',
      }}
    >
      <Typography 
        variant="body2" 
        sx={{ color: '#F3F4F6', fontWeight: 400 ,  fontFamily: "'M PLUS Rounded 1c', sans-serif",}}
      >
        © {new Date().getFullYear()} Japanese Learning App 
      </Typography>
    </Box>
  );
};

export default Footer;
