import React from 'react';

const StatsOverview = () => {
  const stats = [
    { title: "Total Bookings", value: "156", icon: "🏨", color: "text-blue-600" },
    { title: "Active Guests", value: "42", icon: "👥", color: "text-green-600" },
    { title: "Revenue", value: "$25,430", icon: "💰", color: "text-yellow-600" },
    { title: "Room Service", value: "12 Active", icon: "🛎️", color: "text-red-600" },
  ];

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
      {stats.map((stat, index) => (
        <div key={index} className="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div className={`text-2xl ${stat.color}`}>{stat.icon}</div>
          <h3 className="text-gray-500 text-sm font-medium mt-2">{stat.title}</h3>
          <p className="text-2xl font-bold text-gray-900">{stat.value}</p>
        </div>
      ))}
    </div>
  );
};

export default StatsOverview;
