@extends('layouts.app')

@section('title', 'QuickGigs - Platform Freelance Modern')

@section('content')
<!-- hero -->
<section class="relative bg-gradient-to-br from-dark-900 via-dark-800 to-emerald-900 py-20">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="container mx-auto px-4 relative">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Find the Perfect 
                <span class="text-emerald-400">Service</span>
                for You
            </h1>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Hubungkan dengan freelancer terbaik untuk project impian Anda. 
                Dari programming hingga design, temukan talenta berkualitas tinggi.
            </p>
            
            <!-- search -->
            <div class="max-w-2xl mx-auto">
                <form action="{{ route('quickgigs.search') }}" method="GET">
                    <div class="bg-white rounded-full p-2 flex items-center shadow-2xl">
                        <input type="text" 
                               name="q"
                               placeholder="Cari layanan yang Anda butuhkan..." 
                               class="flex-1 px-6 py-3 text-gray-800 text-lg rounded-full border-0 focus:outline-none">
                        <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-3 rounded-full font-semibold transition-colors">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- kategori -->
<section class="py-16 bg-dark-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Jelajahi Kategori
            </h2>
            <p class="text-gray-400 text-lg">
                Temukan layanan freelance terbaik di berbagai kategori
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
            <div class="bg-dark-800 rounded-xl p-6 border border-dark-700 hover:border-emerald-500 transition-all duration-300 group cursor-pointer">
                <div class="flex items-center space-x-4 mb-4">
                    <x-category-icon :category="$category" />
                    <div>
                        <h3 class="text-xl font-semibold text-white group-hover:text-emerald-400 transition-colors">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-400 text-sm">{{ $category->gigs->count() }} layanan tersedia</p>
                    </div>
                </div>
                <p class="text-gray-400 mb-4">{{ $category->description }}</p>
                <a href="{{ route('quickgigs.category', $category->slug) }}" 
                   class="text-emerald-400 hover:text-emerald-300 font-medium inline-flex items-center space-x-1">
                    <span>Lihat Semua</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- featured -->
<section class="py-16 bg-dark-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Layanan Terpopuler
            </h2>
            <p class="text-gray-400 text-lg">
                Gigs terbaik dari freelancer berpengalaman
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($featuredGigs as $gig)
                <x-gig-card :gig="$gig" />
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400 text-lg">Belum ada gigs tersedia</p>
                </div>
            @endforelse
        </div>
        
        @if($featuredGigs->count() > 0)
        <div class="text-center mt-12">
            <a href="#" class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center space-x-2">
                <span>Lihat Semua Gigs</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- stats  -->
<section class="py-16 bg-dark-900">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl font-bold text-emerald-400 mb-2">1M+</div>
                <div class="text-gray-400">Active Users</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-emerald-400 mb-2">500K+</div>
                <div class="text-gray-400">Completed Projects</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-emerald-400 mb-2">50K+</div>
                <div class="text-gray-400">Expert Freelancers</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-emerald-400 mb-2">99%</div>
                <div class="text-gray-400">Client Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- cara kerja -->
<section class="py-16 bg-dark-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Cara Kerja QuickGigs
            </h2>
            <p class="text-gray-400 text-lg">
                Proses sederhana untuk mendapatkan pekerjaan berkualitas
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">1. Cari & Pilih</h3>
                <p class="text-gray-400">
                    Temukan freelancer yang tepat untuk project Anda dengan mudah melalui kategori atau pencarian.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">2. Diskusi & Pesan</h3>
                <p class="text-gray-400">
                    Komunikasikan kebutuhan Anda dengan freelancer dan sepakati detail project sebelum memulai.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">3. Terima Hasil</h3>
                <p class="text-gray-400">
                    Dapatkan pekerjaan berkualitas tinggi tepat waktu dan berikan review untuk freelancer.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection