<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { DotsHorizontalIcon, PencilIcon } from '@heroicons/vue/solid';
import { ref } from 'vue';
import CardListItemCreateForm from './CardListItemCreateForm.vue';

const props = defineProps({
    list: {
        type: Object,
        default() {
            return {};
        },
    },
});

const listRef = ref();

function onCardCreated() {
    listRef.value.scrollTop = listRef.value.scrollHeight;
}
</script>

<template>
    <div>
        <div class="flex items-center justify-between px-3 py-2">
            <h3 class="text-sm font-semibold text-gray-700">
                {{ props.list.name }}
            </h3>

            <Menu
                as="div"
                class="relative z-10"
            >
                <MenuButton
                    class="grid w-8 h-8 rounded-md
                                    hover:bg-gray-300 place-content-center"
                >
                    <DotsHorizontalIcon class="w-5 h-5" />
                </MenuButton>

                <transition
                    enter-active-class="transition transform duration-100 ease-out"
                    enter-from-class="opacity-0 scale-90"
                    enter-to-class="opacity-100 scale-100"
                    leave-active-class="transition transform duration-100 ease-in"
                    leave-from-class="opacity-100 scale-100"
                    leave-to-class="opacity-0 scale-90"
                >
                    <MenuItems
                        class="origin-top-left mt-2 focus:outline-none absolute
                                            left-0 bg-white overflow-hidden rounded-md shadow-lg
                                            border w-40"
                    >
                        <MenuItem v-slot="{active}">
                            <a
                                href="#"
                                :class="{'bg-gray-100': active}"
                                class="block px-4 py-2 text-sm text-gray-700"
                            >Add card</a>
                        </MenuItem>
                        <MenuItem
                            v-slot="{active}"
                        >
                            <a
                                href="#"
                                :class="{'bg-gray-100': active}"
                                class="block px-4 py-2 text-sm text-pink-500"
                            >Delete list</a>
                        </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>
        </div>
        <div class="pb-3 flex flex-col overflow-hidden">
            <div
                ref="listRef"
                class="px-3 flex-1 overflow-y-auto"
            >
                <ul class="space-y-3">
                    <li
                        v-for="card in list.cards"
                        :key="card.id"
                        class="relative bg-white p-3 border-b border-gray-300
                                        rounded-lg hover:bg-gray-100 group text-sm"
                    >
                        {{ card.title }}
                        <button
                            class="hidden absolute top-1 right-1 w-6 h-6
                                            group-hover:grid place-content-center text-gray-600
                                            hover:bg-gray-300 hover:text-gray-800 rounded-md"
                        >
                            <PencilIcon class="w-4 h-4" />
                        </button>
                    </li>
                </ul>
            </div>

            <div class="px-3 mt-3">
                <CardListItemCreateForm
                    :list="list"
                    @created="onCardCreated"
                />
            </div>
        </div>
    </div>
</template>
