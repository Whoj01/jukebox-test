

<template>
     <div>
        <label>{{ label }}</label>

        <input  
            class="w-full p-2 border-b border-gray-300  transition-all outline-none focus:border-blue-300 hover:border-blue-300" 
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            v-bind="$attrs"
        />

        <small v-if="error" class="text-sm text-red-500">
            {{ errorMessage }}
        </small>
    </div>
</template>

<script setup lang="ts">
    import { defineProps } from 'vue'

    const props = defineProps({
        label: {
            type: String,
            default: ''
        },
        error: {
            type: Boolean,
            default: false
        },
        errorMessage: {
            type: String,
            default: ''
        },
        modelValue: {
            type: String,
            default: ''
        },
    })

</script>