<template>
     <form class="flex flex-col gap-4 w-full" @submit.prevent="handleSubmit">
        <InputGroup
            label="Email"
            v-model="email"
            type="email"
            placeholder="Digite seu email"
            :error="emailError"
            :errorMessage="emailErrorMessage"
        />

        <InputGroup
            label="Senha"
            v-model="password"
            type="password"
            placeholder="Digite sua senha"
            :error="passwordError"
            :errorMessage="passwordErrorMessage"
        />

        <button type="submit" class="w-1/2 py-2 mt-4 bg-blue-700 text-white rounded-md transition-colors hover:bg-blue-500 self-center">
            Entrar!
        </button>
    </form> 
</template>

<script setup lang="ts">
    import InputGroup from '@/components/ui/InputGroup.vue'
    import { toast } from 'vue3-toastify';
    import { useRouter } from 'vue-router';
    import { loginUser } from '@/scripts/LoginUser.ts'
    import { ref } from 'vue'
    import 'vue3-toastify/dist/index.css';

    const router = useRouter();

    const email = ref<string>('')
    const password = ref<string>('')

    const emailError = ref<boolean>(false)
    const passwordError = ref<boolean>(false)

    const emailErrorMessage = ref<string>('')
    const passwordErrorMessage = ref<string>('')
    
    const handleSubmit = async () => {
        emailError.value = false
        passwordError.value = false
        passwordErrorMessage.value = ''
        emailErrorMessage.value = ''

        if (email.value === '') {
            emailError.value = true
            emailErrorMessage.value = 'O campo email é obrigatório'
            passwordError.value = true
            passwordErrorMessage.value = 'O campo senha é obrigatório'

        }

        if (password.value === '') {
            passwordError.value = true
            passwordErrorMessage.value = 'O campo senha é obrigatório'
        }

        if (emailError.value || passwordError.value ) return
        
        const userCreated = await loginUser(email.value, password.value)

        if (userCreated?.data?.ok) {
            toast.success(userCreated.data.message)
            
            router.push('/home')

            return
        }

        toast.error(userCreated.data.message)   
    }
</script>