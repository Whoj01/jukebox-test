import { api, setAuthToken } from '@/libs/axios.ts';

export async function loginUserLaravel(email: string, password: string) {
    try {
        const { data } = await api.post('/authenticate/login', {
            email,
            password,
        })

        setAuthToken(data.token);

        return { data };
    } catch (error) {
        return { error };
    }
}