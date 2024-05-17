import { api, setAuthToken  } from '@/libs/axios.ts';

export async function createUserLaravel(email: string, password: string, name: string) {
    try {
        const { data } = await api.post('/authenticate/create', {
            email,
            password,
            name
        })

        setAuthToken(data.token);

        return { data };
    } catch (error) {
        return { error };
    }
}