<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import axios from 'axios';

const materi = ref('');
const jumlahSoal = ref(5);
const hasil = ref(null);
const sedangMemuat = ref(false);

const buatSoal = async () => {
    if (!materi.value) return;
    
    sedangMemuat.value = true;
    try {
        const response = await axios.post('/guru/asisten-ai/buat-soal', { 
            materi: materi.value,
            jumlah_soal: jumlahSoal.value
        });
        hasil.value = response.data.soal;
    } catch (error) {
        alert('Terjadi kesalahan saat membuat soal.');
    } finally {
        sedangMemuat.value = false;
    }
};
</script>

<template>
    <Head title="AI Asisten Guru" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">AI Asisten Guru</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Buat Soal Otomatis</h3>
                    
                    <form @submit.prevent="buatSoal" class="space-y-4 max-w-xl">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Materi Pembelajaran</label>
                            <textarea v-model="materi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Sistem Tata Surya kelas 6 SD"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Soal</label>
                            <input v-model="jumlahSoal" type="number" min="1" max="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        </div>
                        
                        <button type="submit" :disabled="sedangMemuat" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50">
                            {{ sedangMemuat ? 'Sedang Membuat...' : 'Buat Soal' }}
                        </button>
                    </form>
                    
                    <div v-if="hasil" class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <h4 class="font-bold text-gray-700 mb-2">Draft Soal (JSON dari AI):</h4>
                        <pre class="whitespace-pre-wrap text-sm text-gray-600">{{ hasil }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
