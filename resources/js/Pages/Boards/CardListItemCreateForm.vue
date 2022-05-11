<script setup>
import { PlusIcon } from '@heroicons/vue/solid';
import { useForm } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from 'vue';

const props = defineProps({
    list: {
        type: Object,
        default() {
            return {};
        },
    },
});

const emit = defineEmits(['created']);

const inputTitleRef = ref();
const isShowingForm = ref(false);
const form = useForm({
    title: '',
    card_list_id: props.list.id,
    board_id: props.list.board_id,
});

function focusText() {
    inputTitleRef.value.focus();
}

async function showForm() {
    isShowingForm.value = true;
    await nextTick();
    focusText();
}

function onSubmit() {
    form.post(route('cards.store'), {
        onSuccess: () => {
            form.reset();
            focusText();
            emit('created');
        },
    });
}
</script>

<template>
    <form
        v-if="isShowingForm"
        @keydown.esc="isShowingForm = false"
        @submit.prevent="onSubmit"
    >
        <textarea
            ref="inputTitleRef"
            v-model="form.title"
            rows="3"
            placeholder="insert card title"
            class="input bg-white"
            @keydown.enter.prevent="onSubmit"
        />

        <div class="mt-2 space-x-2">
            <button
                type="submit"
                class="btn bg-indigo-500 text-white"
            >
                Add card
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
        class="flex items-center p-2 w-full text-sm rounded-lg
        text-gray-600 hover:bg-gray-300 hover:text-800"
        @click="showForm()"
    >
        <PlusIcon class="w-5 h-5" />
        <span class="ml-2">Add item</span>
    </button>
</template>
