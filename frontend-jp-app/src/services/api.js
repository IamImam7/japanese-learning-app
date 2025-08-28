import axios from 'axios';
import { API_BASE_URL } from '../utils/constants';

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
  },
});

// Request interceptor to add auth token
api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

// Response interceptor to handle errors
api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 401) {
      localStorage.removeItem('token');
      window.location.href = '/auth';
    }
    return Promise.reject(error);
  }
);

export const authAPI = {
  login: (credentials) => api.post('/login', credentials),
  register: (userData) => api.post('/register', userData),
  logout: () => api.post('/logout'),
  getUser: () => api.get('/user'),
};

export const charactersAPI = {
  getAll: (params) => api.get('/characters', { params }),
  getById: (id) => api.get(`/characters/${id}`),
  getByType: (type) => api.get(`/characters/type/${type}`),
};

export const vocabulariesAPI = {
  getAll: (params) => api.get('/vocabularies', { params }),
  getById: (id) => api.get(`/vocabularies/${id}`),
  getByLevel: (level) => api.get(`/vocabularies/level/${level}`),
};

export const grammarAPI = {
  getAll: (params) => api.get('/grammar-rules', { params }),
  getById: (id) => api.get(`/grammar-rules/${id}`),
  getByLevel: (level) => api.get(`/grammar-rules/level/${level}`),
};

export const progressAPI = {
  getProgress: () => api.get('/progress'),
  updateProgress: (data) => api.post('/progress', data),
  getStats: () => api.get('/stats'),
  getReviewItems: () => api.get('/review-items'),
  updateAfterReview: (data) => api.post('/review-progress', data),
};

export const quizzesAPI = {
  getAll: (params) => api.get('/quizzes', { params }),
  getById: (id) => api.get(`/quizzes/${id}`),
  submitAttempt: (id, data) => api.post(`/quizzes/${id}/attempt`, data),
  createQuiz: (quizData) => api.post('/admin/quizzes', quizData),
  createQuestion: (questionData) => api.post('/admin/questions', questionData),
  getAllForAdmin: () => api.get('/admin/quizzes'),
  deleteQuiz: (id) => api.delete(`/admin/quizzes/${id}`),
  getUserAttempts: () => api.get('/quiz-attempts/user'),
};

export default api;