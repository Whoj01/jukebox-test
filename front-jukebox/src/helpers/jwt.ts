import { jwtDecode } from "jwt-decode";

export const decode = (token: string) => {
    const decodedToken = jwtDecode(token);

    return decodedToken;
}