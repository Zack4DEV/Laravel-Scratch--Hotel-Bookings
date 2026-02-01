import { MendableClient } from '@mendable/search';

class MendableAI {
    private client: any;

    constructor() {
        this.client = new MendableClient({
            // Vite utilise import.meta.env au lieu de process.env
            apiKey: import.meta.env.VITE_MENDABLE_API_KEY,
        });
    }

    async getRecommendations(userPreferences: object) {
        try {
            const response = await this.client.query({
                query: this.buildRecommendationQuery(userPreferences),
            });
            return response.data;
        } catch (error) {
            console.error('Mendable AI Error:', error);
            return null;
        }
    }

    async getSmartRoomSuggestions(roomData: object) {
        try {
            const response = await this.client.query({
                query: this.buildSmartRoomQuery(roomData),
            });
            return response.data;
        } catch (error) {
            console.error('Smart Room AI Error:', error);
            return null;
        }
    }

    async getVirtualConciergeResponse(userQuery: string) {
        try {
            const response = await this.client.query({
                query: userQuery,
            });
            return response.data;
        } catch (error) {
            console.error('Virtual Concierge Error:', error);
            return null;
        }
    }

    private buildRecommendationQuery(preferences: object): string {
        return `Recommend hotel rooms and services based on: ${JSON.stringify(preferences)}`;
    }

    private buildSmartRoomQuery(roomData: object): string {
        return `Optimize room settings based on: ${JSON.stringify(roomData)}`;
    }
}

export const mendableAI = new MendableAI();
