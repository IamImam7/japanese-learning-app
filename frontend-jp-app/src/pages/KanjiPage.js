import React, { useEffect, useState } from 'react';
import { Container, Typography, TextField, Box, Grid } from '@mui/material';
import { charactersAPI } from '../services/api';
import CharacterCard from '../components/learning/CharacterCard';
import LoadingSpinner from '../components/common/LoadingSpinner';

const KanjiPage = () => {
  const [characters, setCharacters] = useState([]);
  const [filteredCharacters, setFilteredCharacters] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchKanji = async () => {
      try {
        const response = await charactersAPI.getByType('kanji');
        setCharacters(response.data.data);
        setFilteredCharacters(response.data.data);
      } catch (error) {
        console.error('Error fetching kanji:', error);
      } finally {
        setLoading(false);
      }
    };
    fetchKanji();
  }, []);

  useEffect(() => {
    const filtered = characters.filter(
      (char) =>
        (char.character?.toLowerCase() || '').includes(searchTerm.toLowerCase()) ||
        (char.romaji?.toLowerCase() || '').includes(searchTerm.toLowerCase()) ||
        (char.meaning?.toLowerCase() || '').includes(searchTerm.toLowerCase())
    );
    setFilteredCharacters(filtered);
  }, [searchTerm, characters]);

  if (loading) return <LoadingSpinner />;

  return (
    <Container maxWidth="lg" sx={{ py: 3, backgroundColor: '#f1f7ee' }}>
      <Typography variant="h4" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
        Kanji Characters
      </Typography>
      
      <TextField
        fullWidth
        label="Search Kanji"
        variant="outlined"
        value={searchTerm}
        onChange={(e) => setSearchTerm(e.target.value)}
        sx={{ mb: 3 }}
      />
      
      <Box sx={{ mb: 2 }}>
        <Typography variant="body2" color="textSecondary" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Showing {filteredCharacters.length} of {characters.length} characters
        </Typography>
      </Box>
      
      <Grid container spacing={2}>
        {filteredCharacters.map((character) => (
          <Grid item xs={6} sm={4} md={3} lg={2} key={character.id}>
            <CharacterCard character={character} type="kanji" />
          </Grid>
        ))}
      </Grid>
    </Container>
  );
};

export default KanjiPage;