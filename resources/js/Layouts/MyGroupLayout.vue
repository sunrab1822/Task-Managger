<template>
<div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900 dark:text-gray-100 flex ">
                    <div class="p-3 border w-1/4 h-screen flex flex-col justify-between">

                        <div class="w-full">
                            <div class="mb-14 flex justify-center">
                                <slot name="image"/>
                            </div>
                            <div
                                class="flex p-3 mb-1 border border-red-600 justify-center hover:bg-slate-600 cursor-pointer">
                                <Link :href="route('group.show')">Tasks</Link>
                            </div>
                            <div
                                class="flex p-3 mb-1 border border-red-600 justify-center hover:bg-slate-600 cursor-pointer">
                                <Link :href="route('group.show')">Members</Link>
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

                            <slot />

                    </div>
                </div>
            </div>
        </div>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';


</script>
