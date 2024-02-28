<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

interface Certificate {
    id: number;
    owner_name: string;
    certificate_number: string;
    issuing_date: string;
    issuing_institution: string;
    expiration_date: string;
}

const props = defineProps({
    certificates: Array as () => Certificate[],
});
</script>

<template>
    <Head title="Certificates" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Certificates List</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Certificate Number</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issuing Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issuing Institution</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiration Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="certificate in certificates" :key="certificate.id">
                                <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate.owner_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate.certificate_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate.issuing_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate.issuing_institution }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate.expiration_date }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
