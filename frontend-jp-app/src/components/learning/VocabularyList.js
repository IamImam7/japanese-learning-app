import React, { useState } from 'react';
import {
  Card,
  CardContent,
  Typography,
  Chip,
  Box,
  Grid,
  Modal,
  IconButton,
} from '@mui/material';
import CloseIcon from '@mui/icons-material/Close';
import { useDispatch } from 'react-redux';
import { updateUserProgress } from '../../store/slices/progressSlice';

const VocabularyList = ({ vocabularies }) => {
  const dispatch = useDispatch();
  const [openModal, setOpenModal] = useState(false);
  const [selectedVocab, setSelectedVocab] = useState(null);

  const handleOpenModal = (vocab) => {
    setSelectedVocab(vocab);
    setOpenModal(true);

    // update progress
    dispatch(
      updateUserProgress({
        item_id: vocab.id,
        item_type: 'App\\Models\\Vocabulary',
        mastery_level: 1,
      })
    );
  };

  return (
    <>
      <Grid container spacing={2}>
        {vocabularies.map((vocab) => (
          <Grid item xs={12} sm={6} md={4} key={vocab.id}>
            <Card
              sx={{
                textAlign: 'center',
                cursor: 'pointer',
                borderRadius: 3,
                p: 2,
                transition: 'transform 0.2s, box-shadow 0.2s',
                '&:hover': {
                  transform: 'scale(1.05)',
                  boxShadow: 6,
                },
              }}
              onClick={() => handleOpenModal(vocab)}
            >
              <CardContent>
                <Typography
                  variant="h4"
                  sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", mb: 1  }}
                >
                  {vocab.word}
                </Typography>
                <Chip label={vocab.reading} variant="outlined" size="small" />
              </CardContent>
            </Card>
          </Grid>
        ))}
      </Grid>

      {/* modal detail */}
      {selectedVocab && (
        <Modal
          open={openModal}
          onClose={() => setOpenModal(false)}
          sx={{ display: 'flex', justifyContent: 'center', alignItems: 'center',  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
        >
          <Box
            sx={{
              position: 'relative',
              bgcolor: 'background.paper',
              p: 3,
              borderRadius: 3,
              maxWidth: '600px',
              width: '90%',
              maxHeight: '90vh',
              overflowY: 'auto',
              fontFamily: "'M PLUS Rounded 1c', sans-serif"
            }}
          >
            <IconButton
              onClick={() => setOpenModal(false)}
              sx={{ position: 'absolute', top: 8, right: 8,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
            >
              <CloseIcon />
            </IconButton>

            <Typography
              variant="h3"
              sx={{ textAlign: 'center',  fontFamily: "'M PLUS Rounded 1c', sans-serif", mb: 1 }}
            >
              {selectedVocab.word}
            </Typography>

            <Typography
              variant="h6"
              color="primary"
              sx={{ textAlign: 'center', mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
            >
              {selectedVocab.reading}
            </Typography>

            <Typography variant="body1" sx={{ textAlign: 'center', mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
              {selectedVocab.meaning}
            </Typography>

            {selectedVocab.example_sentence && (
              <Box sx={{ mt: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                <Typography variant="body2" color="text.secondary">
                  Contoh:
                </Typography>
                <Typography variant="body2">{selectedVocab.example_sentence}</Typography>
              </Box>
            )}
          </Box>
        </Modal>
      )}
    </>
  );
};

export default VocabularyList;
