<template>
    <AuthCard>
        <div class="flex flex-col items-start justify-center w-full md:w-1/2  bg-white px-4 py-6 gap-4">
            <div class="space-y-4 w-full">
                <h1 class="text-3xl text-center text-slate-950">
                    Olá!
                </h1>

                <p class="text-base text-center text-slate-700">
                    Vamos criar a sua conta! 
                </p>
            </div>

            <CreateAccountForm />

            <RouterLink to="/login" class="text-green-500 hover:text-green-300 transition-colors cursor-pointer underline text-center w-full">
                Já tem uma conta? Faça login!
            </RouterLink>
        </div>
    </AuthCard>
</template>

<script setup>
    import AuthCard from '@/components/ui/auth/AuthCard.vue'
    import InputGroup from '@/components/ui/InputGroup.vue'
    import CreateAccountForm from '@/components/form/CreateAccountForm.vue'

</script>