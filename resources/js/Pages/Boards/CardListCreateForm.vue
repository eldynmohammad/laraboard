<script setup>
import { PlusIcon } from '@heroicons/vue/solid';
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

const inputNameRef = ref();
const formRef = ref();
const isShowingForm = ref(false);
const form = useForm({ name: '' });

function focusText() {
    inputNameRef.value.focus();
}

async function showForm() {
    isShowingForm.value = true;
    await nextTick();
    focusText();
}

function onSubmit() {
    form.post(route('boardLists.store', { board: props.board.id }), {
        onSuccess: () => {
            form.reset();
            focusText();
            formRef.value.scrollIntoView();
        },
    });
}
</script>

<template>
    <form
        v-if="isShowingForm"
        ref="formRef"
        class="bg-gray-200 p-3 rounded-lg"
        @keydown.esc="isShowingForm = false"
        @submit.prevent="onSubmit"
    >
        <input
            ref="inputNameRef"
            v-model="form.name"
            type="text"
            placeholder="insert list name"
            class="input bg-white"
        >

        <div class="mt-2 space-x-2">
            <button
                type="submit"
                class="btn bg-indigo-500 text-white"
            >
                Add list
            </button>
            <button
                type="button"
                class="btn text-gray-700 hover:bg-gray-300"
                @click="isShowingForm = false"
            >
                Cancel
            </button>
        </div>
    </form>

    <button
        v-else
        class="w-full flex items-center bg-gray-200 hover:bg-gray-300
        text-sm p-2 rounded-lg text-gray-800 base-animation"
        @click="showForm()"
    >
        <PlusIcon class="w-5 h-5" />
        <span class="ml-2">Add another list</span>
    </button>
</template>
