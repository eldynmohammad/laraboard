<script setup>
import { DotsHorizontalIcon } from '@heroicons/vue/solid';
import AppLayout from '../../Layouts/AppLayout.vue';
import BoardNameForm from './BoardNameForm.vue';
import CardList from './CardList.vue';
import CardListCreateForm from './CardListCreateForm.vue';

const props = defineProps({
    board: {
        type: Object,
        default() {
            return {};
        },
    },
});
</script>

<template>
    <AppLayout>
        <div class="flex flex-col h-full bg-white">
            <div class="flex items-center justify-between flex-wrap py-4 px-14 shrink-0">
                <BoardNameForm :board="props.board" />
                <div class="shrink-0">
                    <button
                        class="inline-flex items-center px-3 py-2 text-sm text-gray-700
                            rounded-lg bg-gray-100 hover:bg-gray-300"
                    >
                        <DotsHorizontalIcon class="w-5 h-5" />
                        <span class="ml-2">Settings</span>
                    </button>
                </div>
            </div>
            <div class="flex-1 overflow-x-auto px-10">
                <div class="inline-flex h-full items-start px-4 pb-4 gap-4">
                    <CardList
                        v-for="list in board.lists"
                        :key="list.id"
                        :list="list"
                        class="flex flex-col max-h-full bg-gray-200 rounded-lg w-72"
                    />

                    <div class="w-72">
                        <CardListCreateForm :board="board" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
