import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
import { quizzesAPI } from '../../services/api';

export const fetchQuizzes = createAsyncThunk(
  'quiz/fetchQuizzes',
  async (params, { rejectWithValue }) => {
    try {
      const response = await quizzesAPI.getAll(params);
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

export const fetchQuizById = createAsyncThunk(
  'quiz/fetchQuizById',
  async (quizId, { rejectWithValue }) => {
    try {
      const response = await quizzesAPI.getById(quizId);
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

export const submitQuizAttempt = createAsyncThunk(
  'quiz/submitAttempt',
  async ({ quizId, attemptData }, { rejectWithValue }) => {
    try {
      const response = await quizzesAPI.submitAttempt(quizId, attemptData);
      return response.data.data;
    } catch (error) {
      return rejectWithValue(error.response?.data || error.message);
    }
  }
);

const quizSlice = createSlice({
  name: 'quiz',
  initialState: {
    quizzes: [],
    currentQuiz: null,
    quizResults: [],
    loading: false,
    submitting: false,
    error: null,
  },
  reducers: {
    clearError: (state) => {
      state.error = null;
    },
    clearCurrentQuiz: (state) => {
      state.currentQuiz = null;
    },
    clearQuizResults: (state) => {
      state.quizResults = [];
    },
  },
  extraReducers: (builder) => {
    builder

      .addCase(fetchQuizzes.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchQuizzes.fulfilled, (state, action) => {
        state.loading = false;
        state.quizzes = action.payload;
      })
      .addCase(fetchQuizzes.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })

      .addCase(fetchQuizById.pending, (state) => {
        state.loading = true;
        state.error = null;
      })
      .addCase(fetchQuizById.fulfilled, (state, action) => {
        state.loading = false;
        state.currentQuiz = action.payload;
      })
      .addCase(fetchQuizById.rejected, (state, action) => {
        state.loading = false;
        state.error = action.payload;
      })
      .addCase(submitQuizAttempt.pending, (state) => {
        state.submitting = true;
        state.error = null;
      })
      .addCase(submitQuizAttempt.fulfilled, (state, action) => {
        state.submitting = false;
        state.quizResults.push(action.payload);
      })
      .addCase(submitQuizAttempt.rejected, (state, action) => {
        state.submitting = false;
        state.error = action.payload;
      });
  },
});

export const { clearError, clearCurrentQuiz, clearQuizResults } = quizSlice.actions;
export default quizSlice.reducer;