<template>
    <img class="rounded-md" viewBox="0 0 316 316" :src="src"/>
</template>

<script setup>
defineProps({
    src: {
        type: String,
    },
});
</script>
