<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingGroupCreate = ref(false);
const nameInput = ref(null);

const form = useForm({
    name: '',
});

const confirmGroupCreate = () => {
    confirmingGroupCreate.value = true;

    nextTick(() => nameInput.value.focus());
};

const createGroup = () => {
    form.post(route('group.add'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => nameInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingGroupCreate.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">

        <PrimaryButton @click="confirmGroupCreate">Create</PrimaryButton>

        <Modal :show="confirmingGroupCreate" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Create group
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    To create a group please set the details of the group
                </p>

                <div class="mt-6">
                    <InputLabel for="name" value="Name" />
                    <TextInput
                        id="name"
                        ref="nameInput"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Name"
                        @keyup.enter="createGroup"
                    />

                    <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <PrimaryButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="createGroup"
                    >
                        Create Group
                    </PrimaryButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
