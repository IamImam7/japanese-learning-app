import React, { useEffect } from 'react';
import {
  Container,
  Typography,
  Grid,
  Paper,
  Box,
  Card,
  CardContent,
  CardActionArea,
  Alert,
  Button
} from '@mui/material';
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  BarElement,
  Title,
  Tooltip,
  Legend,
  ArcElement,
} from 'chart.js';
import { Bar, Doughnut } from 'react-chartjs-2';
import { useDispatch, useSelector } from 'react-redux';
import { useNavigate } from 'react-router-dom';
import { fetchStats, fetchReviewItems } from '../store/slices/progressSlice';
import LoadingSpinner from '../components/common/LoadingSpinner';

// Register ChartJS components
ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  BarElement,
  Title,
  Tooltip,
  Legend,
  ArcElement
);

const Dashboard = () => {
  const dispatch = useDispatch();
  const { stats, loading, reviewItems } = useSelector((state) => state.progress);
  const { user } = useSelector((state) => state.auth);
  const navigate = useNavigate();

  useEffect(() => {
    dispatch(fetchStats());
    dispatch(fetchReviewItems());
  }, [dispatch]);

  if (loading) return <LoadingSpinner />;

  // Ambil jumlah item review
  const itemsDueForReview = reviewItems.length;

  // Chart Mastery (pakai data ProgressPage tapi style Dashboard)
  const masteryData = {
    labels: ['Hiragana', 'Katakana', 'Kanji', 'Vocabulary', 'Grammar'],
    datasets: [
      {
        label: 'Tingkat Penguasaan',
        data: [
          stats?.hiragana_mastery ?? 0,
          stats?.katakana_mastery ?? 0,
          stats?.kanji_mastery ?? 0,
          stats?.vocabulary_mastery ?? 0,
          stats?.grammar_mastery ?? 0,
        ],
        backgroundColor: [
          '#EF4444', // Merah
          '#3B82F6', // Biru
          '#FACC15', // Kuning
          '#10B981', // Hijau
          '#8B5CF6', // Ungu
        ],
        borderRadius: 6,
      },
    ],
  };

  // Chart distribusi (jumlah item)
  const distributionData = {
    labels: ['Hiragana', 'Katakana', 'Kanji', 'Vocabulary', 'Grammar'],
    datasets: [
      {
        label: 'Jumlah Item Dipelajari',
        data: [
          stats?.hiragana_count ?? 0,
          stats?.katakana_count ?? 0,
          stats?.kanji_count ?? 0,
          stats?.vocabulary_count ?? 0,
          stats?.grammar_count ?? 0,
        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)',
          'rgba(54, 162, 235, 0.7)',
          'rgba(255, 206, 86, 0.7)',
          'rgba(75, 192, 192, 0.7)',
          'rgba(153, 102, 255, 0.7)',
        ],
        borderColor: '#fff',
        borderWidth: 2,
      },
    ],
  };

  const learningModules = [
    { title: 'Hiragana', path: '/learn/hiragana', color: '#EF4444', icon: 'あ' },
    { title: 'Katakana', path: '/learn/katakana', color: '#3B82F6', icon: 'ア' },
    { title: 'Kanji', path: '/learn/kanji', color: '#FACC15', icon: '字' },
    { title: 'Vocabulary', path: '/learn/vocabulary', color: '#10B981', icon: '語' },
    { title: 'Grammar', path: '/learn/grammar', color: '#8B5CF6', icon: '文' },
  ];

  return (
    <Container 
      maxWidth="lg" 
      sx={{ 
        py: 4,
        backgroundColor: '#f1f7ee',
        minHeight: '100vh'
      }}
    >
     <Typography 
  variant="h4" 
  fontWeight={700} 
  gutterBottom 
  color="primary"
  sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }} 
