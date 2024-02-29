<template>
    <div v-if="show" class="modal">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="text-lg font-semibold mb-4">Certificate Details</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issuing Institution</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issuing Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Certificate Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiration Date</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate?.owner_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate?.issuing_institution }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate?.issuing_date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate?.certificate_number }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-black">{{ certificate?.expiration_date }}</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps, defineEmits } from 'vue';

interface Certificate {
    id: number;
    owner_name: string;
    certificate_number: string;
    issuing_date: string;
    issuing_institution: string;
    expiration_date: string;
}

const props = defineProps({
    show: Boolean,
    certificate: Object as () => Certificate | undefined,
});

const emit = defineEmits(['close']);

const close = () => {
    emit('close');
};
</script>
