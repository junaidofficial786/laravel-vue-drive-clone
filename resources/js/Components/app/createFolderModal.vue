<script>
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import forms from "@tailwindcss/forms";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    components: {PrimaryButton, TextInput, Modal, InputLabel, SecondaryButton, InputError},
    props: {
        modelValue: Boolean,
    },
    emits: ['update:modelValue'],
    data() {
        return {
            form: {
                name: '',
                errors: {
                    name: '',
                },
            },
        };
    },
    methods: {
        closeModal() {
            this.$emit('update:modelValue');
            this.form.errors = { name: '' };
            this.form.name = '';
        },
        createFolder() {
            // Add your logic for creating a folder here
            console.log('create folder')
        },
    },
};
</script>

<template>
    <modal :show="modelValue" max-width="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create New Folder
            </h2>
            <div class="mt-6">
                <InputLabel for="folderName" value="Folder Name" class="sr-only"/>
                <TextInput
                    type="text"
                    id="folderName"
                    v-model="form.name"
                    class="mt-1 block w-full"
                    :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    placeholder="Folder Name"
                    @keyup.enter="createFolder"
                />
                <InputError :message="form.errors.name" class="mt-2"/>
            </div>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal"> Close </SecondaryButton>
                <PrimaryButton class="ml-3" @click="createFolder" :disabled="form.processing" :class="{'opacity-25': form.processing}">
                    Save
                </PrimaryButton>
            </div>
        </div>
    </modal>
</template>

<style scoped>
</style>