>
        Welcome back, {user?.data?.name}!
      </Typography>

      {/* Notifikasi item review */}
      {itemsDueForReview > 0 && (
        <Alert 
          severity="info" 
          sx={{ 
            mb: 3, 
            borderRadius: 2,
            backgroundColor: '#DBEAFE',
            color: '#1E3A8A',
            display: 'flex',
            alignItems: 'center'
          }}
        >
          Anda memiliki {itemsDueForReview} item yang perlu direview hari ini.
          <Button 
            variant="contained"
            size="small" 
            onClick={() => navigate('/review')}
            sx={{ ml: 2, backgroundColor: '#EF4444', '&:hover': { backgroundColor: '#DC2626' } }}
          >
            Mulai Review
          </Button>
        </Alert>
      )}

      {/* Statistik singkat */}
      <Grid container spacing={3} sx={{ mb: 4 }}>
        {[
          { label: "Jumblah Karakter Yang Dipelajari", value: stats?.total_characters_learned || 0 },
          { label: "Jumblah Kosakata Yang dipelajari", value: stats?.total_vocabulary_learned || 0 },
          { label: "Jumblah Partikel yang Dipelajari", value: stats?.total_grammar_rules_learned || 0 },
          { label: "Level Penguasaan", value: `${stats?.average_mastery_level?.toFixed(1) || 0}/5` },
        ].map((stat) => (
          <Grid item xs={12} sm={6} md={3} key={stat.label}>
            <Paper 
              sx={{ 
                p: 3, 
                textAlign: 'center',
                borderRadius: 3,
                boxShadow: '0 2px 8px rgba(0,0,0,0.05)',
                backgroundColor: 'white'
              }}
            >
              <Typography variant="subtitle2" sx={{ color: 'text.secondary', mb: 1 }}>
                {stat.label}
              </Typography>
              <Typography variant="h4" sx={{ fontWeight: 700, color: '#1E3A8A' }}>
                {stat.value}
              </Typography>
            </Paper>
          </Grid>
        ))}
      </Grid>

      {/* Grafik */}
      <Grid container spacing={3} sx={{ mb: 4 }}>
        <Grid item xs={12} md={6}>
          <Paper sx={{ p: 3, borderRadius: 3, boxShadow: '0 2px 8px rgba(0,0,0,0.05)' }}>
            <Typography variant="h6" gutterBottom fontWeight={600}>
              Grafik Progress
            </Typography>
            <Box sx={{ height: 300 }}>
              <Bar
                data={masteryData}
                options={{
                  responsive: true,
                  maintainAspectRatio: false,
                  scales: {
                    y: { beginAtZero: true, max: 5 },
                  },
                  plugins: {
                    legend: { display: false },
                    tooltip: { mode: 'index', intersect: false },
                  },
                }}
              />
            </Box>
          </Paper>
        </Grid>
        <Grid item xs={12} md={6}>
          <Paper sx={{ p: 3, borderRadius: 3, boxShadow: '0 2px 8px rgba(0,0,0,0.05)',  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            <Typography variant="h6" gutterBottom fontWeight={600}>
             Grafik Pembelajaran
            </Typography>
            <Box sx={{ height: 300 }}>
              <Doughnut
                data={distributionData}
                options={{
                  responsive: true,
                  maintainAspectRatio: false,
                  plugins: {
                    legend: { position: 'bottom' },
                  },
                }}
              />
            </Box>
          </Paper>
        </Grid>
      </Grid>

      {/* Module */}
      <Typography variant="h5" gutterBottom fontWeight={600} sx= {{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
        Lanjutkan Pembelajaran
      </Typography>

      <Grid container spacing={3}>
        {learningModules.map((module) => (
          <Grid item xs={12} sm={6} md={4} key={module.title}>
            <Card 
              sx={{ 
                borderRadius: 3, 
                boxShadow: '0 2px 8px rgba(0,0,0,0.05)',
                transition: '0.3s',
                '&:hover': { transform: 'translateY(-4px)', boxShadow: '0 4px 12px rgba(0,0,0,0.1)' }
              }}
            >
              <CardActionArea onClick={() => navigate(module.path)}>
                <CardContent sx={{ textAlign: 'center', py: 4 }}>
                  <Box
                      sx={{
                        width: 60,
                        height: 60,
                        borderRadius: '50%',
                        backgroundColor: module.color,
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        margin: '0 auto 16px',
                        color: 'white',
                        fontSize: '1.8rem',
                        fontWeight: 600,
                        fontFamily: "'M PLUS Rounded 1c', sans-serif", 
                      }}
                    >
                      {module.icon}
                    </Box>
                  <Typography 
                    variant="h6" 
                    fontWeight={600} 
                    sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
                  >
                    {module.title}
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

export default Dashboard;
