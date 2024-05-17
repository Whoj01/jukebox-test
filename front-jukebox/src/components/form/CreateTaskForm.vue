<template>
     <form class="flex flex-col gap-4 w-full" @submit.prevent="handleSubmit">
            <InputGroup
                v-model="title"
                type="text"
                placeholder="Digite o titulo da tarefa"
                class="rounded border-none"
                :error="titleError"
                :errorMessage="titleErrorMessage"
            />

            <InputGroup
                v-model="description"
                type="text"
                placeholder="Digite a descrição da tarefa"
                class="rounded border-none"
                :error="descriptionError"
                :errorMessage="descriptionErrorMessage"
            />

            <div class="flex gap-4">
                <button type="submit" class="w-1/2 py-2 bg-blue-700 text-white rounded-md transition-colors hover:bg-blue-500 self-center">
                    Criar Tarefa!
                </button>

                <button @click="handleClick"  type="button" class="py-2.5 px-5  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition-all w-1/2 ">Cancelar</button>    
            </div>
        </form> 
</template>

<script setup lang="ts">
    import InputGroup from '@/components/ui/InputGroup.vue'
    import { ref } from 'vue'
    import { createTask } from '@/scripts/CreateTask.ts'
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';

    const emit = defineEmits(['toggleModal']);

    const title = ref<string>('')
    const description = ref<string>('')

    const titleError = ref<boolean>(false)
    const descriptionError = ref<boolean>(false)
    const titleErrorMessage = ref<string>('')
    const descriptionErrorMessage = ref<string>('')


    const handleSubmit = async () => {
        titleError.value = false
        descriptionError.value = false
        titleErrorMessage.value = ''
        descriptionErrorMessage.value = ''

        if (title.value === '') {
            titleError.value = true
            titleErrorMessage.value = 'O campo titulo é obrigatório'
        }

        if (description.value === '') {
            descriptionError.value = true
            descriptionErrorMessage.value = 'O campo descrição é obrigatório'
        }

        if (titleError.value || descriptionError.value) return

        const taskCreated = await createTask(title.value, description.value)

        if (taskCreated?.data.ok) {
            toast.success(taskCreated?.data.message)

            emit('toggleModal');

            return
        }

        toast.error(taskCreated?.data.message)
    }
</script>