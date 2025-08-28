import React from 'react';
import { Grid } from '@mui/material';
import CharacterCard from './CharacterCard';

const CharacterGrid = ({ characters }) => {
  return (
    <Grid container spacing={3} alignItems="stretch">
      {characters.map((character) => (
        <Grid item xs={6} sm={4} md={3} lg={2} key={character.id}  sx={{ display: 'flex' }}>
          <CharacterCard character={character} />
        </Grid>
      ))}
    </Grid>
  );
};

export default CharacterGrid;
