import React from 'react';
import AdminHeader from '../components/AdminHeader';
import StatsOverview from '../components/StatsOverview';
import BookingManagement from '../components/BookingManagement';
import StaffManagement from '../components/StaffManagement';
import RevenueAnalytics from '../components/RevenueAnalytics';

const AdminDashboard = () => {
  return (
    <div className="min-h-screen bg-gray-50">
      <AdminHeader />
      
      <main className="max-w-7xl mx-auto py-6">
        {/* Résumé des statistiques */}
        <section className="mb-6">
          <StatsOverview />
        </section>

        {/* Grille principale des modules de gestion */}
        <div className="px-6 grid grid-cols-1 lg:grid-cols-2 gap-8">
          <section className="bg-white rounded-2xl shadow-sm p-4 border border-gray-100">
            <BookingManagement />
          </section>
          
          <div className="space-y-8">
            <section className="bg-white rounded-2xl shadow-sm p-4 border border-gray-100">
              <StaffManagement />
            </section>
            
            <section className="bg-white rounded-2xl shadow-sm p-4 border border-gray-100">
              <RevenueAnalytics />
            </section>
          </div>
        </div>
      </main>
    </div>
  );
};

export default AdminDashboard;
