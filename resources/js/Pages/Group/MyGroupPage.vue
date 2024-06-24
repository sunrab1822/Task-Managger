<template>

    <Head title="Group List" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class=" font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ selectedGroup.name }}</h2>
                <select v-model="selectedGroup" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option v-for="group in groups" :value="group">{{ group.name }}</option>
                </select>
            </div>
        </template>


        <MyGroupLayout>
            <template #image>
                <TaskLogo class=" justify-center" :src="'/storage/images/TSKM.jpg'"/>
            </template>





            <div class="flex justify-center">
                <div>

                </div>


                <div class="border w-1/2">

                </div>
            </div>



        </MyGroupLayout>


    </AuthenticatedLayout>



</template>

<script setup>
import TaskLogo from '@/Components/TaskLogo.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import MyGroupLayout from '@/Layouts/MyGroupLayout.vue';

const props = defineProps(['groups'])
console.log(props.groups)

const selectedGroup = ref(props.groups[0])

</script>
