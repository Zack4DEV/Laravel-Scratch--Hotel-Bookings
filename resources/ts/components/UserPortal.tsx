import React, { useState } from 'react';
import HotelBookingScreen from './HotelBookingScreen';
import UserProfile from './UserProfile';
import MyBookings from './MyBookings';
import HotelServices from './Hotel/HotelServices';

const UserPortal = () => {
  const [activeTab, setActiveTab] = useState('Book');

  const tabs = [
    { id: 'Book', label: 'Réserver', icon: '🏨' },
    { id: 'My Bookings', label: 'Mes Réservations', icon: '📅' },
    { id: 'Services', label: 'Services', icon: '🛎️' },
    { id: 'Profile', label: 'Profil', icon: '👤' },
  ];

  return (
    <div className="flex flex-col h-screen bg-gray-50">
      {/* Zone de contenu principale */}
      <main className="flex-1 overflow-y-auto pb-20">
        {activeTab === 'Book' && <HotelBookingScreen />}
        {activeTab === 'My Bookings' && <MyBookings />}
        {activeTab === 'Services' && <HotelServices />}
        {activeTab === 'Profile' && <UserProfile />}
      </main>

      {/* Barre de navigation basse (Style Mobile Web) */}
      <nav className="fixed bottom-0 w-full bg-white border-t border-gray-200 flex justify-around items-center h-16 px-2 shadow-lg z-50">
        {tabs.map((tab) => (
          <button
            key={tab.id}
            onClick={() => setActiveTab(tab.id)}
            className={`flex flex-col items-center justify-center w-full h-full transition-colors ${
              activeTab === tab.id ? 'text-blue-600' : 'text-gray-400 hover:text-gray-600'
            }`}
          >
            <span className="text-xl">{tab.icon}</span>
            <span className="text-[10px] mt-1 font-medium">{tab.label}</span>
          </button>
        ))}
      </nav>
    </div>
  );
};

export default UserPortal;
