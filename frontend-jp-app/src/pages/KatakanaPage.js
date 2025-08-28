import React, { useEffect, useState } from 'react';
import { Container, Typography, TextField, Box } from '@mui/material';
import { charactersAPI } from '../services/api';
import CharacterGrid from '../components/learning/CharacterGrid';
import LoadingSpinner from '../components/common/LoadingSpinner';
const KatakanaPage = () => {
  const [characters, setCharacters] = useState([]);
  const [filteredCharacters, setFilteredCharacters] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');
  const [loading, setLoading] = useState(true);
  useEffect(() => {
    const fetchKatakana = async () => {
      try {
        const response = await charactersAPI.getByType('katakana');
        setCharacters(response.data.data);
        setFilteredCharacters(response.data.data);
      } catch (error) {
        console.error('Error fetching katakana:', error);
      } finally {
        setLoading(false);
      }
    };
    fetchKatakana();
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
    <Container maxWidth="lg" sx={{ py: 3, backgroundColor: '#f1f7ee' }}>
      <Typography variant="h4" gutterBottom sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
        Katakana Characters
      </Typography>
      
      <TextField
        fullWidth
        label="Search Katakana"
        variant="outlined"
        value={searchTerm}
        onChange={(e) => setSearchTerm(e.target.value)}
        sx={{ mb: 3, fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
      />
      
      <Box sx={{ mb: 2 }}>
        <Typography variant="body2" color="textSecondary" sx={{ fontFamily: "'M PLUS Rounded 1c', sans-serif" }}>
          Showing {filteredCharacters.length} of {characters.length} characters
        </Typography>
      </Box>
      
      <CharacterGrid characters={filteredCharacters} />
    </Container>
  );
};
export default KatakanaPage;