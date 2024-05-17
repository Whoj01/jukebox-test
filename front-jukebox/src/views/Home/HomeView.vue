<template>
    <div class="flex justify-center">
        <section class="flex flex-col justify-center gap-5 min-h-full w-screen px-3 py-5 max-w-[1237px]">
          <div class="flex items-start justify-start gap-3 max-w-screen">
            <div class="w-fit h-full">
                <img src="@/assets/userGitDefault.png" alt="userGitDefault.png">
            </div>
    
            <div class="flex flex-col w-full h-full justify-between items-start">
                <div class="flex justify-between w-full">
                    <div>
                        <h1 class="font-bold text-2xl capitalize text-blue-400">{{ userName }}</h1>
        
                        <p>
                            Bem vindo ao Jukebox! Aqui você pode criar suas tarefas e organizar seu dia a dia.
                        </p>
                    </div>
                    
                    <button @click="handleLogout" class="w-fit py-2 px-5 bg-red-700 text-white rounded-md transition-colors hover:bg-red-500 self-end">
                        Sair
                    </button> 
                </div>
                
                <button @click="handleToggleModal" class="w-1/2 py-2 mt-4 bg-green-700 text-white rounded-md transition-colors hover:bg-green-500 self-end">
                    Criar nova tarefa
                </button> 
            </div>
          </div>
    
          <div class="bg-blue-400 h-1 rounded-md" />

          <TaskContainer />
          
           <ModalCreateTask @toggleModal="handleToggleModal" v-if="isModalCreateTaskOpen"/>
        </section>
    </div>
</template>

<script setup lang="ts">
    import Cookies from 'js-cookie';    
    import { decode } from '@/helpers/jwt.ts'
    import { ref } from 'vue'
    import { useRouter } from 'vue-router';
    import ModalCreateTask from '@/components/ui/ModalCreateTask.vue'
    import TaskContainer from '@/components/tasks/TaskContainer.vue'

    const router = useRouter();

    let isModalCreateTaskOpen = ref(false);

    let userName = ref<string>('')

    const user = Cookies.get('token');

    userName = decode(user).user.name
    

    const handleToggleModal = () => {
        isModalCreateTaskOpen.value = !isModalCreateTaskOpen.value;
    };

    const handleLogout = () => {
        Cookies.remove('token');
        router.push('/login');
    }
</script>