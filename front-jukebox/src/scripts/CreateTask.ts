import { api, setAuthToken } from '@/libs/axios.ts';
import Cookies from 'js-cookie';

export async function createTask(title: string, description: string) {
    try {
        const token = Cookies.get('token');

        const { data } = await api.post('/task/create', {
            title,
            description,
        }, 
        {
            headers: {
                Authorization: `Bearer ${token}`
            }
        },

    )

        return { data };
    } catch (error) {
        return { error };
    }
}