<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

</script>

<template>

    <Head title="Task Managger" />

    <main class="flex justify-center items-center min-h-screen h-full bg-gradient-to-r from-fuchsia-950 to-sky-700">
        <div>
            <div class="py-3 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <div class="flex">
                            <ApplicationLogo class="w-80 me-11" />

                            <div class="flex flex-col items-center justify-evenly bg-gray-900 sm:rounded-lg w-96">


                                    <Link :href="route('login')"
                                        class="rounded-md border border-gray-600 px-3 py-2 text-black w-2/3 flex justify-center items-center  hover:bg-slate-700 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white dark:focus-visible:ring-white">
                                    Log in
                                    </Link>




                                    <Link v-if="canRegister" :href="route('register')"
                                        class="rounded-md border border-gray-600 px-3 py-2 text-black w-2/3 flex justify-center items-center  hover:bg-slate-700 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white dark:focus-visible:ring-white">
                                    Register
                                    </Link>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
