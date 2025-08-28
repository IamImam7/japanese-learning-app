import React, { useEffect, useState } from 'react';
import {
  Container,
  Typography,
  TextField,
  Box,
} from '@mui/material';
import { vocabulariesAPI } from '../services/api';
import VocabularyList from '../components/learning/VocabularyList';
import LoadingSpinner from '../components/common/LoadingSpinner';

const VocabularyPage = () => {
  const [vocabularies, setVocabularies] = useState([]);
  const [filteredVocabularies, setFilteredVocabularies] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchVocabularies = async () => {
      try {
        const response = await vocabulariesAPI.getAll();
        setVocabularies(response.data.data);
        setFilteredVocabularies(response.data.data);
      } catch (error) {
        console.error('Error fetching vocabularies:', error);
      } finally {
        setLoading(false);
      }
    };
    fetchVocabularies();
  }, []);

  useEffect(() => {
    const filtered = vocabularies.filter(
      (vocab) =>
        vocab.word.toLowerCase().includes(searchTerm.toLowerCase()) ||
        vocab.reading.toLowerCase().includes(searchTerm.toLowerCase()) ||
        vocab.meaning.toLowerCase().includes(searchTerm.toLowerCase())
    );
    setFilteredVocabularies(filtered);
  }, [searchTerm, vocabularies]);

  if (loading) return <LoadingSpinner />;

  return (
    <Container maxWidth="lg" sx={{ py: 4, backgroundColor: '#f1f7ee' }}>
      {/* Header */}
      <Typography
        variant="h4"
        gutterBottom
        sx={{ fontWeight: 'bold', mb: 3,  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}
      >
        Vocabulary
      </Typography>

      {/* Search bar */}
      <Box sx={{ mb: 4 }}>
        <TextField
          fullWidth
          label="Search Vocabulary"
          variant="outlined"
          value={searchTerm}
          onChange={(e) => setSearchTerm(e.target.value)}
        />
      </Box>

      {/* List of vocab as cards */}
      <VocabularyList vocabularies={filteredVocabularies} />
    </Container>
  );
};

export default VocabularyPage;
