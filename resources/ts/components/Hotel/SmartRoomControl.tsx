import React, { useState } from 'react';

const SmartRoomControl = () => {
  const [lights, setLights] = useState(false);
  const [temp, setTemp] = useState(22);

  return (
    <div className="p-6 max-w-lg mx-auto">
      <div className="bg-white rounded-3xl shadow-xl p-8 border border-blue-50">
        <h2 className="text-2xl font-black text-blue-900 mb-8 flex items-center gap-2">
          <span>🏠</span> Room Control
        </h2>

        {/* Lumières */}
        <div className="flex items-center justify-between p-4 bg-gray-50 rounded-2xl mb-6">
          <div>
            <p className="font-bold text-gray-800 text-lg">Lights</p>
            <p className="text-sm text-gray-500">{lights ? 'Main Light On' : 'Off'}</p>
          </div>
          <button 
            onClick={() => setLights(!lights)}
            className={`w-14 h-8 rounded-full transition-colors relative ${lights ? 'bg-yellow-400' : 'bg-gray-300'}`}
          >
            <div className={`absolute top-1 w-6 h-6 bg-white rounded-full transition-all ${lights ? 'left-7' : 'left-1'}`}></div>
          </button>
        </div>

        {/* Température */}
        <div className="text-center p-6 bg-blue-50 rounded-2xl">
          <p className="text-sm text-blue-600 font-bold mb-2 uppercase tracking-widest">AC Temperature</p>
          <div className="flex items-center justify-center gap-8">
            <button onClick={() => setTemp(t => t-1)} className="text-3xl text-blue-900 font-bold w-12 h-12 bg-white rounded-full shadow-sm">-</button>
            <span className="text-5xl font-black text-blue-900">{temp}°C</span>
            <button onClick={() => setTemp(t => t+1)} className="text-3xl text-blue-900 font-bold w-12 h-12 bg-white rounded-full shadow-sm">+</button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SmartRoomControl;
