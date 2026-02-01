import axios from 'axios';

/**
 * Configuration globale d'Axios
 */
window.axios = axios;

// Indique à Laravel que les requêtes sont de type AJAX (XHR)
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Configuration de l'URL de base pour simplifier vos appels : axios.get('/login')
window.axios.defaults.baseURL = window.Laravel.baseUrl || '';

/**
 * Intercepteur pour le Token Sanctum
 * Récupère automatiquement le token stocké dans le localStorage
 */
window.axios.interceptors.request.use((config) => {
    const token = localStorage.getItem('auth_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

/**
 * Gestion globale des erreurs API
 */
window.axios.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            // Si non autorisé (token expiré), on peut rediriger vers l'accueil
            console.warn('Session expirée ou non autorisée');
            // localStorage.removeItem('auth_token');
            // window.location.href = '/';
        }
        return Promise.reject(error);
    }
);

/**
 * Typage global pour TypeScript
 */
declare global {
    interface Window {
        axios: typeof axios;
        Laravel: {
            csrfToken: string;
            baseUrl: string;
            user: any;
            isAdmin: boolean;
        };
    }
}
