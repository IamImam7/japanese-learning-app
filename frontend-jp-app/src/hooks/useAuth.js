import { useDispatch, useSelector } from 'react-redux';
import { loginUser, registerUser, logout, clearError, fetchUser } from '../store/slices/authSlice';

export const useAuth = () => {
  const dispatch = useDispatch();
  const { user, token, isAuthenticated, loading, error } = useSelector((state) => state.auth);

  return {
    user,
    token,
    isAuthenticated,
    loading,
    error,
    login: (credentials) => dispatch(loginUser(credentials)),
    register: (userData) => dispatch(registerUser(userData)),
    logout: () => dispatch(logout()),
    clearError: () => dispatch(clearError()),
    fetchUser: () => dispatch(fetchUser()),
  };
};