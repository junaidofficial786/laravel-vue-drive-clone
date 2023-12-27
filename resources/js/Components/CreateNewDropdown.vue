<style scoped>

</style>

<template>
    <Menu as="div" class="relative inline-block text-left">
        <div>
            <MenuButton
                class="inline-flex w-full justify-center rounded-md  px-4 py-2 text-sm font-medium text-black hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                Create New
                <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5 text-violet-200 hover:text-violet-100" aria-hidden="true"/>
            </MenuButton>
        </div>
        <MenuItems
            class="absolute left-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white
                shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        >
            <div class="px-1 py-1">
                <MenuItem v-slot="{active}">
                    <a href="#" @click.prevent="showCreateFolderModal" class="text-green-700 block px-4 py-2 text-sm">New
                        Folder</a>
                </MenuItem>
            </div>
            <div class="px-1 py-1">
                <MenuItem v-slot="{active}">
                    <a href="" class="text-green-700 block px-4 py-2 text-sm">Upload File</a>
                </MenuItem>
                <MenuItem v-slot="{active}">
                    <a href="" class="text-green-700 block px-4 py-2 text-sm">Upload Folder</a>
                </MenuItem>
            </div>
        </MenuItems>
        <CreateFolderModal v-model="createFolderModal"/>
    </Menu>
</template>

<script setup>
import {defineProps, ref} from 'vue';
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import {ChevronDownIcon} from '@heroicons/vue/20/solid/index.js';
import CreateFolderModal from "@/Components/app/createFolderModal.vue";
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const createFolderModal = ref(false)

function showCreateFolderModal() {
    createFolderModal.value = true
}

</script>
