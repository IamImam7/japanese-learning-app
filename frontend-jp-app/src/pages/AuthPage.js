import React, { useState, useEffect } from 'react';
import { 
  Container, 
  Paper, 
  Tabs, 
  Tab, 
  Box,
  useTheme,
  useMediaQuery,
  Typography
} from '@mui/material';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../hooks/useAuth';
import Login from '../components/auth/Login';
import Register from '../components/auth/Register';

const AuthPage = () => {
  const [tabIndex, setTabIndex] = useState(0);
  const { isAuthenticated } = useAuth();
  const navigate = useNavigate();
  const theme = useTheme();
  const isMobile = useMediaQuery(theme.breakpoints.down('sm'));

  useEffect(() => {
    if (isAuthenticated) {
      navigate('/dashboard');
    }
  }, [isAuthenticated, navigate]);

  const handleTabChange = (event, newValue) => {
    setTabIndex(newValue);
  };

  return (
    <Container 
      component="main" 
      maxWidth="sm" 
      sx={{
        minHeight: '100vh',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        backgroundColor: '#f1f7ee',
        py: 4,
        fontFamily: "'M PLUS Rounded 1c', sans-serif",
      }}
    >
      <Paper 
        elevation={6} 
        sx={{ 
          width: '100%', 
          p: isMobile ? 3 : 5,
          borderRadius: 3,
          boxShadow: '0 8px 24px rgba(0,0,0,0.08)'
        }}
      >
        <Box textAlign="center" mb={3}>
          <Typography 
            variant="h4" 
            component="h1" 
            fontWeight="bold" 
            color="primary"
            sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
          >
            Japanese Learning App
          </Typography>
          <Typography variant="body2" color="text.secondary" sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
           Ayo Belajar bahasa Jepang! 
          </Typography>
        </Box>

        <Tabs 
          value={tabIndex} 
          onChange={handleTabChange} 
          centered
          variant="fullWidth"
          textColor="primary"
          indicatorColor="primary"
          sx={{
            borderBottom: `1px solid ${theme.palette.divider}`,
            mb: 2,
            fontFamily: "'M PLUS Rounded 1c', sans-serif",
          }}
        >
          <Tab label="Login" sx={{ fontWeight: 'bold' }} />
          <Tab label="Register" sx={{ fontWeight: 'bold' }} />
        </Tabs>
        
        <Box sx={{ mt: 3 }}>
          {tabIndex === 0 && <Login />}
          {tabIndex === 1 && <Register />}
        </Box>
      </Paper>
    </Container>
  );
};

export default AuthPage;
