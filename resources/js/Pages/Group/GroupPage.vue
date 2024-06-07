<template>

    <Head title="Group List" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class=" font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Group's</h2>
                <CreateGroupForm/>
            </div>
        </template>

        <div class="py-10">
            <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <InputLabel for="search" value="Search" />
                        <div class="flex justify-between">
                            <TextInput id="search" type="text" class="mt-1 block w-full me-16" v-model="form.search"
                                required autofocus autocomplete="search" />
                            <PrimaryButton>Search</PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>



            <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 text-gray-900 dark:text-gray-100 ">
                        <div class="p-3 mb-3 border flex justify-between sm:rounded-lg">
                            <div class="flex items-center">
                                <TaskLogo class="w-10"
                                    src="https://cdn.discordapp.com/avatars/366607123771293696/abe26c229343ee3e027306fbad5968e0.webp" />
                            </div>
                            <div class="flex items-center">
                                name
                            </div>
                            <div class="flex items-center text-blue-500">
                                fo
                            </div>
                            <div class="flex items-center">
                                <Link
                                    class="inline-flex items-center cursor-pointer px-4 py-2 bg-gray-800 dark:bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-green-800 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                    :href="route('task.details', { 'task': 1 })">Join</Link>
                                <Link
                                    class="ms-3 inline-flex items-center cursor-pointer px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                                    :href="route('task.details', { 'task': 1 })">Show</Link>
                            </div>
                        </div>

                        <div class="flex justify-around">
                            <PrimaryButton>Previous</PrimaryButton>
                            <PrimaryButton :disabled="true">1</PrimaryButton>
                            <PrimaryButton>next</PrimaryButton>
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

const form = useForm({
    search: ""
})
</script>
