<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl text-slate-600 font-bold hover:text-blue-600 hover:border-blue-100 hover:bg-blue-50 transition-all shadow-sm group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Dashboard
                </a>
                <h2 class="font-black text-3xl text-slate-800 tracking-tight">
                    Admin <span class="text-amber-500">Settings</span>
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="p-6 sm:p-10 bg-white shadow-xl shadow-slate-200/50 border border-slate-100 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white shadow-xl shadow-slate-200/50 border border-slate-100 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white shadow-xl shadow-slate-200/50 border border-slate-100 rounded-[2.5rem]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
