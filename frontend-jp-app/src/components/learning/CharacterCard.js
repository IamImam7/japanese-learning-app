import React, { useState } from 'react';
import {
  Card,
  CardContent,
  Typography,
  IconButton,
  Box,
  Chip,
  Modal,
} from '@mui/material';
import CloseIcon from '@mui/icons-material/Close';

import { useDispatch } from 'react-redux';
import { updateUserProgress } from '../../store/slices/progressSlice';

// ⚡ Fungsi fallback universal
const getFallbackStrokeOrder = (character, type) => {
  const folderMap = {
    hiragana: 'hiragana',
    katakana: 'katakana',
    kanji: 'kanji',
  };

  const folder = folderMap[type];
  if (!folder) return null;

  return `https://raw.githubusercontent.com/IamImam7/kanji.gif/master/${folder}/gif/150x150/${character}.gif`;
};

const CharacterCard = ({ character, type = 'character' }) => {
  const [openModal, setOpenModal] = useState(false);
  const dispatch = useDispatch();

  // ketika buka detail → update progress
  const handleOpenModal = () => {
    setOpenModal(true);

    let itemType;
    switch (type) {
      case 'hiragana':
      case 'katakana':
      case 'kanji':
        itemType = 'App\\Models\\JapaneseCharacter';
        break;
      case 'vocabulary':
        itemType = 'App\\Models\\Vocabulary';
        break;
      case 'grammar':
        itemType = 'App\\Models\\GrammarRule';
        break;
      default:
        itemType = 'App\\Models\\JapaneseCharacter';
    }
    dispatch(
      updateUserProgress({
        item_id: character.id,
        item_type: itemType,
        mastery_level: 1,
      })
    );
  };

  // examples
  const getExamples = () => {
    if (!character.examples) return [];
    if (Array.isArray(character.examples)) return character.examples;
    try {
      return JSON.parse(character.examples);
    } catch (e) {
      return [];
    }
  };
  const examples = getExamples();

  return (
    <>
      {/* kartu utama → hanya huruf */}
      <Card
        sx={{
          textAlign: 'center',
          cursor: 'pointer',
          borderRadius: 3,
          p: 2,
          fontFamily: "'M PLUS Rounded 1c', sans-serif",
          transition: 'transform 0.2s, box-shadow 0.2s',
          '&:hover': {
            transform: 'scale(1.05)',
            boxShadow: 6,
          },
        }}
        onClick={handleOpenModal}
      >
        <CardContent>
          <Typography
            variant="h2"
            sx={{
              fontFamily: 'Noto Sans JP, sans-serif',
              fontSize: { xs: '3rem', sm: '3.5rem', md: '4rem' },
            }}
          >
            {character.character}
          </Typography>
        </CardContent>
      </Card>

      {/* modal detail */}
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
             fontFamily: "'M PLUS Rounded 1c', sans-serif",
          }}
        >
          {/* tombol close */}
          <IconButton
            onClick={() => setOpenModal(false)}
            sx={{ position: 'absolute', top: 8, right: 8 }}
          >
            <CloseIcon />
          </IconButton>

          {/* huruf */}
          <Typography
            variant="h3"
            sx={{ textAlign: 'center', fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
          >
            {character.character}
          </Typography>

          {/* romaji & arti */}
          <Typography variant="h6" color="primary" sx={{ textAlign: 'center',  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
            {character.romaji}
          </Typography>
          <Typography
            variant="body1"
            color="text.secondary"
            sx={{ textAlign: 'center', mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}
          >
            {character.meaning}
          </Typography>

          {/* metadata */}
          <Box sx={{ display: 'flex', justifyContent: 'center', gap: 1, flexWrap: 'wrap', mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
            {type === 'kanji' && character.stroke_count && (
              <Chip label={`${character.stroke_count} strokes`} size="small" variant="outlined" />
            )}
            {character.jlpt_level && (
              <Chip
                label={`JLPT N${character.jlpt_level}`}
                size="small"
                color="primary"
                variant="outlined"
              />
            )}
          </Box>

          {/* stroke order */}
          {character.stroke_order && (
            <Box sx={{ textAlign: 'center', mb: 2 }}>
              <Typography variant="body2" sx={{ fontWeight: 'bold', mb: 1,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                Urutan Goresan:
              </Typography>
              <img
                src={character.stroke_order}
                alt={`Urutan goresan untuk ${character.character}`}
                style={{
                  maxWidth: '100%',
                  height: 'auto',
                  border: '1px solid #e0e0e0',
                  borderRadius: '8px',
                  backgroundColor: '#fafafa',
                }}
                onError={(e) => {
                  const fallbackUrl = getFallbackStrokeOrder(character.character, type);
                  if (fallbackUrl) {
                    e.target.src = fallbackUrl;
                  } else {
                    e.target.style.display = 'none';
                  }
                }}
              />
            </Box>
          )}

          {/* contoh */}
          {examples.length > 0 && (
            <Box>
              <Typography variant="body2" color="text.secondary" sx={{ mb: 1,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
                Contoh:
              </Typography>
              {examples.map((ex, i) => (
                <Typography key={i} variant="body2" sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                  {typeof ex === 'string'
                    ? ex
                    : `${ex.word || ex.text || ''} ${
                        ex.romaji ? `(${ex.romaji})` : ''
                      } ${ex.meaning ? `- ${ex.meaning}` : ''}`}
                </Typography>
              ))}
            </Box>
          )}
        </Box>
      </Modal>
    </>
  );
};

export default CharacterCard;
