@extends('layouts.app')

@section('title', 'Cari Gigs - QuickGigs')

@section('content')
<!-- Search Header -->
<section class="bg-gradient-to-r from-dark-800 to-dark-900 py-8 border-b border-dark-700">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-6 text-center">
                Cari Layanan Freelance
            </h1>
            
            <!-- Search Form -->
            <form action="{{ route('quickgigs.search') }}" method="GET" class="space-y-4">
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                    <!-- Search Input -->
                    <div class="flex-1 relative">
                        <input type="text" 
                               name="q" 
                               value="{{ request('q') }}"
                               placeholder="Cari layanan yang Anda butuhkan..."
                               class="w-full bg-dark-700 text-white placeholder-gray-400 border border-dark-600 rounded-lg px-4 py-3 focus:outline-none focus:border-emerald-400">
                        <svg class="absolute right-4 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    
                    <!-- Category Filter -->
                    <select name="category" class="bg-dark-700 text-white border border-dark-600 rounded-lg px-4 py-3 focus:outline-none focus:border-emerald-400">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') === $category->slug ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-8 py-3 rounded-lg transition-colors">
                        Cari
                    </button>
                </div>
                
                <!-- Advanced Filters -->
                <div class="flex flex-wrap gap-4 text-sm">
                    <select name="sort" class="bg-dark-700 text-white border border-dark-600 rounded px-3 py-2 focus:outline-none focus:border-emerald-400">
                        <option value="">Urutkan</option>
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                        <option value="rating" {{ request('sort') === 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                        <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Terpopuler</option>
                    </select>
                    
                    <select name="price_range" class="bg-dark-700 text-white border border-dark-600 rounded px-3 py-2 focus:outline-none focus:border-emerald-400">
                        <option value="">Semua Harga</option>
                        <option value="0-25" {{ request('price_range') === '0-25' ? 'selected' : '' }}>$0 - $25</option>
                        <option value="25-50" {{ request('price_range') === '25-50' ? 'selected' : '' }}>$25 - $50</option>
                        <option value="50-100" {{ request('price_range') === '50-100' ? 'selected' : '' }}>$50 - $100</option>
                        <option value="100+" {{ request('price_range') === '100+' ? 'selected' : '' }}>$100+</option>
                    </select>
                    
                    <select name="delivery" class="bg-dark-700 text-white border border-dark-600 rounded px-3 py-2 focus:outline-none focus:border-emerald-400">
                        <option value="">Semua Waktu</option>
                        <option value="1" {{ request('delivery') === '1' ? 'selected' : '' }}>1 Hari</option>
                        <option value="3" {{ request('delivery') === '3' ? 'selected' : '' }}>3 Hari</option>
                        <option value="7" {{ request('delivery') === '7' ? 'selected' : '' }}>7 Hari</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Search Results -->
<section class="py-8 bg-dark-900">
    <div class="container mx-auto px-4">
        <!-- Results Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                @if(request('q'))
                    <h2 class="text-2xl font-bold text-white mb-2">
                        Hasil pencarian untuk "{{ request('q') }}"
                    </h2>
                    <p class="text-gray-400">
                        {{ $gigs->total() }} gig ditemukan
                    </p>
                @else
                    <h2 class="text-2xl font-bold text-white mb-2">
                        Semua Gigs
                    </h2>
                    <p class="text-gray-400">
                        {{ $gigs->total() }} gig tersedia
                    </p>
                @endif
            </div>
            
            <!-- View Toggle -->
            <div class="flex items-center space-x-2 mt-4 md:mt-0">
                <span class="text-gray-400 text-sm">Tampilan:</span>
                <button id="grid-view" class="p-2 text-emerald-400 bg-dark-700 rounded">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                </button>
                <button id="list-view" class="p-2 text-gray-400 hover:text-emerald-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        @if($gigs->count() > 0)
            <!-- Results Grid -->
            <div id="results-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @foreach($gigs as $gig)
                    <x-gig-card :gig="$gig" />
                @endforeach
            </div>
            
            <!-- Results List (Hidden by default) -->
            <div id="results-list" class="space-y-6 mb-8 hidden">
                @foreach($gigs as $gig)
                    <div class="bg-dark-800 rounded-xl overflow-hidden border border-dark-700 hover:border-emerald-400 transition-colors">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-80 h-48 md:h-auto">
                                @if($gig->images && count($gig->images) > 0)
                                    <img src="{{ $gig->images[0] }}" 
                                         alt="{{ $gig->title }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-emerald-400 to-blue-500 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 p-6">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-emerald-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                                        {{ $gig->category->name }}
                                    </span>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <span class="text-yellow-400 text-sm font-medium">{{ number_format($gig->rating, 1) }}</span>
                                        <span class="text-gray-400 text-sm">({{ $gig->reviews_count }})</span>
                                    </div>
                                </div>
                                <h3 class="text-white text-lg font-semibold mb-2 line-clamp-2">
                                    <a href="{{ route('quickgigs.show', $gig->slug) }}" class="hover:text-emerald-400 transition-colors">
                                        {{ $gig->title }}
                                    </a>
                                </h3>
                                <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                                    {{ $gig->description }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-emerald-400 to-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-sm font-bold">{{ substr($gig->user->name, 0, 1) }}</span>
                                        </div>
                                        <span class="text-gray-300 text-sm">{{ $gig->user->name }}</span>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-emerald-400 text-xl font-bold">
                                            ${{ number_format($gig->price, 0) }}
                                        </div>
                                        <div class="text-gray-400 text-xs">
                                            {{ $gig->delivery_time }} hari
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $gigs->links('components.pagination') }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-16">
                <svg class="w-24 h-24 text-gray-600 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-white mb-4">Tidak Ada Hasil Ditemukan</h3>
                <p class="text-gray-400 mb-8">
                    Coba gunakan kata kunci yang berbeda atau ubah filter pencarian Anda
                </p>
                <a href="{{ route('quickgigs.index') }}" 
                   class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-8 py-3 rounded-lg transition-colors inline-block">
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const gridView = document.getElementById('grid-view');
    const listView = document.getElementById('list-view');
    const resultsGrid = document.getElementById('results-grid');
    const resultsList = document.getElementById('results-list');
    
    gridView.addEventListener('click', function() {
        resultsGrid.classList.remove('hidden');
        resultsList.classList.add('hidden');
        gridView.classList.add('text-emerald-400', 'bg-dark-700');
        listView.classList.remove('text-emerald-400', 'bg-dark-700');
        listView.classList.add('text-gray-400');
    });
    
    listView.addEventListener('click', function() {
        resultsGrid.classList.add('hidden');
        resultsList.classList.remove('hidden');
        listView.classList.add('text-emerald-400', 'bg-dark-700');
        gridView.classList.remove('text-emerald-400', 'bg-dark-700');
        gridView.classList.add('text-gray-400');
    });
});
</script>
@endsection