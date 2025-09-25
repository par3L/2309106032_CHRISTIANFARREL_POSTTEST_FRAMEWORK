@extends('layouts.app')

@section('title', $gig->title . ' - QuickGigs')

@section('content')
<!-- Breadcrumb -->
<section class="bg-dark-800 py-4 border-b border-dark-700">
    <div class="container mx-auto px-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('quickgigs.index') }}" class="text-gray-400 hover:text-emerald-400 transition-colors">
                Home
            </a>
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('quickgigs.category', $gig->category->slug) }}" class="text-gray-400 hover:text-emerald-400 transition-colors">
                {{ $gig->category->name }}
            </a>
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-300">{{ Str::limit($gig->title, 50) }}</span>
        </nav>
    </div>
</section>

<!-- Gig Details -->
<section class="py-8 bg-dark-900">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Gig Header -->
                <div class="mb-8">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="bg-emerald-500 text-white text-sm font-medium px-3 py-1 rounded-full">
                            {{ $gig->category->name }}
                        </span>
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        {{ $gig->title }}
                    </h1>
                    
                    <!-- Freelancer Info -->
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-emerald-400 to-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-lg font-bold">{{ substr($gig->user->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg">{{ $gig->user->name }}</h3>
                            <div class="flex items-center space-x-4 text-sm">
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <span class="text-yellow-400 font-medium">{{ number_format($gig->rating, 1) }}</span>
                                    <span class="text-gray-400">({{ $gig->reviews_count }} reviews)</span>
                                </div>
                                <span class="text-gray-400">{{ $gig->orders_count }} orders completed</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Gig Images -->
                @if($gig->images && count($gig->images) > 0)
                <div class="mb-8">
                    <div class="bg-dark-800 rounded-xl overflow-hidden border border-dark-700">
                        <img src="{{ $gig->images[0] }}" 
                             alt="{{ $gig->title }}" 
                             class="w-full h-96 object-cover">
                    </div>
                </div>
                @endif
                
                <!-- Description -->
                <div class="bg-dark-800 rounded-xl p-6 border border-dark-700 mb-8">
                    <h2 class="text-2xl font-bold text-white mb-4">Tentang Gig Ini</h2>
                    <div class="text-gray-300 leading-relaxed">
                        <p>{{ $gig->description }}</p>
                    </div>
                </div>
                
                <!-- What You Get -->
                <div class="bg-dark-800 rounded-xl p-6 border border-dark-700 mb-8">
                    <h2 class="text-2xl font-bold text-white mb-4">Yang Akan Anda Dapatkan</h2>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-300">Pekerjaan berkualitas tinggi sesuai brief</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-300">{{ $gig->revisions }} kali revisi gratis</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-300">Komunikasi responsif 24/7</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-300">Source files dan dokumentasi lengkap</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Order Card -->
                <div class="bg-dark-800 rounded-xl border border-dark-700 overflow-hidden sticky top-8">
                    <div class="p-6">
                        <div class="flex items-baseline justify-between mb-6">
                            <div>
                                <span class="text-gray-400 text-sm">Mulai dari</span>
                                <div class="text-3xl font-bold text-emerald-400">
                                    ${{ number_format($gig->price, 0) }}
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-gray-400 text-sm">Pengiriman</div>
                                <div class="text-white font-semibold">{{ $gig->delivery_time }} hari</div>
                            </div>
                        </div>
                        
                        <!-- Package Features -->
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-300 text-sm">{{ $gig->delivery_time }} hari pengiriman</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <span class="text-gray-300 text-sm">{{ $gig->revisions }} revisi</span>
                            </div>
                        </div>
                        
                        <!-- Order Buttons -->
                        <div class="space-y-3">
                            <button class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                                Pesan Sekarang
                            </button>
                            <button class="w-full border border-emerald-500 text-emerald-400 hover:bg-emerald-500 hover:text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                                Hubungi Seller
                            </button>
                        </div>
                    </div>
                    
                    <!-- Seller Stats -->
                    <div class="bg-dark-700 p-6 border-t border-dark-600">
                        <h4 class="text-white font-semibold mb-4">Statistik Seller</h4>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Response Time</span>
                                <span class="text-white">< 1 jam</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Order Completion</span>
                                <span class="text-white">98%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Rating</span>
                                <span class="text-white">{{ number_format($gig->rating, 1) }}/5.0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Gigs -->
@if($relatedGigs->count() > 0)
<section class="py-16 bg-dark-800">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-8 text-center">Gigs Serupa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedGigs as $relatedGig)
                <x-gig-card :gig="$relatedGig" />
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection