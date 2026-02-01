import React from 'react';

const UserProfile = () => {
  return (
    <div className="bg-gray-50 min-h-full">
      {/* Header Profil */}
      <div className="bg-white p-8 flex flex-col items-center border-b border-gray-200">
        <img 
          src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde" 
          alt="Avatar"
          className="w-24 h-24 rounded-full border-4 border-white shadow-lg"
        />
        <h2 className="text-2xl font-bold text-gray-800 mt-4">John Doe</h2>
        <span className="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold mt-1">
          Membre Gold
        </span>
      </div>

      <div className="max-w-md mx-auto p-4 space-y-6">
        {/* Avantages Membership */}
        <div className="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
          <h3 className="text-lg font-bold text-gray-800 mb-4">Avantages Membre</h3>
          <ul className="space-y-4">
            <li className="flex items-center text-gray-600">
              <span className="text-green-500 mr-3">✅</span> Check-in Prioritaire
            </li>
            <li className="flex items-center text-gray-600">
              <span className="text-green-500 mr-3">✅</span> Late Checkout
            </li>
          </ul>
        </div>

        {/* Préférences */}
        <div className="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
          <h3 className="text-lg font-bold text-gray-800 mb-4">Préférences</h3>
          <div className="space-y-4">
            <div className="flex justify-between items-center py-2 border-b border-gray-50">
              <span className="text-gray-500">Type de Chambre</span>
              <span className="font-medium text-gray-800">Suite</span>
            </div>
            <div className="flex justify-between items-center py-2">
              <span className="text-gray-500">Régime</span>
              <span className="font-medium text-gray-800">Végétarien</span>
            </div>
          </div>
        </div>

        <button className="w-full bg-blue-600 text-white font-bold py-4 rounded-xl shadow-lg active:scale-95 transition-transform">
          Modifier le Profil
        </button>
      </div>
    </div>
  );
};

export default UserProfile;
