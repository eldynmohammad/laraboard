<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from 'vue';

const props = defineProps({
    board: {
        type: Object,
        default() {
            return {};
        },
    },
});

const form = useForm({ name: props.board.name });
const isEditing = ref(false);
const input = ref();

async function edit() {
    isEditing.value = true;
    await nextTick();
    input.value.select();
}

function onSubmit() {
    isEditing.value = false;
    form.put(route('boards.update', { board: props.board.id }), { onError: () => form.reset() });
}
</script>

<template>
    <div class="relative flex flex-col items-start max-w-full">
        <h1
            :class="{'invisible' : isEditing}"
            class="name-heading"
            @click="edit()"
        >
            {{ form.name ? form.name : ' ' }}
        </h1>
        <form
            v-show="isEditing"
            class="w-full"
            @submit.prevent="onSubmit()"
            @focusout="onSubmit()"
        >
            <input
                ref="input"
                v-model="form.name"
                type="text"
                placeholder="Board name"
                class="name-input"
            >
        </form>
    </div>
</template>
