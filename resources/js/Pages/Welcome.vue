<script setup>
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
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <header class="container">
            <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Dashboard
                </Link>

                <template v-else>
                    <Link :href="route('login')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                    </Link>

                    <Link v-if="canRegister" :href="route('register')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Register
                    </Link>
                </template>
            </nav>
        </header>





    </div>
    <main class="flex justify-center min-h-screen h-full bg-gradient-to-r from-fuchsia-950 to-sky-700">
        <div>
        </div>
    </main>
</template>
