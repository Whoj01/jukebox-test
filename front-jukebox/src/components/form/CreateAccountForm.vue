<template>
    <form class="flex flex-col gap-4 w-full" @submit.prevent="handleSubmit">
                <InputGroup
                    label="Nome"
                    v-model="name"
                    type="text"
                    placeholder="Digite seu nome"
                    :error="nameError"
                    :errorMessage="nameErrorMessage"
                />

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
                Criar conta!
            </button> 
        </form>
</template>

<script setup lang="ts">
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    import { useRouter } from 'vue-router';
    import { CogIcon } from "@vue-hero-icons/outline"
    import InputGroup from '../../components/ui/InputGroup.vue'
    import { createUser } from '@/scripts/CreateUser.ts'
    import { ref } from 'vue'
    
    const router = useRouter();

    const email = ref<string>('')
    const name = ref<string>('')
    const password = ref<string>('')
    const emailError = ref<boolean>(false)
    const passwordError = ref<boolean>(false)
    const nameError = ref<boolean>(false)

    const emailErrorMessage = ref<string>('')
    const passwordErrorMessage = ref<string>('')
    const nameErrorMessage = ref<string>('')
    
    const handleSubmit = async () => {
        passwordError.value = false
        emailError.value = false
        nameError.value = false
        passwordErrorMessage.value = ''
        emailErrorMessage.value = ''
        nameErrorMessage.value = ''

        if (password.value === '') {
            passwordError.value = true
            passwordErrorMessage.value = 'O campo senha é obrigatório'
        }

        if (password.value.length < 6 && passwordError.value === false) {
            passwordError.value = true
            passwordErrorMessage.value = 'O campo senha deve ter no mínimo 6 caracteres'
        }

        if (email.value === '') {
            emailError.value = true
            emailErrorMessage.value = 'O campo email é obrigatório'
        }

        if (name.value === '') {
            nameError.value = true
            nameErrorMessage.value = 'O campo nome é obrigatório'
        }

        if (emailError.value || passwordError.value || nameError.value) return
        
        const userCreated = await createUser(email.value, password.value, name.value)

        console.log(userCreated)

        if (userCreated?.data?.ok) {
            toast.success(userCreated.data.message)

            router.push('/home')

            return
        }

        toast.error(userCreated.data.message)        
    }
</script>