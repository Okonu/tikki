<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';
import CheckCertificateSuccess from '@/Pages/Certificates/CertificateDetails.vue';
import ErrorModal from '@/Components/ErrorModal.vue';

const form = useForm({
    certificateNumber: '',
});

const showModal = ref(false);
const certificateDetails = ref<Certificate | null>(null);
const showErrorModal = ref(false);
const errorMessage = ref('');

const submit = () => {
    form.post(route('check-certificate'), {
        onSuccess: (response) => {
            certificateDetails.value = response.props.certificate;
            showModal.value = true;
        },
        onError: (errors) => {
            errorMessage.value = errors.message || 'An error occurred.';
            showErrorModal.value = true;
        },
    });
};

const closeModal = () => {
    showModal.value = false;
};

const closeErrorModal = () => {
    showErrorModal.value = false;
};
</script>

<template>
    <div class="flex flex-col justify-center items-center min-h-screen bg-gray-900 text-white">
        <Head title="tikki" />

        <section class="my-16">
            <h1 class="text-6xl font-bold text-center text-white font-pacifico">tikki</h1>
            <p class="text-center text-xl mt-4 text-gray-300">Get a tikki, be verified/verify your papers</p>
        </section>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="certificateNumber" value="certificateNumber" />

                <TextInput
                    id="certificateNumber"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.certificateNumber"
                    required
                    autofocus
                    autocomplete="certificateNumber"
                />

                <InputError class="mt-2" :message="form.errors.certificateNumber" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Check
                </PrimaryButton>
            </div>
        </form>

        <CheckCertificateSuccess :show="showModal" :certificate="certificateDetails" @close="closeModal" />

        <ErrorModal :show="showErrorModal" :message="errorMessage" @close="closeErrorModal" />

        <footer class="border-t border-gray-10 py-4 mt-auto">
            <p class="text-center text-gray-400">© 2024 TIKKI. All rights reserved.</p>
        </footer>
    </div>
</template>
