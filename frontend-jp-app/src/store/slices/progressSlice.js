import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import { progressAPI, quizzesAPI } from '../../services/api';

// ========== ASYNC THUNKS ==========

// Stats
export const fetchStats = createAsyncThunk(
  'progress/fetchStats',
  async (_, { rejectWithValue }) => {
    try {
      const response = await progressAPI.getStats();
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

// Progress
export const fetchUserProgress = createAsyncThunk(
  'progress/fetchProgress',
  async (_, { rejectWithValue }) => {
    try {
      const response = await progressAPI.getProgress();
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

export const updateUserProgress = createAsyncThunk(
  'progress/updateProgress',
  async (progressData, { rejectWithValue }) => {
    try {
      const response = await progressAPI.updateProgress(progressData);
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

// Quiz Attempts
export const fetchQuizAttempts = createAsyncThunk(
  'progress/fetchQuizAttempts',
  async (_, { rejectWithValue }) => {
    try {
      const response = await quizzesAPI.getUserAttempts();
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

// Review
export const fetchReviewItems = createAsyncThunk(
  'progress/fetchReviewItems',
  async (_, { rejectWithValue }) => {
    try {
      const response = await progressAPI.getReviewItems();
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

export const updateAfterReview = createAsyncThunk(
  'progress/updateAfterReview',
  async (reviewData, { rejectWithValue }) => {
    try {
      const response = await progressAPI.updateAfterReview(reviewData);
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

// ========== SLICE ==========

const progressSlice = createSlice({
  name: 'progress',
  initialState: {
    stats: null,
    progressItems: [],
    quizAttempts: [],
    reviewItems: [], // Item yang harus direview hari ini
    loading: false,
    updating: false,
    reviewing: false,
    error: null,
  },
  reducers: {
    clearError: (state) => {
      state.error = null;
    },
    removeReviewedItem: (state, action) => {
      state.reviewItems = state.reviewItems.filter(
        item => item.id !== action.payload
      );
    },
  },
  extraReducers: (builder) => {
    builder
      // ===== Stats =====
      .addCase(fetchStats.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchStats.fulfilled, (state, action) => {
        state.loading = false;
        state.stats = action.payload;
      })
      .addCase(fetchStats.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })

      // ===== Progress =====
      .addCase(fetchUserProgress.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchUserProgress.fulfilled, (state, action) => {
        state.loading = false;
        state.progressItems = action.payload;
      })
      .addCase(fetchUserProgress.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })

      .addCase(updateUserProgress.pending, (state) => {
        state.updating = true;
        state.error = null;
      })
      .addCase(updateUserProgress.fulfilled, (state, action) => {
        state.updating = false;
        const index = state.progressItems.findIndex(
          item => item.id === action.payload.id
        );
        if (index !== -1) {
          state.progressItems[index] = action.payload;
        } else {
          state.progressItems.push(action.payload);
        }
        // trigger refetch stats
        state.stats = null;
      })
      .addCase(updateUserProgress.rejected, (state, action) => {
        state.updating = false;
        state.error = action.payload;
      })

      // ===== Quiz Attempts =====
      .addCase(fetchQuizAttempts.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchQuizAttempts.fulfilled, (state, action) => {
        state.loading = false;
        state.quizAttempts = action.payload;
      })
      .addCase(fetchQuizAttempts.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })

      // ===== Review =====
      .addCase(fetchReviewItems.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchReviewItems.fulfilled, (state, action) => {
        state.loading = false;
        state.reviewItems = action.payload;
      })
      .addCase(fetchReviewItems.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })

      .addCase(updateAfterReview.pending, (state) => {
        state.reviewing = true;
        state.error = null;
      })
      .addCase(updateAfterReview.fulfilled, (state, action) => {
        state.reviewing = false;
        const index = state.progressItems.findIndex(
          item => item.id === action.payload.id
        );
        if (index !== -1) {
          state.progressItems[index] = action.payload;
        } else {
          state.progressItems.push(action.payload);
        }
        state.reviewItems = state.reviewItems.filter(
          item => item.id !== action.payload.id
        );
      })
      .addCase(updateAfterReview.rejected, (state, action) => {
        state.reviewing = false;
        state.error = action.payload;
      });
  },
});

export const { clearError, removeReviewedItem } = progressSlice.actions;
export default progressSlice.reducer;
