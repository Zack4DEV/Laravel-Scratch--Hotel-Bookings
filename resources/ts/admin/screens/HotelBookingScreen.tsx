import React, { useState } from 'react';
import HotelHeader from '../components/Hotel/HotelHeader';
import RoomList from '../components/Hotel/RoomList';
import HotelServices from '../components/Hotel/HotelServices';
import SmartRoomControl from '../components/Hotel/SmartRoomControl';
import VirtualConcierge from '../components/Hotel/VirtualConcierge';

const HotelBookingScreen = () => {
  const [activeTab, setActiveTab] = useState('rooms');

  const renderContent = () => {
    switch (activeTab) {
      case 'rooms':
        return (
          <div className="space-y-8 animate-fadeIn">
            <HotelServices />
            <RoomList />
          </div>
        );
      case 'smart-room':
        return (
          <div className="animate-fadeIn">
            <SmartRoomControl />
          </div>
        );
      case 'concierge':
        return (
          <div className="animate-fadeIn">
            <VirtualConcierge />
          </div>
        );
      default:
        return <RoomList />;
    }
  };

  return (
    <div className="min-h-screen bg-white">
      {/* Header avec navigation par onglets */}
      <HotelHeader
        activeTab={activeTab}
        onTabChange={setActiveTab}
      />
      
      {/* Zone de contenu principale avec padding responsive */}
      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {renderContent()}
      </main>
    </div>
  );
};

export default HotelBookingScreen;
