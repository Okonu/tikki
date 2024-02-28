<script setup lang="ts">
import { defineProps,  } from 'vue';
import { Head, Link,} from '@inertiajs/vue3';
defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

</script>

<template>
    <div class="flex flex-col justify-center items-center min-h-screen bg-gray-900 text-white">
        <Head title="tikki" />

        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >Dashboard</Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >Log in</Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >Register</Link>
            </template>
        </div>

    </div>
</template>
