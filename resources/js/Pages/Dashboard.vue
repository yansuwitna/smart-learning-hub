<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { 
  Trophy, 
  Flame, 
  Award, 
  Play, 
  ChevronRight,
  Calculator,
  Book,
  MessageSquare,
  FlaskConical
} from 'lucide-vue-next';

defineProps({
    pengguna: Object,
    pesan: String,
});

const stats = [
  { name: 'Poin', value: '1.250', icon: Trophy, color: 'text-blue-500', bg: 'bg-blue-100' },
  { name: 'Level', value: '4', icon: Award, color: 'text-purple-500', bg: 'bg-purple-100' },
  { name: 'Streak', value: '7 hari', icon: Flame, color: 'text-orange-500', bg: 'bg-orange-100' },
  { name: 'Pencapaian', value: '12', icon: Trophy, color: 'text-blue-500', bg: 'bg-blue-100' },
];

const subjects = [
  { name: 'Matematika', icon: Calculator, color: 'text-blue-500', bg: 'bg-blue-50', border: 'border-blue-100' },
  { name: 'Bahasa Indonesia', icon: Book, color: 'text-red-500', bg: 'bg-red-50', border: 'border-red-100' },
  { name: 'Bahasa Inggris', icon: MessageSquare, color: 'text-purple-500', bg: 'bg-purple-50', border: 'border-purple-100' },
  { name: 'IPA', icon: FlaskConical, color: 'text-green-500', bg: 'bg-green-50', border: 'border-green-100' },
];
</script>

<template>
    <Head title="Dashboard Murid" />

    <AuthenticatedLayout>
        <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-8">
            
            <!-- Welcome Header -->
            <div>
                <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                    Selamat datang kembali, Andi! <span>👋</span>
                </h1>
                <p class="text-gray-500 mt-1">Terus belajar dan raih cita-citamu! ✨</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div v-for="stat in stats" :key="stat.name" class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div :class="[stat.bg, stat.color, 'w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0']">
                        <component :is="stat.icon" class="w-6 h-6" />
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">{{ stat.name }}</p>
                        <p class="text-xl font-bold text-gray-900">{{ stat.value }}</p>
                    </div>
                </div>
            </div>

            <!-- Continue Learning Banner -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-400 rounded-2xl p-6 sm:p-8 text-white flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden shadow-sm">
                <!-- Abstract Pattern Background -->
                <div class="absolute right-0 top-0 opacity-10">
                    <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path d="M45.7,-76.3C58.9,-69.3,69,-56,76.5,-42C84,-28,88.9,-14,88.2,-0.4C87.5,13.2,81.2,26.4,72.9,37.6C64.6,48.8,54.4,58,42.4,63.9C30.4,69.8,16.6,72.4,2.4,68.9C-11.8,65.4,-25.6,55.8,-37.9,46.8C-50.2,37.8,-61,29.4,-67.7,18.1C-74.4,6.8,-77,-7.4,-73.4,-19.9C-69.8,-32.4,-60,-43.2,-48.6,-50.8C-37.2,-58.4,-24.2,-62.8,-10.8,-66.5C2.6,-70.2,16.4,-73.2,30.3,-74.6C44.2,-76,43,-75.4,45.7,-76.3Z" transform="translate(100 100)" fill="currentColor"/>
                    </svg>
                </div>

                <div class="flex items-center gap-4 relative z-10 w-full md:w-auto flex-1">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0">
                        <Play class="w-8 h-8 text-white fill-white" />
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-center mb-1">
                            <h3 class="font-semibold text-lg">Lanjutkan Belajar</h3>
                            <span class="text-sm font-medium">65%</span>
                        </div>
                        <p class="text-blue-100 text-sm mb-3">Matematika - Operasi pada Pecahan</p>
                        <div class="w-full bg-blue-900/30 rounded-full h-1.5">
                            <div class="bg-white h-1.5 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                </div>

                <button class="relative z-10 w-full md:w-auto bg-white text-blue-600 px-6 py-2.5 rounded-full font-semibold text-sm hover:bg-blue-50 transition-colors shadow-sm whitespace-nowrap">
                    Lanjutkan
                </button>
            </div>

            <!-- Mata Pelajaran Saya -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Mata Pelajaran Saya</h2>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">Lihat Semua</a>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <Link href="#" v-for="subject in subjects" :key="subject.name" :class="['bg-white rounded-2xl p-5 border shadow-sm transition-shadow hover:shadow-md flex flex-col items-center text-center gap-3', subject.border]">
                        <div :class="[subject.bg, subject.color, 'w-14 h-14 rounded-2xl flex items-center justify-center mb-1']">
                            <component :is="subject.icon" class="w-7 h-7" />
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">{{ subject.name }}</h3>
                            <p class="text-xs text-gray-500 mt-0.5">Pelajaran</p>
                        </div>
                    </Link>
                </div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
