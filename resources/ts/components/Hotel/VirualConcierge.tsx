import React, { useState } from 'react';

const VirtualConcierge = () => {
  const [messages] = useState([
    { id: 1, text: "Hello! I'm your AI Concierge. How can I help you today?", sender: 'ai' },
    { id: 2, text: "I'd like to book a table for dinner.", sender: 'user' }
  ]);

  return (
    <div className="flex flex-col h-[500px] bg-gray-100 rounded-3xl overflow-hidden shadow-inner border border-gray-200">
      <div className="flex-1 p-4 space-y-4 overflow-y-auto">
        {messages.map(m => (
          <div key={m.id} className={`flex ${m.sender === 'user' ? 'justify-end' : 'justify-start'}`}>
            <div className={`max-w-[80%] px-4 py-3 rounded-2xl text-sm ${
              m.sender === 'user' ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 shadow-sm'
            }`}>
              {m.text}
            </div>
          </div>
        ))}
      </div>
      
      <div className="p-4 bg-white border-t flex gap-2">
        <input type="text" placeholder="Type a request..." className="flex-1 bg-gray-100 border-none rounded-xl px-4 focus:ring-2 focus:ring-blue-500" />
        <button className="bg-blue-600 text-white p-3 rounded-xl">➡️</button>
      </div>
    </div>
  );
};

export default VirtualConcierge;
