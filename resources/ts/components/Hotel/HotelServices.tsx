import React from 'react';

const HotelServices = () => {
  const services = [
    { id: 1, name: 'Smart Room Control', icon: '📱', desc: 'Domotique IA', img: 'https://images.unsplash.com' },
    { id: 2, name: 'Virtual Concierge', icon: '🤖', desc: 'Assistance 24/7', img: 'https://images.unsplash.com' },
    { id: 3, name: 'Dining Experience', icon: '🍽️', desc: 'Menus personnalisés', img: 'https://images.unsplash.com' },
  ];

  return (
    <div className="p-6">
      <h2 className="text-2xl font-bold text-gray-800 mb-6">Enhanced Services</h2>
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
        {services.map(service => (
          <div key={service.id} className="group relative overflow-hidden rounded-2xl shadow-md bg-white border border-gray-100">
            <img src={service.img} alt={service.name} className="h-40 w-full object-cover group-hover:scale-105 transition-transform" />
            <div className="p-4">
              <div className="flex items-center gap-2 mb-1">
                <span className="text-xl">{service.icon}</span>
                <h3 className="font-bold text-gray-900">{service.name}</h3>
              </div>
              <p className="text-sm text-gray-500">{service.desc}</p>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default HotelServices;
