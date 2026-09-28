<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import axios from 'axios';

const pesanInput = ref('');
const percakapan = ref([
    { peran: 'ai', teks: 'Halo! Saya AI Guru. Apa yang ingin kamu pelajari hari ini?' }
]);
const sedangMemuat = ref(false);

const tanyaAi = async () => {
    if (!pesanInput.value.trim()) return;

    const pesan = pesanInput.value;
    percakapan.value.push({ peran: 'murid', teks: pesan });
    pesanInput.value = '';
    sedangMemuat.value = true;

    try {
        const response = await axios.post('/ai-guru/tanya', { pesan });
        percakapan.value.push({ peran: 'ai', teks: response.data.jawaban });
    } catch (error) {
        percakapan.value.push({ peran: 'ai', teks: 'Maaf, terjadi kesalahan.' });
    } finally {
        sedangMemuat.value = false;
    }
};
</script>

<template>
    <Head title="AI Guru" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Tanya AI Guru</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col h-[600px]">
                    <div class="flex-1 p-6 overflow-y-auto space-y-4 bg-gray-50">
                        <div v-for="(chat, index) in percakapan" :key="index"
                            :class="['flex', chat.peran === 'murid' ? 'justify-end' : 'justify-start']">
                            <div :class="['max-w-[70%] rounded-lg p-4 shadow-sm', 
                                chat.peran === 'murid' ? 'bg-blue-600 text-white' : 'bg-white border border-gray-200 text-gray-800']">
                                <p class="text-sm">{{ chat.teks }}</p>
                            </div>
                        </div>
                        <div v-if="sedangMemuat" class="flex justify-start">
                            <div class="bg-white border border-gray-200 text-gray-500 rounded-lg p-4 shadow-sm">
                                <p class="text-sm italic">AI Guru sedang mengetik...</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 bg-white border-t border-gray-200">
                        <div class="flex gap-4 mb-2">
                            <button @click="pesanInput = 'Tolong jelaskan materi ini'" class="text-xs bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-gray-700">Jelaskan</button>
                            <button @click="pesanInput = 'Berikan contoh soal'" class="text-xs bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-gray-700">Berikan Contoh</button>
                            <button @click="pesanInput = 'Uji saya dengan kuis'" class="text-xs bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-gray-700">Uji Saya</button>
                        </div>
                        <form @submit.prevent="tanyaAi" class="flex gap-2">
                            <input 
                                v-model="pesanInput"
                                type="text" 
                                placeholder="Apa yang ingin kamu tanyakan?" 
                                class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                :disabled="sedangMemuat"
                            />
                            <button 
                                type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 disabled:opacity-50"
                                :disabled="sedangMemuat"
                            >
                                Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
