import React, { useEffect, useState } from 'react';
import { Container, Typography, Grid, TextField, Box } from '@mui/material';
import { charactersAPI } from '../services/api';
import CharacterCard from '../components/learning/CharacterCard';
import LoadingSpinner from '../components/common/LoadingSpinner';

const HiraganaPage = () => {
  const [characters, setCharacters] = useState([]);
  const [filteredCharacters, setFilteredCharacters] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchHiragana = async () => {
      try {
        const response = await charactersAPI.getByType('hiragana');
        setCharacters(response.data.data);
        setFilteredCharacters(response.data.data);
      } catch (error) {
        console.error('Error fetching hiragana:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchHiragana();
  }, []);

  useEffect(() => {
    const filtered = characters.filter(
      (char) =>
        char.character.toLowerCase().includes(searchTerm.toLowerCase()) ||
        char.romaji.toLowerCase().includes(searchTerm.toLowerCase()) ||
        char.meaning.toLowerCase().includes(searchTerm.toLowerCase())
    );
    setFilteredCharacters(filtered);
  }, [searchTerm, characters]);

  if (loading) return <LoadingSpinner />;

  return (
    <Container maxWidth="lg" sx={{ py: 3,  fontFamily: "'M PLUS Rounded 1c', sans-serif", backgroundColor: '#f1f7ee' }} >
      <Typography variant="h4" gutterBottom sx = {{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
        Hiragana Characters
      </Typography>
      
      <TextField
        fullWidth
        label="Search Hiragana"
        variant="outlined"
        value={searchTerm}
        onChange={(e) => setSearchTerm(e.target.value)}
        sx={{ mb: 3,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
      />
      
      <Box sx={{ mb: 2 }}>
        <Typography variant="body2" color="textSecondary" sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
          Showing {filteredCharacters.length} of {characters.length} characters
        </Typography>
      </Box>
      
      <Grid container spacing={2}>
        {filteredCharacters.map((character) => (
          <Grid item xs={6} sm={4} md={3} lg={2} key={character.id}>
            <CharacterCard character={character} />
          </Grid>
        ))}
      </Grid>
    </Container>
  );
};

export default HiraganaPage;