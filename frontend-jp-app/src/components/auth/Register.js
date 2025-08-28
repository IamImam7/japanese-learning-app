import React, { useState, useEffect } from 'react';
import {
  TextField,
  Button,
  Box,
  Typography,
  Alert,
  CircularProgress,
} from '@mui/material';
import { useAuth } from '../../hooks/useAuth';

const Register = () => {
  const [userData, setUserData] = useState({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });
  const { register, loading, error, clearError } = useAuth();

  useEffect(() => {
    if (error) {
      const timer = setTimeout(() => {
        clearError();
      }, 5000);
      return () => clearTimeout(timer);
    }
  }, [error, clearError]);

  const handleChange = (e) => {
    setUserData({
      ...userData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (userData.password !== userData.password_confirmation) {
      alert('Passwords do not match');
      return;
    }
    register(userData);
  };

  return (
    <Box component="form" onSubmit={handleSubmit} sx={{ mt: 1 }}>
      <Typography component="h1" variant="h5" sx={{ textAlign: 'center', mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
        Sign Up
      </Typography>
      
      {error && (
        <Alert severity="error" sx={{ mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          {error.message || 'Registration failed. Please try again.'}
        </Alert>
      )}
      
      <TextField
        margin="normal"
        required
        fullWidth
        id="name"
        label="Full Name"
        name="name"
        autoComplete="name"
        autoFocus
        value={userData.name}
        onChange={handleChange}
        disabled={loading}
      />
      <TextField
        margin="normal"
        required
        fullWidth
        id="email"
        label="Email Address"
        name="email"
        autoComplete="email"
        value={userData.email}
        onChange={handleChange}
        disabled={loading}
      />
      <TextField
        margin="normal"
        required
        fullWidth
        name="password"
        label="Password"
        type="password"
        id="password"
        autoComplete="new-password"
        value={userData.password}
        onChange={handleChange}
        disabled={loading}
      />
      <TextField
        margin="normal"
        required
        fullWidth
        name="password_confirmation"
        label="Confirm Password"
        type="password"
        id="password_confirmation"
        autoComplete="new-password"
        value={userData.password_confirmation}
        onChange={handleChange}
        disabled={loading}
      />
      <Button
        type="submit"
        fullWidth
        variant="contained"
        sx={{ mt: 3, mb: 2 }}
        disabled={loading}
      >
        {loading ? <CircularProgress size={24} /> : 'Sign Up'}
      </Button>
    </Box>
  );
};

export default Register;