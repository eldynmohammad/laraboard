<script setup>
import { PencilIcon } from '@heroicons/vue/solid';
import { useForm } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from 'vue';

const props = defineProps({
    card: {
        type: Object,
        default() {
            return {};
        },
    },
});

const inputTitleRef = ref();
const isShowingForm = ref(false);
const form = useForm({ title: props.card.title });

function focusText() {
    inputTitleRef.value.focus();
}

async function showForm() {
    isShowingForm.value = true;
    await nextTick();
    focusText();
}

function onSubmit() {
    form.put(route('cards.update', { card: props.card.id }), {
        onSuccess: () => {
            isShowingForm.value = false;
        },
    });
}
</script>

<template>
    <li
        class="relative bg-white p-2 border-b border-gray-300
        rounded-lg hover:bg-gray-100 group text-sm"
    >
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
                class="input bg-white text-sm"
                @keydown.enter.prevent="onSubmit"
            />

            <div class="mt-2 space-x-2">
                <button
                    type="submit"
                    class="btn bg-indigo-500 text-white"
                >
                    Save card
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
        <template v-else>
            <a href="#">{{ props.card.title }}</a>
            <button
                class="hidden absolute top-1.5 right-1.5 w-6 h-6
            group-hover:grid place-content-center text-gray-600
            hover:bg-gray-300 hover:text-gray-800 rounded-md"
                @click="showForm()"
            >
                <PencilIcon class="w-4 h-4" />
            </button>
        </template>
    </li>
</template>
