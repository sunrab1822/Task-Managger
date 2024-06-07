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



        <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900 dark:text-gray-100 flex ">
                    <div class="p-3 border w-1/4 h-screen flex flex-col justify-between">

                        <div class="w-full">
                            <div class="mb-14 flex justify-center">
                                <TaskLogo class=" justify-center" :src="'/storage/images/TSKM.jpg'"/>
                            </div>
                            <div
                                class="flex p-3 mb-1 border border-red-600 justify-center hover:bg-slate-600 cursor-pointer">
                                <h1>Tasks</h1>
                            </div>
                            <div
                                class="flex p-3 mb-1 border border-red-600 justify-center hover:bg-slate-600 cursor-pointer">
                                <h1>Members</h1>
                            </div>
                        </div>

                        <div class="w-full">
                            <div
                                class="flex  text-red-600 p-3 mb-1 border border-red-600 justify-center hover:bg-red-600 hover:text-white cursor-pointer">
                                <h1>Leave</h1>
                            </div>
                        </div>

                    </div>

                    <div class="p-3 border w-full h-screen">
                        <div class="">
                            <h1>{{ selectedGroup.managger }}</h1>
                        </div>
                    </div>










                </div>
            </div>
        </div>


    </AuthenticatedLayout>



</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TaskLogo from '@/Components/TaskLogo.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateGroupForm from './Partials/CreateGroupForm.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['groups'])
console.log(props.groups)

const selectedGroup = ref(props.groups[0])

</script>
