import React from 'react';

const HotelHeader = ({ activeTab, onTabChange }) => {
  const tabs = [
    { id: 'rooms', name: 'Chambres', icon: '🏨' },
    { id: 'smart-room', name: 'Smart Room', icon: '📱' },
    { id: 'concierge', name: 'AI Concierge', icon: '🤖' },
  ];

  return (
    <div className="relative">
      {/* Section Hero */}
      <div 
        className="h-[300px] bg-cover bg-center flex items-center justify-center relative"
        style={{ backgroundImage: 'url("https://images.unsplash.com/photo-1542314831-068cd1dbfeeb")' }}
      >
        <div className="absolute inset-0 bg-black/40"></div>
        <div className="relative z-10 text-center px-4">
          <h1 className="text-4xl font-bold text-white mb-2">Luxury Stay</h1>
          <p className="text-lg text-gray-200 mb-6">Le confort propulsé par l'IA</p>
          <button className="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-full font-bold transition-all shadow-xl">
            Réserver Maintenant
          </button>
        </div>
      </div>

      {/* Navigation Interne (Tabs) */}
      <div className="flex bg-white shadow-sm border-b border-gray-100 overflow-x-auto no-scrollbar">
        {tabs.map((tab) => (
          <button
            key={tab.id}
            onClick={() => onTabChange(tab.id)}
            className={`flex-1 flex items-center justify-center py-4 px-2 whitespace-nowrap transition-all border-b-2 ${
              activeTab === tab.id 
                ? 'border-blue-600 text-blue-600 bg-blue-50/50' 
                : 'border-transparent text-gray-500 hover:bg-gray-50'
            }`}
          >
            <span className="mr-2 text-lg">{tab.icon}</span>
            <span className="font-semibold text-sm">{tab.name}</span>
          </button>
        ))}
      </div>
    </div>
  );
};

export default HotelHeader;
