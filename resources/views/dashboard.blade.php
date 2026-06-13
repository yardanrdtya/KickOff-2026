<x-app-layout>
    <div class="min-h-screen bg-slate-50">
        <!-- Hero Section with Soccer Theme -->
        <div class="relative bg-gradient-to-br from-blue-900 via-indigo-900 to-blue-800 py-16 overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 opacity-10">
                <svg class="w-96 h-96 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>
            </div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 opacity-5">
                <svg class="w-64 h-64 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99z"/></svg>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="text-center md:text-left animate-fade-in-down">
                        <span class="inline-block px-4 py-1.5 bg-amber-500 text-blue-900 text-xs font-black uppercase tracking-[0.2em] rounded-full mb-4 shadow-lg shadow-amber-500/20">
                            FIFA World Cup 2026
                        </span>
                        <h1 class="text-4xl md:text-6xl font-black text-white leading-tight mb-4">
                            Admin <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-yellow-200">Kick Off</span> Portal
                        </h1>
                        <p class="text-blue-100 text-lg max-w-xl opacity-90 leading-relaxed">
                            Pusat kendali informasi turnamen terbesar di dunia. Kelola berita, pantau statistik, dan pastikan setiap momen emas terabadikan.
                        </p>
                    </div>
                    <div class="hidden lg:block animate-bounce-slow">
                        <div class="relative">
                            <div class="absolute inset-0 bg-amber-500 blur-3xl opacity-20 rounded-full"></div>
                            <svg class="w-48 h-48 text-amber-400 drop-shadow-2xl" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 2H6C4.9 2 4 2.9 4 4V9C4 14.52 8.48 19 14 19V21H10V23H14C15.1 23 16 22.1 16 21V19C21.52 19 26 14.52 26 9V4C26 2.9 25.1 2 24 2H18ZM24 9C24 13.41 20.41 17 16 17H8C3.59 17 0 13.41 0 9V4H24V9Z" transform="scale(0.8)"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 pb-20">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Card Berita -->
                <div class="group bg-gradient-to-br from-blue-600 to-indigo-700 p-8 rounded-[2rem] shadow-xl shadow-blue-900/20 hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 opacity-10 group-hover:scale-125 transition-transform duration-500">
                        <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" stroke-width="2"/></svg>
                    </div>
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-bold uppercase tracking-widest mb-1">Berita Publikasi</p>
                            <h3 class="text-5xl font-black text-white">{{ $totalBerita }}</h3>
                        </div>
                        <div class="p-4 bg-white/10 rounded-2xl backdrop-blur-md">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Card Kategori -->
                <div class="group bg-gradient-to-br from-rose-600 to-red-700 p-8 rounded-[2rem] shadow-xl shadow-rose-900/20 hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 opacity-10 group-hover:scale-125 transition-transform duration-500">
                        <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 7h.01M7 11h.01M7 15h.01M13 7h.01M13 11h.01M13 15h.01" stroke-width="2"/></svg>
                    </div>
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-rose-100 text-sm font-bold uppercase tracking-widest mb-1">Sektor Berita</p>
                            <h3 class="text-5xl font-black text-white">{{ $totalKategori }}</h3>
                        </div>
                        <div class="p-4 bg-white/10 rounded-2xl backdrop-blur-md">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16" stroke-width="2"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Card User -->
                <div class="group bg-gradient-to-br from-amber-500 to-orange-600 p-8 rounded-[2rem] shadow-xl shadow-amber-900/20 hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 opacity-10 group-hover:scale-125 transition-transform duration-500">
                        <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2"/></svg>
                    </div>
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-amber-100 text-sm font-bold uppercase tracking-widest mb-1">Official Team</p>
                            <h3 class="text-5xl font-black text-white">{{ $totalUser }}</h3>
                        </div>
                        <div class="p-4 bg-white/10 rounded-2xl backdrop-blur-md">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-width="2"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management Section -->
            <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-100 relative overflow-hidden">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                    <div>
                        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Management Suite</h2>
                        <p class="text-slate-500 font-medium">Lakukan pembaruan konten secara cepat melalui akses di bawah ini.</p>
                    </div>
                    <a href="{{ route('news.create') }}" class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-black rounded-2xl hover:bg-blue-700 hover:scale-105 transition-all shadow-lg shadow-blue-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3"/></svg>
                        PUBLISH NEW ARTICLE
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('news.index') }}" class="group flex items-center p-6 bg-slate-50 rounded-[1.5rem] hover:bg-blue-600 transition-all duration-300">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mr-5 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" stroke-width="2"/></svg>
                        </div>
                        <div>
                            <span class="block text-xl font-bold text-slate-800 group-hover:text-white transition-colors">News Hub</span>
                            <span class="text-sm text-slate-500 group-hover:text-blue-100 transition-colors">Kelola seluruh database berita</span>
                        </div>
                    </a>

                    <div class="group flex items-center p-6 bg-slate-50 rounded-[1.5rem] opacity-60 cursor-not-allowed">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mr-5">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 7h.01M7 11h.01M7 15h.01" stroke-width="2"/></svg>
                        </div>
                        <div>
                            <span class="block text-xl font-bold text-slate-400">Categories</span>
                            <span class="text-sm text-slate-400">Pengaturan sektor turnamen</span>
                        </div>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="group flex items-center p-6 bg-slate-50 rounded-[1.5rem] hover:bg-amber-500 transition-all duration-300">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mr-5 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke-width="2"/></svg>
                        </div>
                        <div>
                            <span class="block text-xl font-bold text-slate-800 group-hover:text-white transition-colors">Admin Settings</span>
                            <span class="text-sm text-slate-500 group-hover:text-amber-50 group-hover:opacity-80 transition-colors">Konfigurasi profil & keamanan</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down { animation: fade-in-down 0.8s ease-out; }
        .animate-bounce-slow { animation: bounce 3s infinite; }
        @keyframes bounce {
            0%, 100% { transform: translateY(-5%); animation-timing-function: cubic-bezier(0.8,0,1,1); }
            50% { transform: none; animation-timing-function: cubic-bezier(0,0,0.2,1); }
        }
    </style>
</x-app-layout>