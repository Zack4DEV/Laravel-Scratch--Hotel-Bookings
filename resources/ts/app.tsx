import './bootstrap';
import '../css/app.css';

import React from 'react';
import { createRoot } from 'react-dom/client';
import AppNavigator from '@navigation/AppNavigator';

/**
 * Initialisation de l'application React
 * Se connecte à l'élément <div id="app"></div> dans Application.blade.php
 */
const container = document.getElementById('app');

if (container) {
    const root = createRoot(container);
    
    root.render(
        <React.StrictMode>
            <div className="antialiased text-gray-900">
                <AppNavigator />
            </div>
        </React.StrictMode>
    );
} else {
    console.error("L'élément 'app' est introuvable. Vérifiez votre fichier Application.blade.php.");
}
