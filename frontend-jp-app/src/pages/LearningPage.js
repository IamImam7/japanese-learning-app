import React from 'react';
import { 
  Container, 
  Typography, 
  Grid, 
  Card, 
  CardActionArea, 
  CardContent, 
  Box 
} from '@mui/material';
import { useNavigate } from 'react-router-dom';

const LearningPage = () => {
  const navigate = useNavigate();

  const learningModules = [
    {
      title: 'Hiragana',
      description: 'Belajar Huruf Hiragana Dasar',
      path: '/learn/hiragana',
      color: '#EF4444',
      icon: 'あ',
    },
    {
      title: 'Katakana',
      description: 'Belajar Huruf Katakana Dasar',
      path: '/learn/katakana',
      color: '#3B82F6',
      icon: 'ア',
    },
    {
      title: 'Kanji',
      description: 'Belajar Huruf Kanji',
      path: '/learn/kanji',
      color: '#FACC15',
      icon: '字',
    },
    {
      title: 'Vocabulary',
      description: 'KosaKata dalam Bahasa Jepang',
      path: '/learn/vocabulary',
      color: '#10B981',
      icon: '語',
    },
    {
      title: 'Grammar',
      description: 'Belajar Partikel-Partikel dalam bahasa jepang',
      path: '/learn/grammar',
      color: '#8B5CF6',
      icon: '文',
    },
  ];

  return (
    <Container 
      maxWidth="lg" 
      sx={{ 
        py: 5, 
       backgroundColor: '#f1f7ee',
        minHeight: '100vh'
      }}
    >
      <Typography variant="h4" fontWeight={700} gutterBottom color="primary" sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
        Modul Belajar
      </Typography>
      <Typography variant="body1" color="text.secondary" sx={{ mb: 4,  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
        Pilih Modul Untuk Mulai Belajar
      </Typography>
      
      <Grid container spacing={3}>
        {learningModules.map((module) => (
          <Grid item xs={12} sm={6} md={4} key={module.path}>
            <Card 
              sx={{ 
                height: '100%', 
                borderRadius: 3,
                boxShadow: '0 2px 8px rgba(0,0,0,0.05)',
                transition: '0.3s',
                '&:hover': { 
                  transform: 'translateY(-4px)',
                  boxShadow: '0 6px 14px rgba(0,0,0,0.1)' 
                }
              }}
            >
              <CardActionArea 
                onClick={() => navigate(module.path)}
                sx={{ height: '100%' }}
              >
                <CardContent sx={{ textAlign: 'center', py: 5 }}>
                  <Box
                    sx={{
                      width: 70,
                      height: 70,
                      borderRadius: '50%',
                      backgroundColor: module.color,
                      display: 'flex',
                      alignItems: 'center',
                      justifyContent: 'center',
                      margin: '0 auto 20px',
                      color: 'white',
                      fontSize: '2rem',
                      fontWeight: 700,
                      boxShadow: '0 4px 10px rgba(0,0,0,0.1)'
                    }}
                  >
                    {module.icon}
                  </Box>
                  <Typography variant="h6" fontWeight={600} gutterBottom sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                    {module.title}
                  </Typography>
                  <Typography variant="body2" color="text.secondary" sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                    {module.description}
                  </Typography>
                </CardContent>
              </CardActionArea>
            </Card>
          </Grid>
        ))}
      </Grid>
    </Container>
  );
};

export default LearningPage;
