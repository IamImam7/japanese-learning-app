import React from 'react';
import {
  AppBar,
  Toolbar,
  Typography,
  Button,
  Box,
  Menu,
  MenuItem,
} from '@mui/material';
import { useAuth } from '../../hooks/useAuth';
import { useNavigate } from 'react-router-dom';

const Header = () => {
  const { user, logout } = useAuth();
  const navigate = useNavigate();
  const [anchorEl, setAnchorEl] = React.useState(null);

  const handleMenu = (event) => {
    setAnchorEl(event.currentTarget);
  };

  const handleClose = () => {
    setAnchorEl(null);
  };

  const handleLogout = () => {
    logout();
    navigate('/auth');
    handleClose();
  };

  return (
    <AppBar 
      position="static" 
      sx={{ 
        backgroundColor: '#1E3A8A', // navy gelap
        boxShadow: '0 2px 6px rgba(0,0,0,0.1)' ,
        fontFamily: "'M PLUS Rounded 1c', sans-serif",
      }}
    >
      <Toolbar>
        <Typography 
          variant="h6" 
          component="div" 
          sx={{ 
            flexGrow: 1, 
            cursor: 'pointer',
            fontWeight: 600,
            letterSpacing: '0.5px'
          }}
          onClick={() => navigate('/dashboard')}
        >
          Japanese Learning App
        </Typography>
        
        <Box sx={{ display: 'flex', alignItems: 'center', gap: 2 }}>
          <Button 
            sx={{ color: 'white', '&:hover': { color: '#EF4444' } }} 
            onClick={() => navigate('/learn')}
          >
            Learn
          </Button>
          <Button 
            sx={{ color: 'white', '&:hover': { color: '#EF4444' } }} 
            onClick={() => navigate('/quiz')}
          >
            Quiz
          </Button>
          <Button 
            sx={{ color: 'white', '&:hover': { color: '#EF4444' } }} 
            onClick={() => navigate('/progress')}
          >
            Progress
          </Button>
          <Button 
            sx={{ color: 'white', '&:hover': { color: '#EF4444' } }} 
            onClick={() => navigate('/review')}
          >
            Review
          </Button>

          {/* Nama user ditampilkan di sini */}
          <Button 
            sx={{ 
              color: 'white', 
              fontWeight: 500, 
              '&:hover': { color: '#EF4444' } 
            }} 
            onClick={handleMenu}
          >
            {user?.name || "User"}
          </Button>

          <Menu
            id="menu-appbar"
            anchorEl={anchorEl}
            anchorOrigin={{
              vertical: 'top',
              horizontal: 'right',
            }}
            keepMounted
            transformOrigin={{
              vertical: 'top',
              horizontal: 'right',
            }}
            open={Boolean(anchorEl)}
            onClose={handleClose}
            PaperProps={{
              sx: {
                mt: 1,
                borderRadius: 2,
                backgroundColor: '#FFFFFF',
              }
            }}
          >
            <MenuItem 
              onClick={handleLogout} 
              sx={{ color: '#EF4444', fontWeight: 500 }}
            >
              Logout
            </MenuItem>
          </Menu>
        </Box>
      </Toolbar>
    </AppBar>
  );
};

export default Header;
