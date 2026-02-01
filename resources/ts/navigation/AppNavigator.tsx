import React from 'react';
import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';

// Admin Screens & Components
import AdminDashboard from '../admin/screens/AdminDashboard';
import HotelBookingScreen from '../admin/screens/HotelBookingScreen';
import AdminHeader from '../admin/components/AdminHeader';

// User & Hotel Components
import UserPortal from '../components/UserPortal';
import UserProfile from '../components/UserProfile';
import HotelHeader from '../components/Hotel/HotelHeader';
import HotelServices from '../components/Hotel/HotelServices';
import SmartRoomControl from '../components/Hotel/SmartRoomControl';
import VirtualConcierge from '../components/Hotel/VirtualConcierge';

const AppNavigator = () => {
  const isAuthenticated = !!window.Laravel.user;
  const isAdmin = window.Laravel.isAdmin;

  // Composant de protection de route
  const PrivateRoute = ({ children, requireAdmin = false }: { children: JSX.Element, requireAdmin?: boolean }) => {
    if (!isAuthenticated) return <Navigate to="/login" />;
    if (requireAdmin && !isAdmin) return <Navigate to="/" />;
    return children;
  };

  return (
    <Router>
      <Routes>
        {/* Admin Section */}
        <Route path="/admin" element={
          <PrivateRoute requireAdmin>
            <div className="flex flex-col min-h-screen">
              <AdminHeader />
              <AdminDashboard />
            </div>
          </PrivateRoute>
        } />
        
        <Route path="/admin/bookings" element={
          <PrivateRoute requireAdmin>
            <div className="flex flex-col min-h-screen">
              <AdminHeader />
              <HotelBookingScreen />
            </div>
          </PrivateRoute>
        } />

        {/* User Portal Section */}
        <Route path="/portal" element={
          <PrivateRoute>
            <UserPortal />
          </PrivateRoute>
        } />

        <Route path="/profile" element={
          <PrivateRoute>
            <UserProfile />
          </PrivateRoute>
        } />

        {/* Fallback & Redirects */}
        <Route path="/" element={
          isAdmin ? <Navigate to="/admin" /> : <Navigate to="/portal" />
        } />
        
        <Route path="/login" element={<Navigate to="/" />} />
        <Route path="*" element={<Navigate to="/" replace />} />
      </Routes>
    </Router>
  );
};

export default AppNavigator;
