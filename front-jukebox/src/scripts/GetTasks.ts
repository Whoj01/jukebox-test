import { api, setAuthToken } from '@/libs/axios.ts';
import Cookies from 'js-cookie';

export async function getTasks() {
    try {
        const token = Cookies.get('token');

        const { data } = await api.get('/task/read', {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });

        return { data };
    } catch (error) {
        return { error };
    }
}