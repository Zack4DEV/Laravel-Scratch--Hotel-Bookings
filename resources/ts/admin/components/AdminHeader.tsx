import React, { useState } from 'react';

const AdminHeader = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  return (
    <header className="bg-white border-b border-gray-200 px-6 py-3 flex justify-between items-center sticky top-0 z-50">
      <div>
        <h1 className="text-xl font-bold text-gray-800">Hotel Admin Dashboard</h1>
        <p className="text-sm text-gray-500">Welcome back, Admin</p>
      </div>

      <div className="relative">
        <button 
          onClick={() => setIsMenuOpen(!isMenuOpen)}
          className="flex items-center gap-2 focus:outline-none"
        >
          <div className="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow-sm">
            A
          </div>
        </button>

        {isMenuOpen && (
          <div className="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2">
            <a href="/profile" className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
            <a href="/settings" className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
            <hr className="my-1 border-gray-100" />
            <button 
              onClick={() => {/* Logique Logout */}}
              className="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50"
            >
              Logout
            </button>
          </div>
        )}
      </div>
    </header>
  );
};

export default AdminHeader;
