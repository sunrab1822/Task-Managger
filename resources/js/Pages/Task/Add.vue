<template>

    <Head title="Task" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Add Task</h2>
        </template>

        <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900 dark:text-gray-100 ">
                    <InputLabel for="title" value="Title" />

                    <TextInput id="title" type="text" class="mt-1 block w-full md:w-3/4 mb-3 " v-model="form.title" required/>

                    <InputError class="mt-2" :message="form.errors.title" />

                    <InputLabel for="date" value="Date" />

                    <DateInput id="date" type="date" class="mt-1 block w-1/2 md:w-1/3 mb-3" v-model="form.date"/>

                    <InputError class="mt-2" :message="form.errors.date" />

                    <InputLabel for="description" value="Description" />

                    <Textarea id="description" class="mt-1 block h-40 w-full md:w-1/2 mb-3" v-model="form.description"/>

                    <div class="flex justify-center mt-9">
                        <PrimaryButton @click="addTask">
                            Submit
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>



</template>

<script setup>
import DateInput from '@/Components/DateInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Textarea from '@/Components/Textarea.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: "",
    date: "",
    description: ""
})

const addTask = () => {
    form.post(route("task.add"), {
        preserveScroll: true,
        onSuccess: () => console.log(form),
        onError: () => {
            if (form.errors.title) {
                form.reset('title');
            }
        },
    })
}

</script>
