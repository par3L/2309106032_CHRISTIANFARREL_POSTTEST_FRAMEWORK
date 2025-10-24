@extends('layouts.app')

@section('title', $category->name . ' - QuickGigs')

@section('content')
<!-- header kategori -->
<section class="bg-gradient-to-r from-dark-900 to-dark-800 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="flex justify-center mb-6">
                <x-category-icon :category="$category" size="xl" />
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                {{ $category->name }}
            </h1>
            <p class="text-xl text-gray-300 mb-8">
                {{ $category->description }}
            </p>
            <div class="bg-dark-700 text-gray-300 px-4 py-2 rounded-full inline-block">
                {{ $gigs->total() }} layanan ditemukan
            </div>
        </div>
    </div>
</section>

<!-- pencarian -->
<section class="bg-dark-800 py-6 border-b border-dark-700">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari dalam {{ $category->name }}..." 
                           class="w-full px-4 py-2 bg-dark-700 text-white rounded-lg border border-dark-600 focus:border-emerald-500 focus:outline-none">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-emerald-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- urutan -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-400">Urutkan:</span>
                <select class="bg-dark-700 text-white px-4 py-2 rounded-lg border border-dark-600 focus:border-emerald-500 focus:outline-none">
                    <option>Terpopuler</option>
                    <option>Rating Tertinggi</option>
                    <option>Harga Terendah</option>
                    <option>Harga Tertinggi</option>
                    <option>Terbaru</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- grid gigs -->
<section class="py-12 bg-dark-900">
    <div class="container mx-auto px-4">
        @if($gigs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($gigs as $gig)
                    <x-gig-card :gig="$gig" />
                @endforeach
            </div>
            
            <!-- paginasi -->
            <div class="mt-12">
                {{ $gigs->links('components.pagination') }}
            </div>
        @else
            <div class="text-center py-16">
                <span class="material-icons text-8xl mb-6 text-gray-500">search_off</span>
                <h3 class="text-2xl font-bold text-white mb-4">Belum Ada Gigs</h3>
                <p class="text-gray-400 mb-8">Belum ada layanan tersedia dalam kategori ini.</p>
                <a href="{{ route('quickgigs.index') }}" 
                   class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center gap-2">
                    <span class="material-icons">arrow_back</span>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- kategori terkait -->
<section class="py-12 bg-dark-800">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-white mb-8 text-center">Kategori Lainnya</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @php
                $otherCategories = \App\Models\Category::where('id', '!=', $category->id)->take(6)->get();
            @endphp
            
            @foreach($otherCategories as $otherCategory)
                <a href="{{ route('quickgigs.category', $otherCategory->slug) }}" 
                   class="bg-dark-700 hover:bg-dark-600 p-4 rounded-lg text-center transition-colors border border-dark-600 hover:border-emerald-500">
                    <x-category-icon :category="$otherCategory" />
                    <div class="text-white text-sm font-medium mt-2">{{ $otherCategory->name }}</div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection