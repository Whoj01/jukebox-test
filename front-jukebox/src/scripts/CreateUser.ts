import { getAuth, createUserWithEmailAndPassword } from "firebase/auth";
import { app } from "@/libs/firebase.ts";
import { createUserLaravel } from "@/scripts/CreateUserLaravel.ts";
import Cookies from 'js-cookie';


export async function createUser(email: string, password: string, name: string) {
    const auth = getAuth(app);

    return createUserWithEmailAndPassword(auth, email, password)
    .then(async (userCredential) => {        
        const userLaravel = await createUserLaravel(email, password, name)

        if (userLaravel?.data.ok) {
            Cookies.set('token', userLaravel.data.token );
        }
        
        return userLaravel;
    })
    .catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message;

        return {
            ok: false,
            msg: errorMessage
        }
        console.log(errorCode, errorMessage)
    });
}

