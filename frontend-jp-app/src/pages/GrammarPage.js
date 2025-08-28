import React, { useEffect, useState } from 'react';
import {
  Container,
  Typography,
  TextField,
  Box,
} from '@mui/material';
import { grammarAPI } from '../services/api';
import GrammarList from '../components/learning/GrammarList';
import LoadingSpinner from '../components/common/LoadingSpinner';

const GrammarPage = () => {
  const [grammarRules, setGrammarRules] = useState([]);
  const [filteredRules, setFilteredRules] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchGrammarRules = async () => {
      try {
        const response = await grammarAPI.getAll();
        setGrammarRules(response.data.data);
        setFilteredRules(response.data.data);
      } catch (error) {
        console.error('Error fetching grammar rules:', error);
      } finally {
        setLoading(false);
      }
    };
    fetchGrammarRules();
  }, []);

  useEffect(() => {
    const filtered = grammarRules.filter(
      (rule) =>
        rule.rule_name?.toLowerCase().includes(searchTerm.toLowerCase()) ||
        rule.explanation?.toLowerCase().includes(searchTerm.toLowerCase()) ||
        rule.example?.toLowerCase().includes(searchTerm.toLowerCase())
    );
    setFilteredRules(filtered);
  }, [searchTerm, grammarRules]);

  if (loading) return <LoadingSpinner />;

  return (
    <Container maxWidth="lg" sx={{ py: 4,  fontFamily: "'M PLUS Rounded 1c', sans-serif", backgroundColor: '#f1f7ee' }}>
      {/* Header */}
      <Typography
        variant="h4"
        gutterBottom
        sx={{ fontWeight: 'bold', mb: 3,  fontFamily: "'M PLUS Rounded 1c', sans-serif" }}
      >
        Grammar Rules
      </Typography>

      {/* Search bar */}
      <Box sx={{ mb: 4 }}>
        <TextField
          fullWidth
          label="Search Grammar"
          variant="outlined"
          value={searchTerm}
          onChange={(e) => setSearchTerm(e.target.value)}
        />
      </Box>

      {/* Grammar list */}
      <GrammarList grammarRules={filteredRules} />
    </Container>
  );
};

export default GrammarPage;
