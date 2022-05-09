<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetBanner from '../Jetstream/Banner.vue';
import JetNavLink from '../Jetstream/NavLink.vue';

defineProps({ title: { type: String, default: '' } });

// const showingNavigationDropdown = ref(false);

// const switchToTeam = (team) => {
//     Inertia.put(route('current-team.update'), { team_id: team.id }, { preserveState: false });
// };

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />
        <JetBanner />

        <div class="flex flex-col h-screen bg-gray-50">
            <nav class="w-full bg-white shrink-0 border-b">
                <div class="w-full max-w-7xl mx-auto flex justify-between px-4 py-3">
                    <Link
                        :href="route('boards')"
                        class="text-2xl font-bold tracking-wider"
                    >
                        LaraBoard
                    </Link>
                    <div class="flex items-center">
                        <JetNavLink href="#">
                            My Board
                        </JetNavLink>

                        <Menu
                            as="div"
                            class="relative ml-3 z-20"
                        >
                            <MenuButton
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-indigo-500 rounded-full"
                            >
                                <img
                                    :src="$page.props.auth.user.avatar_url"
                                    :alt="$page.props.auth.user.name"
                                    class="inline-flex rounded-full h-9 w-9"
                                >
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
                                    class="origin-top-right mt-2 focus:outline-none absolute right-0
                            bg-white overflow-hidden rounded-md shadow-lg border w-48"
                                >
                                    <MenuItem v-slot="{active}">
                                        <a
                                            href="#"
                                            :class="{'bg-gray-100': active}"
                                            class="block px-4 py-2 text-sm text-gray-700"
                                        >My Profile</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{active}">
                                        <form
                                            method="POST"
                                            @submit.prevent="logout"
                                        >
                                            <button
                                                type="submit"
                                                :class="{'bg-gray-100': active}"
                                                class="w-full text-left block px-4 py-2 text-sm
                                            text-gray-700"
                                            >
                                                Log out
                                            </button>
                                        </form>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-1 overflow-hidden">
                <slot />
            </main>
        </div>
    </div>
</template>
