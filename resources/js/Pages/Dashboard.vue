<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TaskLogo from '@/Components/TaskLogo.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';



const form = useForm({
    search: ""
})
defineProps(['tasks']);
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>



        <div class="py-10">
            <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <InputLabel for="search" value="Search" />
                        <div class="flex justify-between">
                            <TextInput id="search" type="text" class="mt-1 block w-full me-16" v-model="form.search" required autofocus autocomplete="search" />
                            <PrimaryButton>Search</PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="tasks.length > 0" class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 text-gray-900 dark:text-gray-100 ">
                        <div v-for="task in tasks" class="p-3 mb-3 border flex justify-between sm:rounded-lg">
                            <div class="flex items-center">
                                <TaskLogo class="w-10" src="https://cdn.discordapp.com/avatars/366607123771293696/abe26c229343ee3e027306fbad5968e0.webp"/>
                            </div>
                            <div class="flex items-center">
                                {{ task.title }}
                            </div>
                            <div class="flex items-center text-red-600">
                                Expire: {{ task.date }}
                            </div>
                            <div class="flex items-center">
                                <Link
                                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                                    :href="route('task.details', {'task':task.id})">Show</Link>
                            </div>
                        </div>

                        <div class="flex justify-around">
                            <PrimaryButton>Previous</PrimaryButton>
                            <PrimaryButton :disabled="true" >1</PrimaryButton>
                            <PrimaryButton>next</PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </AuthenticatedLayout>
</template>
