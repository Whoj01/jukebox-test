<template>
    <div class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full bg-black/50">
    <div class="relative  p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-center text-gray-900 dark:text-white">
                    Criar tarefa
                </h3>
                <button @click="handleClick" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <XCircleIcon class="h-6 w-6"/>
                    <span class="sr-only">Fechar modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
               <CreateTaskForm @toggleModal="handleClick"/>
            </div>
        </div>
    </div>
</div>
</template>

<script setup lang="ts">
    import { XCircleIcon } from '@heroicons/vue/24/solid';
    import CreateTaskForm from '@/components/form/CreateTaskForm.vue'

    const emit = defineEmits(['toggleModal']);

    const handleClick = () => {
        emit('toggleModal');
    };
</script>