import React, { useEffect } from 'react';
import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import { useSelector, useDispatch } from 'react-redux';
import { ThemeProvider, createTheme } from '@mui/material/styles';
import CssBaseline from '@mui/material/CssBaseline';
import { fetchUser } from './store/slices/authSlice';

// Components
import Header from './components/common/Header';
import Footer from './components/common/Footer';

// Pages
import Dashboard from './pages/Dashboard';
import LearningPage from './pages/LearningPage';
import HiraganaPage from './pages/HiraganaPage';
import KatakanaPage from './pages/KatakanaPage';
import KanjiPage from './pages/KanjiPage';
import VocabularyPage from './pages/VocabularyPage';
import GrammarPage from './pages/GrammarPage';
import QuizPage from './pages/QuizPage';
import ProgressPage from './pages/ProgressPage';
import AuthPage from './pages/AuthPage';
import QuizAdmin from './pages/admin/QuizAdmin';
import QuizAttemptPage from './pages/QuizAttemptPage';
import QuizResultsPage from './pages/QuizResultsPage';
import ReviewPage from './pages/ReviewPage';

const theme = createTheme({
  palette: {
    primary: {
      main: '#3f51b5',
    },
    secondary: {
      main: '#f50057',
    },
  },
});

function App() {
  const dispatch = useDispatch();
  const { isAuthenticated } = useSelector((state) => state.auth);

  useEffect(() => {
    if (localStorage.getItem('token')) {
      dispatch(fetchUser());
    }
  }, [dispatch]);

  return (
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <Router>
        <div className="App" style={{ minHeight: '100vh', display: 'flex', flexDirection: 'column', backgroundColor: '#f1f7ee' }}>
          {isAuthenticated && <Header />}
          <main style={{ flex: 1 }}>
            <Routes>
              <Route 
                path="/auth" 
                element={!isAuthenticated ? <AuthPage /> : <Navigate to="/dashboard" />} 
              />
              <Route 
                path="/dashboard" 
                element={isAuthenticated ? <Dashboard /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/learn" 
                element={isAuthenticated ? <LearningPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/learn/hiragana" 
                element={isAuthenticated ? <HiraganaPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/learn/katakana" 
                element={isAuthenticated ? <KatakanaPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/learn/kanji" 
                element={isAuthenticated ? <KanjiPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/learn/vocabulary" 
                element={isAuthenticated ? <VocabularyPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/learn/grammar" 
                element={isAuthenticated ? <GrammarPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/quiz" 
                element={isAuthenticated ? <QuizPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/progress" 
                element={isAuthenticated ? <ProgressPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/" 
                element={<Navigate to={isAuthenticated ? "/dashboard" : "/auth"} />} 
              />
               <Route 
                path="/admin/quiz-builder" 
                element={isAuthenticated ? <QuizAdmin /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/quiz/:id/attempt" 
                element={isAuthenticated ? <QuizAttemptPage /> : <Navigate to="/auth" />} 
              />
              <Route 
                path="/quiz/:id/results" 
                element={isAuthenticated ? <QuizResultsPage /> : <Navigate to="/auth" />} 
              />
               <Route 
                path="/review" 
                element={isAuthenticated ? <ReviewPage /> : <Navigate to="/auth" />} 
              />
            </Routes>
          </main>
          {isAuthenticated && <Footer />}
        </div>
      </Router>
    </ThemeProvider>
  );
}

export default App;