<template>
     <div class="flex flex-col gap-4 w-full">
            <h2 class="text-2xl font-bold text-blue-400 text-center">Tarefas</h2>
    
            <div class="flex flex-wrap justify-start items-center gap-3 max-w-screen h-full data-[teams=false]:justify-center">
                <TaskCard v-for="task in tasks" :key="task.id" :title="task.title" :description="task.description" :id="task.id"/>
            </div>
      </div>
</template>

<script setup lang="ts">
    import { ref, onMounted } from 'vue';
    import { getTasks } from '@/scripts/GetTasks.ts';
    import TaskCard from '@/components/tasks/TaskCard.vue';

    const tasks = ref([]);

    onMounted(async () => {
        const { data } = await getTasks();

        tasks.value = data.tasks;
    });
</script>