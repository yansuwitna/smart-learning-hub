<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    mataPelajaran: Array,
});
</script>

<template>
    <Head title="Mata Pelajaran" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Mata Pelajaran</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div v-for="mapel in mataPelajaran" :key="mapel.id" class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500 hover:shadow-md transition">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ mapel.nama }}</h3>
                            <p class="text-sm text-gray-600 line-clamp-2">{{ mapel.deskripsi || 'Mata pelajaran ini belum memiliki deskripsi.' }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-xs font-semibold px-2 py-1 bg-gray-100 text-gray-600 rounded">{{ mapel.kode }}</span>
                                <Link :href="'/siswa/belajar?mapel=' + mapel.id" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Lihat Kursus →</Link>
                            </div>
                        </div>
                    </div>
                    
                    <div v-if="!mataPelajaran || mataPelajaran.length === 0" class="col-span-full text-center py-12 bg-white rounded-lg border border-dashed border-gray-300">
                        <p class="text-gray-500">Belum ada mata pelajaran yang tersedia saat ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
