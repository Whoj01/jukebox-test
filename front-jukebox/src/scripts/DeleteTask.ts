import { api, setAuthToken } from '@/libs/axios.ts';
import Cookies from 'js-cookie';

export async function deleteTask(id: number) {
    try {
        const token = Cookies.get('token');

        const { data } = await api.delete(`/task/delete/${id}`, {
            title,
            description,
        }, 
        {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })

        return { data };
    } catch (error) {
        return { error };
    }
}