<x-app-layout>
    <div class="min-h-screen bg-slate-50 pb-20">
        <!-- Back Navigation & Header -->
        <div class="bg-white border-b border-slate-100 sticky top-0 z-30 shadow-sm">
            <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
                <a href="{{ route('news.index') }}" class="inline-flex items-center text-slate-500 font-black text-xs uppercase tracking-widest hover:text-blue-600 transition-colors group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Back to Archive
                </a>
                <div class="flex gap-3">
                    <a href="{{ route('news.edit', $news->id) }}" class="inline-flex items-center px-5 py-2 bg-amber-500 text-white font-black text-xs uppercase tracking-widest rounded-xl hover:bg-amber-600 transition-all shadow-lg shadow-amber-200">
                        Edit Article
                    </a>
                </div>
            </div>
        </div>

        <!-- Article Hero -->
        <div class="relative h-[60vh] min-h-[400px] w-full overflow-hidden">
            <img src="{{ asset('storage/' . $news->gambar) }}"
                class="w-full h-full object-cover scale-105"
                alt="{{ $news->judul }}">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>

            <div class="absolute bottom-0 left-0 w-full p-8 md:p-20">
                <div class="max-w-5xl mx-auto">
                    <span class="inline-block px-4 py-1.5 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-lg mb-6 shadow-xl">
                        {{ $news->category->nama_kategori ?? 'Official Report' }}
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white leading-[1.1] tracking-tight uppercase">
                        {{ $news->judul }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto px-4 -mt-10 relative z-10">
            <div class="flex flex-col lg:flex-row gap-10">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <article class="bg-white rounded-[2.5rem] p-8 md:p-16 shadow-2xl shadow-slate-200/50 border border-slate-100">
                        <!-- Metadata Row -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-12 pb-10 border-b border-slate-50">
                            <div class="flex items-center">
                                <div class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center font-black text-lg mr-4 shadow-sm">
                                    {{ substr($news->author, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest mb-0.5">Author</p>
                                    <p class="text-sm font-black text-slate-800">{{ $news->author }}</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mr-4 shadow-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest mb-0.5">Published</p>
                                    <p class="text-sm font-black text-slate-800">{{ \Carbon\Carbon::parse($news->tanggal_terbit)->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>

                            <div class="hidden md:flex items-center">
                                <div class="h-12 w-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center mr-4 shadow-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest mb-0.5">Reference</p>
                                    <p class="text-sm font-black text-slate-800">Verified</p>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="prose prose-slate prose-xl max-w-none text-slate-600 leading-[1.8] font-medium italic-none">
                            @foreach(explode("\n", $news->isi_berita) as $paragraph)
                                @if(trim($paragraph))
                                    <p class="mb-8 last:mb-0">{{ $paragraph }}</p>
                                @endif
                            @endforeach
                        </div>

                        <!-- Share Section -->
                        <div class="mt-16 pt-10 border-t border-slate-50 flex flex-col md:flex-row items-center justify-between gap-6">
                            <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Share this story</p>
                            <div class="flex gap-4">
                                <button class="w-12 h-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                </button>
                                <button class="w-12 h-12 rounded-2xl bg-blue-700 text-white flex items-center justify-center hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                                </button>
                                <button class="w-12 h-12 rounded-2xl bg-indigo-600 text-white flex items-center justify-center hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar (FIFA Decorative) -->
                <div class="lg:w-1/3">
                    <div class="sticky top-24 space-y-8">
                        <div class="bg-gradient-to-br from-blue-900 to-indigo-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl">
                            <div class="absolute -right-10 -top-10 opacity-10">
                                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/></svg>
                            </div>
                            <h3 class="text-2xl font-black mb-4 uppercase tracking-tight">WC 2026 OFFICIAL</h3>
                            <p class="text-blue-200 text-sm font-medium leading-relaxed mb-6">Pastikan seluruh konten berita mematuhi pedoman publikasi resmi FIFA World Cup 2026.</p>
                            <div class="space-y-4">
                                <div class="flex items-center text-xs font-bold uppercase tracking-widest text-amber-400">
                                    <div class="w-2 h-2 rounded-full bg-amber-400 mr-3 animate-pulse"></div>
                                    Live Coverage Enabled
                                </div>
                                <div class="flex items-center text-xs font-bold uppercase tracking-widest text-green-400">
                                    <div class="w-2 h-2 rounded-full bg-green-400 mr-3"></div>
                                    Verified Source
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                            <h4 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-6">Official Partners</h4>
                            <div class="grid grid-cols-2 gap-4 opacity-30 grayscale hover:grayscale-0 transition-all duration-500">
                                <div class="h-12 bg-slate-100 rounded-xl"></div>
                                <div class="h-12 bg-slate-100 rounded-xl"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>