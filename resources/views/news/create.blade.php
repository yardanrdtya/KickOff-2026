<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('news.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl text-slate-600 font-bold hover:text-blue-600 hover:border-blue-100 hover:bg-blue-50 transition-all shadow-sm group">
                <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Archive
            </a>
            <h2 class="font-black text-3xl text-slate-800 tracking-tight">
                Publish <span class="text-blue-600">New Article</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-8 p-5 text-rose-800 bg-rose-50 border-l-8 border-rose-600 rounded-2xl shadow-sm animate-fade-in-down">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <span class="font-black uppercase tracking-widest text-sm">Validasi Gagal</span>
                    </div>
                    <ul class="list-disc list-inside text-sm font-bold opacity-80">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('news.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  x-data="{ 
                    imagePreview: null,
                    handleFileChange(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => { this.imagePreview = e.target.result; };
                            reader.readAsDataURL(file);
                        }
                    }
                  }">
                @csrf

                <div class="bg-white shadow-xl shadow-slate-200/50 border border-slate-100 rounded-[2.5rem] overflow-hidden">
                    <!-- Form Header -->
                    <div class="px-10 py-8 border-b border-slate-50 bg-slate-50/50">
                        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Article Details</h3>
                        <p class="text-sm text-slate-500 font-medium mt-1">Lengkapi informasi berita Piala Dunia 2026 di bawah ini.</p>
                    </div>

                    <div class="p-10 space-y-8">
                        <!-- Judul Berita -->
                        <div>
                            <label for="judul" class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Headline Title</label>
                            <input type="text"
                                name="judul"
                                id="judul"
                                value="{{ old('judul') }}"
                                placeholder="e.g. Opening Ceremony WC 2026 Revealed!"
                                class="w-full px-6 py-4 rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all bg-slate-50 focus:bg-white font-bold text-slate-700">
                        </div>

                        <!-- Grid: Kategori & Tanggal -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="category_id" class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Category</label>
                                <select name="category_id"
                                    id="category_id"
                                    class="w-full px-6 py-4 rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all bg-slate-50 focus:bg-white font-bold text-slate-700">
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="tanggal_terbit" class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Publish Date</label>
                                <input type="date"
                                    name="tanggal_terbit"
                                    id="tanggal_terbit"
                                    value="{{ old('tanggal_terbit') }}"
                                    class="w-full px-6 py-4 rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all bg-slate-50 focus:bg-white font-bold text-slate-700">
                            </div>
                        </div>

                        <!-- Isi Berita -->
                        <div>
                            <label for="isi_berita" class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Article Body</label>
                            <textarea name="isi_berita"
                                id="isi_berita"
                                rows="10"
                                placeholder="Start writing the story..."
                                class="w-full px-6 py-4 rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all bg-slate-50 focus:bg-white font-medium text-slate-600 leading-relaxed">{{ old('isi_berita') }}</textarea>
                        </div>

                        <!-- Author & Gambar -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="author" class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Author Name</label>
                                <input type="text"
                                    name="author"
                                    id="author"
                                    value="{{ old('author') }}"
                                    placeholder="e.g. FIFA Editorial Team"
                                    class="w-full px-6 py-4 rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all bg-slate-50 focus:bg-white font-bold text-slate-700">
                            </div>

                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">Feature Image</label>
                                <div 
                                    @click="$refs.fileInput.click()"
                                    class="relative group cursor-pointer"
                                >
                                    <!-- Upload Placeholder -->
                                    <div 
                                        x-show="!imagePreview"
                                        class="flex flex-col items-center justify-center h-48 border-4 border-slate-100 border-dashed rounded-[2rem] bg-slate-50 group-hover:bg-blue-50 group-hover:border-blue-200 transition-all overflow-hidden"
                                    >
                                        <svg class="w-12 h-12 text-slate-300 group-hover:text-blue-500 transition-colors mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-xs font-black text-slate-400 group-hover:text-blue-600 uppercase tracking-widest">Click to Upload</p>
                                    </div>

                                    <!-- Image Preview -->
                                    <div 
                                        x-show="imagePreview"
                                        class="h-48 rounded-[2rem] overflow-hidden border-4 border-white shadow-lg relative group"
                                    >
                                        <img :src="imagePreview" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                            <span class="px-4 py-2 bg-white/20 backdrop-blur-md rounded-xl text-white font-black text-[10px] uppercase tracking-widest border border-white/30">Change Image</span>
                                        </div>
                                    </div>

                                    <input 
                                        type="file" 
                                        name="gambar" 
                                        x-ref="fileInput" 
                                        class="hidden" 
                                        @change="handleFileChange"
                                        accept="image/*"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Footer -->
                    <div class="px-10 py-8 bg-slate-50 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-6">
                        <p class="text-xs font-bold text-slate-400 italic">Official WC 2026 Content Management System</p>
                        <div class="flex gap-4 w-full sm:w-auto">
                            <a href="{{ route('news.index') }}" class="flex-1 sm:flex-none px-8 py-4 rounded-2xl border border-slate-200 text-slate-600 font-black text-sm uppercase tracking-widest hover:bg-slate-100 transition-all text-center">Batal</a>
                            <button type="submit" class="flex-1 sm:flex-none px-10 py-4 bg-blue-600 text-white rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-blue-700 hover:scale-105 transition-all shadow-xl shadow-blue-200">
                                PUBLISH ARTICLE
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>