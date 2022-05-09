<script setup>
import { Popover, PopoverButton, PopoverOverlay, PopoverPanel } from '@headlessui/vue';
import { PlusIcon } from '@heroicons/vue/solid';
import { useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '../../Layouts/AppLayout.vue';

defineProps({
    boards: {
        type: Array,
        default() {
            return [];
        },
    },
});

const form = useForm({ name: '' });

function onSubmit(closePopover) {
    form.post('/boards', {
        onSuccess: () => {
            form.reset();
            closePopover();
        },
    });
}
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="h-ful px-4 py-6 overflow-y-auto">
            <div class="max-w-7xl mx-auto">
                <div class="flex px-3 items-center mb-4">
                    <h3 class="font-semibold text-gray-700">
                        My Boards
                    </h3>

                    <Popover
                        v-slot="{ open }"
                        class="relative"
                    >
                        <PopoverButton
                            :class="open ? 'bg-indigo-50 text-indigo-600' : 'bg-gray-200'"
                            class="flex items-center ml-4 btn hover:bg-gray-300
                            focus:ring-indigo-500"
                        >
                            <PlusIcon class="w-3.5 h-3.5 -ml-1" />
                            <span class="ml-2 text-xs">Create board</span>
                        </PopoverButton>
                        <PopoverOverlay class="z-10 bg-black/30 fixed inset-0" />

                        <transition
                            enter-active-class="transition duration-200 ease-out"
                            enter-from-class="translate-y-1 opacity-0"
                            enter-to-class="translate-y-0 opacity-100"
                            leave-active-class="transition duration-150 ease-in"
                            leave-from-class="translate-y-0 opacity-100"
                            leave-to-class="translate-y-1 opacity-0"
                        >
                            <PopoverPanel
                                v-slot="{ close }"
                                :focus="true"
                                class="absolute w-72 z-10 px-4 mt-3 -translate-x-1/2
                                left-1/2 sm:px-0"
                            >
                                <div
                                    class="p-3 bg-white overflow-hidden rounded-xl shadow-lg ring-1
                                    ring-black ring-opacity-5"
                                >
                                    <form @submit.prevent="onSubmit(close)">
                                        <label class="px-1 text-sm">Your name:</label>
                                        <input
                                            v-model="form.name"
                                            type="text"
                                            class="input"
                                        >
                                        <p
                                            v-if="form.errors.name"
                                            class="mt-2 px-2 text-sm text-pink-500"
                                        >
                                            {{ form.errors.name }}
                                        </p>
                                        <div class="flex justify-end mt-3">
                                            <button
                                                class="btn bg-indigo-500 text-white
                                                hover:bg-indigo-600 focus:ring-indigo-500"
                                            >
                                                Create
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </PopoverPanel>
                        </transition>
                    </Popover>
                </div>

                <ul class="grid gap-4 sm:grid-cols-2 md:gridc-cols-3 lg:grid-cols-4">
                    <li
                        v-for="(board, index) in boards"
                        :key="index"
                        class="relative bg-indigo-500 hover:bg-indigo-600 rounded-md
                    min-h-[7rem]"
                    >
                        <Link
                            :href="route('boards.show', { board: board.id })"
                            class="absolute inset-0 text-white font-semibold p-3 pb-6 break-words"
                        >
                            {{ board.name }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </AppLayout>
</template>
