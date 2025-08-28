import React, { useEffect, useState } from 'react';
import {
  Container,
  Typography,
  Box,
  Button,
  Card,
  CardContent,
  LinearProgress,
  Alert,
  Chip,
  Dialog,
  DialogTitle,
  DialogContent,
  DialogActions,
  Rating,
} from '@mui/material';
import {
  CheckCircle,
  ArrowForward,
  ArrowBack,
} from '@mui/icons-material';
import { useDispatch, useSelector } from 'react-redux';
import { 
  fetchReviewItems, 
  updateAfterReview, 
} from '../store/slices/progressSlice';
import CharacterCard from '../components/learning/CharacterCard';
import LoadingSpinner from '../components/common/LoadingSpinner';
import { useNavigate } from 'react-router-dom';

const ReviewPage = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const { reviewItems, loading, reviewing } = useSelector((state) => state.progress);
  const [currentItemIndex, setCurrentItemIndex] = useState(0);
  const [showAnswer, setShowAnswer] = useState(false);
  const [rating, setRating] = useState(3);
  const [ratingDialogOpen, setRatingDialogOpen] = useState(false);

  useEffect(() => {
    dispatch(fetchReviewItems());
  }, [dispatch]);

  const handleShowAnswer = () => {
    setShowAnswer(true);
  };

  const handleRate = (newRating) => {
    setRating(newRating);
    setRatingDialogOpen(true);
  };

  const confirmRating = () => {
    const currentItem = reviewItems[currentItemIndex];
    
    dispatch(updateAfterReview({
      item_id: currentItem.progressable_id,
      item_type: currentItem.progressable_type,
      rating: rating,
    }));
    
    setRatingDialogOpen(false);
    setShowAnswer(false);
    setRating(3); // Reset rating
    
    // Jika ini bukan item terakhir, lanjut ke item berikutnya
    if (currentItemIndex < reviewItems.length - 1) {
      setCurrentItemIndex(currentItemIndex + 1);
    } else {
      // Jika ini item terakhir, reset ke item pertama
      // Tapi karena items akan dihapus dari state, mungkin perlu fetch ulang
      setCurrentItemIndex(0);
    }
  };

  const skipItem = () => {
    // Jika ini bukan item terakhir, lanjut ke item berikutnya
    if (currentItemIndex < reviewItems.length - 1) {
      setCurrentItemIndex(currentItemIndex + 1);
      setShowAnswer(false);
    } else {
      // Jika ini item terakhir, reset ke item pertama
      setCurrentItemIndex(0);
      setShowAnswer(false);
    }
  };

  if (loading) return <LoadingSpinner />;

  if (reviewItems.length === 0) {
    return (
      <Container maxWidth="md" sx={{ py: 3,backgroundColor: '#f1f7ee' }}>
        <Alert severity="success" sx={{ mb: 2, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Tidak ada item yang perlu direview hari ini!
        </Alert>
        <Typography variant="h5" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Selamat! Anda telah menyelesaikan semua review untuk hari ini.
        </Typography>
        <Typography variant="body1" sx={{ mb: 3, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Teruslah konsisten dalam belajar bahasa Jepang. Review yang teratur akan membantu 
          Anda mengingat materi dengan lebih baik.
        </Typography>
        <Box sx={{ display: 'flex', gap: 2, flexWrap: 'wrap' }}>
          <Button 
            variant="contained" 
            onClick={() => navigate('/learn')}
            size="large"
            sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
          >
            Pelajari Item Baru
          </Button>
          <Button 
            variant="outlined" 
            onClick={() => navigate('/quiz')}
            size="large"
            sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
          >
            Kerjakan Quiz
          </Button>
          <Button 
            variant="outlined" 
            onClick={() => navigate('/progress')}
            size="large"
            sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
          >
            Lihat Progress
          </Button>
        </Box>
      </Container>
    );
  }

  const currentItem = reviewItems[currentItemIndex];
  const progress = ((currentItemIndex + 1) / reviewItems.length) * 100;

  return (
    <Container maxWidth="md" sx={{ py: 3 }}>
      <Typography variant="h4" gutterBottom>
        Review Harian
      </Typography>
      
      <Box sx={{ mb: 3 }}>
        <Typography variant="body1" gutterBottom>
          Item {currentItemIndex + 1} dari {reviewItems.length}
        </Typography>
        <LinearProgress variant="determinate" value={progress} />
        <Chip 
          label={`${reviewItems.length} item perlu direview`} 
          color="primary" 
          variant="outlined" 
          sx={{ mt: 1 }}
        />
      </Box>
      
      <Card sx={{ mb: 3 }}>
        <CardContent>
          {!showAnswer ? (
            <Box>
              <Typography variant="h6" gutterBottom>
                Ingatkah Anda?
              </Typography>
              <Typography variant="body1" sx={{ mb: 2 }}>
                {currentItem.progressable_type.includes('JapaneseCharacter') && 
                  `Apa bunyi dan arti dari karakter "${currentItem.progressable?.character}"?`}
                {currentItem.progressable_type.includes('Vocabulary') && 
                  `Apa arti dari kosakata "${currentItem.progressable?.word}"?`}
                {currentItem.progressable_type.includes('GrammarRule') && 
                  `Apa penjelasan dari tata bahasa "${currentItem.progressable?.rule_name}"?`}
              </Typography>
              
              <Box sx={{ display: 'flex', gap: 1, flexWrap: 'wrap' }}>
                <Button 
                  variant="contained" 
                  onClick={handleShowAnswer}
                  startIcon={<CheckCircle />}
                >
                  Tampilkan Jawaban
                </Button>
                <Button 
                  variant="outlined" 
                  onClick={skipItem}
                >
                  Lewati
                </Button>
              </Box>
            </Box>
          ) : (
            <Box>
              <CharacterCard 
                item={currentItem.progressable} 
                type={
                  currentItem.progressable_type.includes('JapaneseCharacter') ? 
                  currentItem.progressable?.type : 
                  currentItem.progressable_type.includes('Vocabulary') ? 'vocabulary' : 'grammar'
                } 
              />
              
              <Typography variant="h6" gutterBottom sx={{ mt: 2 }}>
                Seberapa mudah Anda mengingatnya?
              </Typography>
              
              <Box sx={{ display: 'flex', flexDirection: 'column', alignItems: 'center', gap: 2 }}>
                <Rating
                  value={rating}
                  onChange={(event, newValue) => {
                    setRating(newValue);
                  }}
                  size="large"
                />
                
                <Box sx={{ display: 'flex', gap: 1, flexWrap: 'wrap' }}>
                  <Button 
                    variant="contained" 
                    onClick={() => handleRate(rating)}
                    disabled={reviewing}
                  >
                    Simpan Rating
                  </Button>
                  <Button 
                    variant="outlined" 
                    onClick={skipItem}
                  >
                    Lewati
                  </Button>
                </Box>
              </Box>
            </Box>
          )}
        </CardContent>
      </Card>
      
      <Box sx={{ display: 'flex', justifyContent: 'space-between' }}>
        <Button
          onClick={() => setCurrentItemIndex(Math.max(0, currentItemIndex - 1))}
          disabled={currentItemIndex === 0}
          startIcon={<ArrowBack />}
        >
          Sebelumnya
        </Button>
        <Button
          onClick={() => setCurrentItemIndex(Math.min(reviewItems.length - 1, currentItemIndex + 1))}
          disabled={currentItemIndex === reviewItems.length - 1}
          endIcon={<ArrowForward />}
        >
          Berikutnya
        </Button>
      </Box>

      {/* Rating Confirmation Dialog */}
      <Dialog
        open={ratingDialogOpen}
        onClose={() => setRatingDialogOpen(false)}
      >
        <DialogTitle>
          Konfirmasi Rating
        </DialogTitle>
        <DialogContent>
          <Typography>
            Anda memberikan rating {rating} bintang. Lanjutkan?
          </Typography>
        </DialogContent>
        <DialogActions>
          <Button onClick={() => setRatingDialogOpen(false)}>
            Batal
          </Button>
          <Button 
            onClick={confirmRating} 
            variant="contained"
            disabled={reviewing}
          >
            Simpan
          </Button>
        </DialogActions>
      </Dialog>
    </Container>
  );
};

export default ReviewPage;