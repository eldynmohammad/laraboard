<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => (props.active
    ? 'px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-100 bg-gray-100'
    : 'px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-100'));
</script>

<template>
    <Link
        :href="href"
        :class="classes"
    >
        <slot />
    </Link>
</template>
