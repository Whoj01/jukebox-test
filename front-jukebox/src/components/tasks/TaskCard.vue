<template>
    <div class="flex flex-col flex-grow items-center justify-center px-3 py-3 max-w-[396px] max-h-[320px] gap-3 bg-background shadow-md rounded-md hover:shadow-xl hover:-translate-y-1 transition-all">
        <h5 class="text-lg font-bold">{{ title }}</h5>

        <p>
            {{ description }}
        </p>

        <div class="flex gap-2">
            <button @click="handleToggleDeleteModal" class="bg-red-500 text-white rounded-md p-1 hover:bg-red-300 transition-colors">
                <TrashIcon class="w-6 h-6"/>
            </button>

            <button class="bg-yellow-500 text-white rounded-md p-1 hover:bg-yellow-300 transition-colors">
                <PencilIcon class="w-6 h-6"/>
            </button>
        </div>
    </div>

    <ModalDeleteTask v-if="isModalDeleteTaskOpen" @toggleModal="handleToggleDeleteModal" />
</template>

<script setup lang="ts">
    import { TrashIcon , PencilIcon } from '@heroicons/vue/24/solid';
    import ModalDeleteTask from '@/components/ui/ModalDeleteTask.vue'
    import { ref } from 'vue';

    let isModalDeleteTaskOpen = ref(false);
    
    const props = defineProps({
        id: {
            type: Number,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: true
        }
    });

    const handleToggleDeleteModal = () => {
        isModalDeleteTaskOpen.value = !isModalDeleteTaskOpen.value;
    };
</script>