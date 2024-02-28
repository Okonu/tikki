<template>
    <div>
        <h2>Certificate Details</h2>
        <table>
            <tr>
                <th>Owner Name</th>
                <th>Issuing Institution</th>
                <th>Issuing Date</th>
                <th>Certificate Number</th>
                <th>Expiration Date</th>
            </tr>
            <tr>
                <td>{{ certificate?.owner_name }}</td>
                <td>{{ certificate?.issuing_institution }}</td>
                <td>{{ certificate?.issuing_date }}</td>
                <td>{{ certificate?.certificate_number }}</td>
                <td>{{ certificate?.expiration_date }}</td>
            </tr>
        </table>
    </div>
</template>

<script setup lang="ts">
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
    certificate: Object as () => Certificate | undefined,
});
</script>
