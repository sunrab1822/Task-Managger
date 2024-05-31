<template>

    <Head :title="task.title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="flex justify-between font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"><div>{{task.title}} </div> <div>{{ task.created_at.split("T")[0] }}</div></h2>
        </template>

        <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                <div>

                    {{ task.description }}
                </div>
                <div class=" text-red-600">
                    Expire: {{ task.date }}
                </div>
                <div class="">
                    {{ user }}
                </div>
            </div>
        </div>

    </AuthenticatedLayout>



</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps(['task','user'])

</script>
