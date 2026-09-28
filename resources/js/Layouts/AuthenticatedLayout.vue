<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { 
  Home, 
  BookOpen, 
  Grid, 
  Sparkles, 
  Bot, 
  BarChart2, 
  Award, 
  User,
  Search,
  Bell,
  Menu,
  X
} from 'lucide-vue-next';

const showingMobileMenu = ref(false);
const page = usePage();

const navigation = [
  { name: 'Beranda', href: route('dashboard'), icon: Home, active: route().current('dashboard') },
  { name: 'Belajar', href: '#', icon: BookOpen, active: false },
  { name: 'Mata Pelajaran', href: '#', icon: Grid, active: false },
  { name: 'Rekomendasi', href: '#', icon: Sparkles, active: false },
  { name: 'AI Guru', href: '#', icon: Bot, active: false },
  { name: 'Progress Belajar', href: '#', icon: BarChart2, active: false },
  { name: 'Pencapaian', href: '#', icon: Award, active: false },
  { name: 'Profil', href: route('profile.edit'), icon: User, active: route().current('profile.edit') },
];
</script>

<template>
  <div class="flex h-screen bg-gray-50 font-sans">
    
    <!-- Mobile Sidebar Backdrop -->
    <div v-if="showingMobileMenu" @click="showingMobileMenu = false" class="fixed inset-0 z-20 bg-black/50 lg:hidden"></div>

    <!-- Sidebar -->
    <aside 
      :class="[showingMobileMenu ? 'translate-x-0' : '-translate-x-full', 'lg:translate-x-0']"
      class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-200 transition-transform duration-300 ease-in-out lg:static lg:inset-0 flex flex-col"
    >
      <!-- Logo -->
      <div class="flex items-center justify-center h-16 border-b border-gray-100 px-6">
        <Link :href="route('dashboard')" class="flex items-center gap-2">
          <div class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center font-bold text-lg">
            S
          </div>
          <span class="text-xl font-bold text-gray-900">Smart <span class="text-blue-600">Learning</span> Hub</span>
        </Link>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
        <Link 
          v-for="item in navigation" 
          :key="item.name" 
          :href="item.href"
          :class="[
            item.active ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900',
            'group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors'
          ]"
        >
          <component :is="item.icon" 
            :class="[item.active ? 'text-blue-700' : 'text-gray-400 group-hover:text-gray-500', 'flex-shrink-0 -ml-1 mr-3 h-5 w-5']" 
            aria-hidden="true" 
          />
          {{ item.name }}
        </Link>
      </nav>

      <!-- User Profile at Bottom -->
      <div class="p-4 border-t border-gray-200">
        <div class="flex items-center gap-3">
          <img src="https://ui-avatars.com/api/?name=Andi+Pratama&background=bfdbfe&color=1e3a8a" alt="User Avatar" class="w-10 h-10 rounded-full" />
          <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">{{ $page.props.auth.user.name }}</p>
            <p class="text-xs text-gray-500 truncate">Murid - Kelas VIII</p>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-hidden">
      
      <!-- Top Navbar -->
      <header class="bg-white h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8">
        
        <!-- Mobile Menu Button & Search -->
        <div class="flex items-center gap-4 flex-1">
          <button @click="showingMobileMenu = true" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
            <Menu class="w-6 h-6" />
          </button>

          <div class="relative max-w-md w-full hidden sm:block">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <Search class="h-4 w-4 text-gray-400" />
            </div>
            <input 
              type="text" 
              placeholder="Cari materi, pelajaran, atau topik..." 
              class="block w-full pl-10 pr-3 py-2 border-none bg-gray-50 rounded-full text-sm placeholder-gray-500 focus:ring-0 focus:bg-gray-100 transition-colors"
            />
          </div>
        </div>

        <!-- Right Icons -->
        <div class="flex items-center gap-4">
          <button class="text-gray-400 hover:text-gray-500 relative">
            <Bell class="w-5 h-5" />
            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 ring-2 ring-white"></span>
          </button>
          
          <div class="h-8 w-8 rounded-full bg-gray-200 overflow-hidden cursor-pointer">
            <img src="https://ui-avatars.com/api/?name=Andi+Pratama&background=bfdbfe&color=1e3a8a" alt="User" class="h-full w-full object-cover" />
          </div>
        </div>
      </header>

      <!-- Main Scrollable Content -->
      <main class="flex-1 overflow-y-auto bg-gray-50">
        <slot />
      </main>

    </div>
  </div>
</template>
