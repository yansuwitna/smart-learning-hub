<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Masuk - Smart Learning Hub" />

    <div class="min-h-screen flex w-full font-sans">
        <!-- Left Side: Login Form -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-white p-8 lg:p-16">
            <div class="w-full max-w-md">
                
                <!-- Logo & Tagline -->
                <div class="mb-10 text-center">
                    <div class="flex items-center justify-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-2xl">
                            S
                        </div>
                        <span class="text-2xl font-bold text-gray-900">Smart <span class="text-blue-600">Learning</span> Hub</span>
                    </div>
                    <p class="text-blue-600 font-medium">Belajar Mandiri. Pahami Materi. Kembangkan Potensi.</p>
                </div>

                <div v-if="status" class="mb-4 text-sm font-medium text-green-600 text-center">
                    {{ status }}
                </div>

                <!-- Form -->
                <form @submit.prevent="submit" class="space-y-5">
                    <div>
                        <input
                            id="email"
                            type="text"
                            placeholder="Email atau Nama Pengguna"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none text-gray-700"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</div>
                    </div>

                    <div>
                        <input
                            id="password"
                            type="password"
                            placeholder="Kata Sandi"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none text-gray-700"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />
                        <div v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" v-model="form.remember" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-sm font-medium text-blue-600 hover:text-blue-500"
                        >
                            Lupa kata sandi?
                        </Link>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-all flex justify-center items-center disabled:opacity-70"
                        :disabled="form.processing"
                    >
                        <span v-if="!form.processing">Masuk</span>
                        <svg v-else class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </form>

                <p class="text-center text-sm text-gray-600 mt-8">
                    Belum punya akun? 
                    <Link :href="route('register')" class="font-semibold text-blue-600 hover:text-blue-500">Daftar sekarang</Link>
                </p>

            </div>
        </div>

        <!-- Right Side: Illustration -->
        <div class="hidden lg:flex lg:w-1/2 bg-blue-50 flex-col justify-center items-center p-12 relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-blue-200 rounded-full blur-3xl opacity-50"></div>
            
            <div class="relative z-10 text-center max-w-lg mb-12">
                <h2 class="text-4xl font-bold text-blue-900 mb-4 leading-tight">
                    Belajar kapan saja, di mana saja, dengan bantuan AI
                </h2>
            </div>
            
            <!-- Custom Illustration Placeholder matching the style -->
            <div class="relative z-10 w-full max-w-md aspect-square bg-white rounded-full shadow-2xl p-8 flex items-center justify-center border-8 border-blue-100/50">
                <!-- Inner content representing illustration -->
                <div class="text-center space-y-4">
                    <div class="flex justify-center gap-4">
                        <div class="w-24 h-32 bg-blue-200 rounded-lg shadow-inner"></div>
                        <div class="w-24 h-32 bg-green-200 rounded-lg shadow-inner translate-y-4"></div>
                    </div>
                    <div class="flex justify-center gap-4">
                        <div class="w-16 h-12 bg-purple-200 rounded-lg shadow-inner"></div>
                        <div class="w-32 h-16 bg-gray-100 rounded-lg shadow-inner border-b-4 border-gray-300"></div>
                    </div>
                    <p class="text-sm font-bold text-blue-800 mt-4">Illustration Placeholder</p>
                </div>
            </div>
        </div>

    </div>
</template>
