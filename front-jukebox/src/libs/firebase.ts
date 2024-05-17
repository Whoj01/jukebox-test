import { initializeApp } from "firebase/app";


const firebaseConfig = {
  apiKey: "AIzaSyDChdQMIIlkNb2i7u6r2j0bikjMs-xTeY4",
  authDomain: "jukebox-test-e338d.firebaseapp.com",
  projectId: "jukebox-test-e338d",
  storageBucket: "jukebox-test-e338d.appspot.com",
  messagingSenderId: "388598133065",
  appId: "1:388598133065:web:e7a9690c63c88dde1f6a98"
};

export const app = initializeApp(firebaseConfig);