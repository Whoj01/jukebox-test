<template>
    <AuthCard>
        <div class="flex flex-col items-start justify-center w-full md:w-1/2  bg-white px-4 py-6 gap-4">
                <div class="space-y-4 w-full">
                    <h1 class="text-3xl text-center text-slate-950">
                        Bem vindo!
                    </h1>
    
                    <p class="text-base text-center text-slate-700">
                        Faça login para começar a registrar suas tarefas, ou 
                        <RouterLink to="/signup" class="text-green-500 hover:text-green-300 transition-colors cursor-pointer underline">
                            crie sua conta!
                        </RouterLink >
                    </p>
                </div>
    
               <LoginForm />
            </div>
    </AuthCard>
</template>

<script setup>
    import LoginForm from '@/components/form/LoginForm.vue'
    import AuthCard from '@/components/ui/auth/AuthCard.vue'
    import { toast } from 'vue3-toastify';
    import { useRouter } from 'vue-router';
    import 'vue3-toastify/dist/index.css';

    const router = useRouter();

    if (router.query?.notLoggedIn) {
        toast.error('You are not logged in!');
    }
</script>