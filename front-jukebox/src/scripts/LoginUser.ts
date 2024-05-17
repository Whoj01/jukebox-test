import { getAuth, signInWithEmailAndPassword  } from "firebase/auth";
import { app } from "@/libs/firebase.ts";
import { loginUserLaravel } from "@/scripts/LoginUserLaravel.ts";
import Cookies from 'js-cookie';


export async function loginUser(email: string, password: string) {
    const auth = getAuth(app);

    return signInWithEmailAndPassword (auth, email, password)
    .then(async (userCredential) => {        
        const userLaravel = await loginUserLaravel(email, password)

        if (userLaravel?.data.ok) {
            const inOneDay = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
            Cookies.set('token', userLaravel.data.token);
        }
        
        return userLaravel;
    })
    .catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message;

        return {
            ok: false,
            message: errorMessage
        }
        console.log(errorCode, errorMessage)
    });
}

