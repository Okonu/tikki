<script setup lang="ts">
import { defineProps, ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

const certificateNumber = ref('');
const handleCertifcateNoEntry = () => {
    console.log(`Check Certificate ${certificateNumber.value}`);
};
</script>


<template>
    <Head title="tikki" />
    <div class="flex flex-col justify-center items-center min-h-screen bg-gray-900 text-white" >

        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <section class="my-16">
            <h1 class="text-6xl font-bold text-center text-white font-pacifico">tikki</h1>
            <p class="text-center text-xl mt-4 text-gray-300">Get a tikki,be verified/verify your papers</p>
        </section>

        <!-- Subscription Form Section -->
        <div class="flex flex-col justify-center items-center max-w-md mx-auto">
            <form @submit.prevent="handleCertifcateNoEntry" class="space-y-4">
                <label for="certificateNumber" class="block text-sm font-medium text-gray-700">Certificate Number</label>
                <input type="text" id="certificateNumber" v-model="certificateNumber" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Check</button>
            </form>
        </div>

        <!-- Footer -->
        <footer class="border-t border-gray-10 py-4 mt-auto">
            <p class="text-center text-gray-400">©   2024 TIKKI. All rights reserved.</p>
        </footer>
    </div>
</template>

<style>
@media (prefers-color-scheme: dark) {

}
</style>
