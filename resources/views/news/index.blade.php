<x-app-layout>
    <div x-data="newsManager()" x-init="init()" class="py-12 bg-slate-50 min-h-screen relative">
        <!-- Toast Notification -->
        <template x-if="toast.show">
            <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="fixed bottom-10 right-10 z-[110] flex items-center p-5 bg-slate-900 text-white rounded-[1.5rem] shadow-2xl border border-slate-700"
            >
                <div class="p-2 bg-blue-600 rounded-lg mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="pr-8">
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400 mb-0.5">Notification</p>
                    <p class="font-bold" x-text="toast.message"></p>
                </div>
                <button @click="toast.show = false" class="text-slate-500 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2.5"/></svg>
                </button>
            </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                <div class="flex items-center gap-4">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl text-slate-600 font-bold hover:text-blue-600 hover:border-blue-100 hover:bg-blue-50 transition-all shadow-sm group">
                        <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Dashboard
                    </a>
                    <h2 class="font-black text-3xl text-slate-800 tracking-tight">
                        News <span class="text-blue-600">Archive</span>
                    </h2>
                </div>
                <a href="{{ route('news.create') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-black rounded-2xl hover:scale-105 transition-all shadow-xl shadow-blue-200 uppercase tracking-wider text-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Publish New Article
                </a>
            </div>

            <!-- Search Card -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 mb-10 overflow-hidden relative">
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <svg class="w-24 h-24 text-blue-900" fill="currentColor" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                </div>
                <form action="{{ route('news.index') }}" method="GET" class="relative z-10">
                    <div class="flex flex-col lg:flex-row gap-5">
                        <div class="flex-grow">
                            <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Search Article</label>
                            <div class="relative">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Enter title, author, or keyword..."
                                    class="block w-full pl-6 pr-12 py-4 border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-2xl text-slate-700 bg-slate-50 transition-all font-medium"
                                >
                                <div class="absolute inset-y-0 right-0 flex items-center pr-5 text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end gap-3">
                            <button type="submit" class="px-10 py-4 bg-slate-800 text-white font-black rounded-2xl hover:bg-slate-900 transition-all shadow-lg">
                                FILTER
                            </button>
                            @if(request('search'))
                                <a href="{{ route('news.index') }}" class="px-6 py-4 bg-slate-100 text-slate-500 font-bold rounded-2xl hover:bg-slate-200 transition-all text-center">
                                    RESET
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            <!-- News Table Card -->
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-100">
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Article Info</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Category</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Author</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Publish Date</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($news as $item)
                            <tr id="news-row-{{ $item->id }}" class="hover:bg-blue-50/20 transition-all duration-300 group">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-6">
                                        <div class="relative flex-shrink-0 group-hover:scale-105 transition-transform duration-500">
                                            <div class="absolute -inset-1 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
                                            <img class="relative h-16 w-16 rounded-2xl object-cover shadow-md border-2 border-white" src="{{ asset('storage/' . $item->gambar) }}" alt="">
                                        </div>
                                        <div class="max-w-md">
                                            <h4 class="text-lg font-black text-slate-800 group-hover:text-blue-700 transition-colors line-clamp-1 uppercase tracking-tight">{{ $item->judul }}</h4>
                                            <p class="text-xs text-slate-400 font-bold mt-1 uppercase tracking-widest">ID: #WC2026-{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.15em] {{ $loop->index % 2 == 0 ? 'bg-blue-100 text-blue-800' : 'bg-rose-100 text-rose-800' }}">
                                        {{ $item->category->nama_kategori ?? 'Official News' }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center">
                                        <div class="h-9 w-9 rounded-xl bg-slate-800 text-white flex items-center justify-center font-black text-sm mr-3 shadow-md">
                                            {{ substr($item->author, 0, 1) }}
                                        </div>
                                        <span class="text-sm font-bold text-slate-600">{{ $item->author }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-sm font-black text-slate-500">
                                    {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d M Y') }}
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('news.show', $item->id) }}" class="w-10 h-10 flex items-center justify-center bg-slate-50 text-slate-400 hover:bg-blue-600 hover:text-white rounded-xl transition-all shadow-sm" title="View Article">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2.5"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2.5"/></svg>
                                        </a>
                                        <a href="{{ route('news.edit', $item->id) }}" class="w-10 h-10 flex items-center justify-center bg-slate-50 text-slate-400 hover:bg-amber-500 hover:text-white rounded-xl transition-all shadow-sm" title="Edit Article">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2.5"/></svg>
                                        </a>
                                        <button
                                            @click="confirmDelete({{ $item->id }}, '{{ route('news.destroy', $item->id) }}')"
                                            class="w-10 h-10 flex items-center justify-center bg-slate-50 text-slate-400 hover:bg-rose-600 hover:text-white rounded-xl transition-all shadow-sm"
                                            title="Delete Article"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2.5"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-24 h-24 bg-slate-100 rounded-[2rem] flex items-center justify-center mb-6">
                                            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" stroke-width="2"/></svg>
                                        </div>
                                        <p class="text-2xl font-black text-slate-800 mb-2">Empty Archive</p>
                                        <p class="text-slate-500 font-medium">Mulai tulis sejarah Piala Dunia 2026 sekarang.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Custom Delete Modal -->
            <div
                x-show="showDeleteModal"
                class="fixed inset-0 z-[100] overflow-y-auto"
                x-cloak
            >
                <div
                    x-show="showDeleteModal"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity"
                ></div>

                <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
                    <div
                        x-show="showDeleteModal"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative transform overflow-hidden rounded-[2.5rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                        @click.away="showDeleteModal = false"
                    >
                        <div class="bg-white px-8 pt-10 pb-8">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-[1.5rem] bg-rose-50 sm:mx-0">
                                    <svg class="h-10 w-10 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div class="mt-6 text-center sm:mt-0 sm:ml-8 sm:text-left">
                                    <h3 class="text-2xl font-black leading-6 text-slate-800 uppercase tracking-tight">Konfirmasi Penghapusan</h3>
                                    <div class="mt-4">
                                        <p class="text-slate-500 font-medium leading-relaxed">Apakah Anda yakin ingin menghapus artikel berita ini secara permanen? Tindakan ini tidak dapat dibatalkan dari sistem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-slate-50 px-8 py-6 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                            <button
                                @click="showDeleteModal = false"
                                type="button"
                                class="inline-flex w-full justify-center rounded-2xl bg-white px-6 py-4 text-sm font-black text-slate-700 shadow-sm border border-slate-200 hover:bg-slate-100 sm:w-auto transition-all"
                            >
                                CANCEL
                            </button>
                            <button
                                @click="executeDelete()"
                                :disabled="isDeleting"
                                class="inline-flex w-full justify-center rounded-2xl bg-rose-600 px-8 py-4 text-sm font-black text-white shadow-xl shadow-rose-200 hover:bg-rose-700 sm:w-auto transition-all disabled:opacity-50"
                            >
                                <span x-show="!isDeleting uppercase tracking-widest">CONFIRM DELETE</span>
                                <span x-show="isDeleting" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    DELETING...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function newsManager() {
            return {
                showDeleteModal: false,
                isDeleting: false,
                targetId: null,
                deleteAction: '',
                toast: {
                    show: false,
                    message: ''
                },

                init() {
                    // Check for session success messages on load (if any)
                    @if(session('success'))
                        this.showToast("{{ session('success') }}");
                    @endif
                },

                confirmDelete(id, action) {
                    this.targetId = id;
                    this.deleteAction = action;
                    this.showDeleteModal = true;
                },

                async executeDelete() {
                    this.isDeleting = true;

                    try {
                        const response = await fetch(this.deleteAction, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({
                                _method: 'DELETE'
                            })
                        });

                        if (response.ok) {
                            // Remove element from DOM
                            const row = document.getElementById(`news-row-${this.targetId}`);
                            if (row) {
                                row.classList.add('opacity-0', 'scale-95');
                                setTimeout(() => row.remove(), 300);
                            }

                            this.showToast('Berita berhasil dihapus secara permanen.');
                        } else {
                            this.showToast('Gagal menghapus berita. Silakan coba lagi.');
                        }
                    } catch (error) {
                        console.error('Delete error:', error);
                        this.showToast('Terjadi kesalahan jaringan.');
                    } finally {
                        this.isDeleting = false;
                        this.showDeleteModal = false;
                    }
                },

                showToast(message) {
                    this.toast.message = message;
                    this.toast.show = true;
                    setTimeout(() => {
                        this.toast.show = false;
                    }, 5000);
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        .animate-fade-in-down { animation: fade-in-down 0.5s ease-out; }
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</x-app-layout>