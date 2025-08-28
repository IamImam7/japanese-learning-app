import React, { useEffect, useState } from 'react';
import {
  Container,
  Typography,
  Grid,
  Paper,
  Box,
  Card,
  CardContent,
  Tabs,
  Tab,
  Chip,
  List,
  ListItem,
  ListItemText,
  ListItemIcon,
  Divider,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
  Button,
} from '@mui/material';
import { Star, StarBorder, School, Spellcheck, Book, Translate, MenuBook } from '@mui/icons-material';
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
import { Bar, Doughnut, Line } from 'react-chartjs-2';
import { useDispatch, useSelector } from 'react-redux';
import { useNavigate } from 'react-router-dom';
import { fetchStats, fetchUserProgress, fetchQuizAttempts } from '../store/slices/progressSlice';
import LoadingSpinner from '../components/common/LoadingSpinner';

// Register ChartJS
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

const ProgressPage = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const { stats, progressItems = [], quizAttempts = [], loading } = useSelector((state) => state.progress);
  const [tabIndex, setTabIndex] = useState(0);

  useEffect(() => {
    dispatch(fetchStats());
    dispatch(fetchUserProgress());
    dispatch(fetchQuizAttempts());
  }, [dispatch]);

  const handleTabChange = (_e, v) => setTabIndex(v);

  // Group progress
  const groupedProgress = React.useMemo(() => {
    const grouped = { hiragana: [], katakana: [], kanji: [], vocabulary: [], grammar: [] };
    (progressItems || []).forEach((item) => {
      const type = item.progressable_type || '';
      if (type.includes('JapaneseCharacter')) {
        if (item.progressable?.type) grouped[item.progressable.type]?.push(item);
      } else if (type.includes('Vocabulary')) {
        grouped.vocabulary.push(item);
      } else if (type.includes('GrammarRule')) {
        grouped.grammar.push(item);
      }
    });
    return grouped;
  }, [progressItems]);

  const getIconForType = (type) => {
    switch (type) {
      case 'hiragana':
        return <School />;
      case 'katakana':
        return <Spellcheck />;
      case 'kanji':
        return <Book />;
      case 'vocabulary':
        return <Translate />;
      case 'grammar':
        return <MenuBook />;
      default:
        return null;
    }
  };

  // Charts
  const masteryData = {
    labels: ['Hiragana', 'Katakana', 'Kanji', 'Vocabulary', 'Grammar'],
    datasets: [
      {
        label: 'Rata-rata Tingkat Penguasaan',
        data: [
          stats?.hiragana_mastery ?? 0,
          stats?.katakana_mastery ?? 0,
          stats?.kanji_mastery ?? 0,
          stats?.vocabulary_mastery ?? 0,
          stats?.grammar_mastery ?? 0,
        ],
        backgroundColor: 'rgba(25, 118, 210, 0.8)',
        borderRadius: 6,
      },
    ],
  };

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

  const reviewData = {
    labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
    datasets: [
      {
        label: 'Item yang Perlu Diulang',
        data: [12, 19, 8, 15, 10, 5, 14],
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.15)',
        tension: 0.4,
        fill: true,
        pointBackgroundColor: 'rgba(75, 192, 192, 1)',
      },
    ],
  };

  const renderStars = (level) =>
    Array.from({ length: 5 }, (_, i) =>
      i < level ? <Star key={i} color="primary" fontSize="small" /> : <StarBorder key={i} color="disabled" fontSize="small" />
    );

  if (loading) return <LoadingSpinner />;

  return (
    <Container maxWidth="lg" sx={{ py: 6, px: { xs: 2, sm: 3 }, backgroundColor: '#f1f7ee' }}>
      <Typography variant="h4" gutterBottom sx={{ fontWeight: 700, mb: 4,  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
        Progress Belajar 📈
      </Typography>

      <Tabs value={tabIndex} onChange={handleTabChange} sx={{ mb: 4, borderBottom: 1, borderColor: 'divider',  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
        <Tab label="Ringkasan" />
        <Tab label="Detail Progress" />
        <Tab label="Jadwal Review" />
        <Tab label="History Quiz" />
      </Tabs>

      {/* Ringkasan */}
      {tabIndex === 0 && (
        <Grid container spacing={4}>
          <Grid item xs={12} sm={6} md={3}>
            <Card sx={{ borderRadius: 3, boxShadow: 4 }}>
              <CardContent>
                <Typography color="text.secondary" gutterBottom sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>Karakter Dipelajari</Typography>
                <Typography variant="h4" sx={{ fontWeight: 700, color: 'primary.main',  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>{stats?.total_characters_learned ?? 0}</Typography>
              </CardContent>
            </Card>
          </Grid>
          <Grid item xs={12} sm={6} md={3}>
            <Card sx={{ borderRadius: 3, boxShadow: 4 }}>
              <CardContent>
                <Typography color="text.secondary" gutterBottom sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>Kosakata Dipelajari</Typography>
                <Typography variant="h4" sx={{ fontWeight: 700, color: 'secondary.main',  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>{stats?.total_vocabulary_learned ?? 0}</Typography>
              </CardContent>
            </Card>
          </Grid>
          <Grid item xs={12} sm={6} md={3}>
            <Card sx={{ borderRadius: 3, boxShadow: 4 }}>
              <CardContent>
                <Typography color="text.secondary" gutterBottom sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>Tata Bahasa Dipelajari</Typography>
                <Typography variant="h4" sx={{ fontWeight: 700, color: 'info.main',  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>{stats?.total_grammar_rules_learned ?? 0}</Typography>
              </CardContent>
            </Card>
          </Grid>
          <Grid item xs={12} sm={6} md={3}>
            <Card sx={{ borderRadius: 3, boxShadow: 4 }}>
              <CardContent>
                <Typography color="text.secondary" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>Rata-rata Penguasaan</Typography>
                <Typography variant="h4" sx={{ fontWeight: 700, color: 'warning.main', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                  {(stats?.average_mastery_level ?? 0).toFixed(1)}/5
                </Typography>
              </CardContent>
            </Card>
          </Grid>

          <Grid item xs={12} md={6}>
            <Card sx={{ borderRadius: 3, boxShadow: 3, p: 2 }}>
              <Typography variant="h6" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>Tingkat Penguasaan</Typography>
              <Box sx={{ height: 350 }}>
                <Bar
                  data={masteryData}
                  options={{ responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, max: 5 } } }}
                />
              </Box>
            </Card>
          </Grid>

          <Grid item xs={12} md={6}>
            <Card sx={{ borderRadius: 3, boxShadow: 3, p: 2 }}>
              <Typography variant="h6" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>Distribusi Pembelajaran</Typography>
              <Box sx={{ height: 350, display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                <Doughnut data={distributionData} options={{ responsive: true, maintainAspectRatio: false }} />
              </Box>
            </Card>
          </Grid>
        </Grid>
      )}

      {/* Detail Progress */}
      {/* Detail Progress */}
{tabIndex === 1 && (
  <Grid container spacing={4}>
    {Object.entries(groupedProgress).map(([type, items]) => (
      <Grid item xs={12} key={type}>
        <Paper sx={{ borderRadius: 3, boxShadow: 3 }}>
          <Box sx={{ display: 'flex', alignItems: 'center', gap: 1, p: 2 }}>
            {getIconForType(type)}
            <Typography variant="h6" sx={{ textTransform: 'capitalize', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
              {type} ({items.length} item)
            </Typography>
          </Box>
          <Divider />

          {/* Accordion untuk list */}
          <Box sx={{ maxHeight: 400, overflowY: 'auto' }}>
            <List dense>
              {items.length > 0 ? (
                items.map((item, index) => {
                  const last = item.last_reviewed
                    ? new Date(item.last_reviewed).toLocaleDateString()
                    : 'Belum pernah';
                  const next = item.next_review
                    ? new Date(item.next_review).toLocaleDateString()
                    : '-';
                  return (
                    <React.Fragment key={item.id}>
                      <ListItem alignItems="flex-start" sx={{ py: 1.5 }}>
                        <ListItemIcon sx={{ minWidth: 40, mt: 0.5 }}>
                          {renderStars(item.mastery_level)}
                        </ListItemIcon>
                        <ListItemText
                          primary={
                            <Typography variant="subtitle1" sx={{ fontWeight: 'bold', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                              {item.progressable?.character ||
                                item.progressable?.word ||
                                item.progressable?.rule_name ||
                                'Unknown Item'}
                            </Typography>
                          }
                          secondary={
                            <Box component="div" sx={{ color: 'text.secondary', fontSize: '0.875rem', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                              <div>Terakhir dipelajari: {last}</div>
                              <div>Review berikutnya: {next}</div>
                            </Box>
                          }
                        />
                        <Box sx={{ display: 'flex', alignItems: 'center', ml: 2 }}>
                          <Chip
                            label={`Level ${item.mastery_level}`}
                            color={
                              item.mastery_level >= 4
                                ? 'success'
                                : item.mastery_level >= 2
                                ? 'warning'
                                : 'error'
                            }
                            size="small"
                          />
                        </Box>
                      </ListItem>
                      {index < items.length - 1 && <Divider component="li" variant="inset" />}
                    </React.Fragment>
                  );
                })
              ) : (
                <Typography
                  variant="body2"
                  color="text.secondary"
                  sx={{ textAlign: 'center', py: 2, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
                >
                  Belum ada item untuk kategori ini.
                </Typography>
              )}
            </List>
          </Box>
        </Paper>
      </Grid>
    ))}
  </Grid>
)}


      {/* Jadwal Review */}
      {tabIndex === 2 && (
  <Grid container spacing={4}>
    {/* Grafik Jadwal Review */}
    <Grid item xs={12} md={6}>
      <Card sx={{ borderRadius: 3, boxShadow: 3, p: 3 }}>
        <Box sx={{ display: 'flex', alignItems: 'center', gap: 1, mb: 2 }}>
          <Spellcheck color="primary" />
          <Typography variant="h6" sx={{ fontWeight: 600, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            Jadwal Review Mingguan
          </Typography>
        </Box>
        <Box sx={{ height: 350 }}>
          <Line
            data={reviewData}
            options={{
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                y: { beginAtZero: true, ticks: { stepSize: 5 } },
              },
              plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false },
              },
              interaction: { mode: 'nearest', axis: 'x', intersect: false },
            }}
          />
        </Box>
      </Card>
    </Grid>

    {/* List Item yang perlu diulang */}
    <Grid item xs={12} md={6}>
      <Card sx={{ borderRadius: 3, boxShadow: 3, p: 3 }}>
        <Box sx={{ display: 'flex', alignItems: 'center', gap: 1, mb: 2 }}>
          <Book color="error" />
          <Typography variant="h6" sx={{ fontWeight: 600, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            Item yang Perlu Diulang
          </Typography>
        </Box>
        <List>
          {progressItems
            .filter((i) => i.next_review && new Date(i.next_review) <= new Date())
            .slice(0, 5)
            .map((item) => (
              <ListItem
                key={item.id}
                sx={{
                  py: 1.5,
                  borderBottom: '1px solid',
                  borderColor: 'divider',
                  '&:hover': { backgroundColor: 'grey.50' },
                }}
              >
                <ListItemText
                  primary={
                    <Typography sx={{ fontWeight: 500, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                      {item.progressable?.character ||
                        item.progressable?.word ||
                        item.progressable?.rule_name ||
                        'Unknown Item'}
                    </Typography>
                  }
                  secondary={`Review pada: ${new Date(item.next_review).toLocaleDateString()}`}
                />
                <Chip label="Perlu diulang" color="error" size="small" />
              </ListItem>
            ))}
          {progressItems.filter((i) => i.next_review && new Date(i.next_review) <= new Date()).length === 0 && (
            <Box sx={{ textAlign: 'center', py: 4 }}>
              <Typography variant="h6" color="text.secondary" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                📚 Tidak ada item yang perlu diulang
              </Typography>
              <Typography variant="body2" color="text.secondary" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                Kerjakan materi baru untuk melihat jadwal review.
              </Typography>
            </Box>
          )}
        </List>
      </Card>
    </Grid>
  </Grid>
)}

      {/* History Quiz */}
      {tabIndex === 3 && (
  <Grid container spacing={4}>
    <Grid item xs={12}>
      <Card sx={{ borderRadius: 3, boxShadow: 3, p: 2 }}>
        <Typography variant="h6" gutterBottom sx={{ fontWeight: 600, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          History Quiz
        </Typography>
        {quizAttempts.length > 0 ? (
          <TableContainer sx={{ borderRadius: 2, overflow: 'hidden', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            <Table>
              <TableHead>
                <TableRow sx={{backgroundColor: '#1E3A8A', fontFamily: "'M PLUS Rounded 1c', sans-serif"}}>
                  <TableCell sx={{ color: 'white', fontWeight: 'bold' }}>Quiz</TableCell>
                  <TableCell sx={{ color: 'white', fontWeight: 'bold' }}>Tanggal</TableCell>
                  <TableCell sx={{ color: 'white', fontWeight: 'bold' }}>Skor</TableCell>
                  <TableCell sx={{ color: 'white', fontWeight: 'bold' }}>Detail</TableCell>
                </TableRow>
              </TableHead>
              <TableBody>
                {quizAttempts.map((attempt, index) => (
                  <TableRow
                    key={attempt.id}
                    sx={{
                      backgroundColor: index % 2 === 0 ? 'grey.50' : 'white',
                      '&:hover': { backgroundColor: 'grey.100' },
                      fontFamily: "'M PLUS Rounded 1c', sans-serif"
                    }}
                  >
                    <TableCell sx={{ fontWeight: 500 }}>
                      {attempt.quiz?.title || 'Unknown Quiz'}
                    </TableCell>
                    <TableCell>
                      {attempt.completed_at
                        ? new Date(attempt.completed_at).toLocaleDateString()
                        : '-'}
                    </TableCell>
                    <TableCell>
                      <Chip
                        label={
                          attempt.total_questions
                            ? `${attempt.score}/${attempt.total_questions} (${Math.round(
                                (attempt.score / attempt.total_questions) * 100
                              )}%)`
                            : `${attempt.score}`
                        }
                        sx={{ fontWeight: 'bold', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
                        color={
                          attempt.total_questions &&
                          attempt.total_questions > 0 &&
                          attempt.score / attempt.total_questions >= 0.7
                            ? 'success'
                            : attempt.total_questions &&
                              attempt.score / attempt.total_questions >= 0.5
                            ? 'warning'
                            : 'error'
                        }
                      />
                    </TableCell>
                    <TableCell>
                      <Button
                        variant="outlined"
                        size="small"
                        onClick={() =>
                          navigate(`/quiz/${attempt.quiz_id}/results`, {
                            state: { result: attempt },
                          })
                        }
                      >
                        Lihat Detail
                      </Button>
                    </TableCell>
                  </TableRow>
                ))}
              </TableBody>
            </Table>
          </TableContainer>
        ) : (
          <Typography
            variant="body1"
            color="text.secondary"
            sx={{ textAlign: 'center', py: 3, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
          >
            Belum ada history quiz. Silakan kerjakan quiz terlebih dahulu.
          </Typography>
        )}
      </Card>
    </Grid>
  </Grid>
)}
    </Container>
  );
};

export default ProgressPage;