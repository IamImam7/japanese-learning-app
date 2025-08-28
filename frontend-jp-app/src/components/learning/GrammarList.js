import React, { useState } from 'react';
import {
  Card,
  CardContent,
  Typography,
  Grid,
  Box,
  Modal,
  IconButton,
} from '@mui/material';
import CloseIcon from '@mui/icons-material/Close';
import { useDispatch } from 'react-redux';
import { updateUserProgress } from '../../store/slices/progressSlice';

const GrammarList = ({ grammarRules }) => {
  const dispatch = useDispatch();
  const [open, setOpen] = useState(false);
  const [selectedRule, setSelectedRule] = useState(null);

  if (!grammarRules || grammarRules.length === 0) {
    return (
      <Typography variant="body1" color="text.secondary">
        No grammar rules found.
      </Typography>
    );
  }

  const handleOpen = (rule) => {
    setSelectedRule(rule);
    setOpen(true);

    // update progress saat rule dibuka
    dispatch(
      updateUserProgress({
        item_id: rule.id,
        item_type: 'App\\Models\\GrammarRule',
        mastery_level: 1,
      })
    );
  };

  const handleClose = () => {
    setOpen(false);
    setSelectedRule(null);
  };

  return (
    <>
      <Grid container spacing={2}>
        {grammarRules.map((rule) => (
          <Grid item xs={12} sm={6} md={4} key={rule.id}>
            <Card
              onClick={() => handleOpen(rule)}
              sx={{
                cursor: 'pointer',
                borderRadius: 3,
                p: 2,
                transition: 'transform 0.2s, box-shadow 0.2s',
                '&:hover': {
                  transform: 'translateY(-4px)',
                  boxShadow: 4,
                },
              }}
            >
              <CardContent sx={{ textAlign: 'center' }}>
                <Typography variant="h6" fontWeight="bold" sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                  {rule.rule_name}
                </Typography>
              </CardContent>
            </Card>
          </Grid>
        ))}
      </Grid>

      {/* Modal Detail */}
      <Modal
        open={open}
        onClose={handleClose}
        sx={{
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center',
          p: 2,
           fontFamily: "'M PLUS Rounded 1c', sans-serif",
        }}
      >
        <Box
          sx={{
            bgcolor: '#fff',
            borderRadius: 3,
            p: 3,
            maxWidth: '600px',
            width: '100%',
            maxHeight: '90vh',
            overflowY: 'auto',
            position: 'relative',
          }}
        >
          <IconButton
            onClick={handleClose}
            sx={{ position: 'absolute', top: 8, right: 8 }}
          >
            <CloseIcon />
          </IconButton>

          {selectedRule && (
            <>
              <Typography variant="h5" fontWeight="bold" gutterBottom sx={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                {selectedRule.rule_name}
              </Typography>

              {selectedRule.structure && (
                <Typography sx={{ mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                  <strong>Structure:</strong> {selectedRule.structure}
                </Typography>
              )}

              {selectedRule.explanation && (
                <Typography sx={{ mb: 2,  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                  <strong>Explanation:</strong> {selectedRule.explanation}
                </Typography>
              )}

              {selectedRule.example && (
                <Typography sx ={{  fontFamily: "'M PLUS Rounded 1c', sans-serif", }}>
                  <strong>Example:</strong> {selectedRule.example}
                </Typography>
              )}
            </>
          )}
        </Box>
      </Modal>
    </>
  );
};

export default GrammarList;
