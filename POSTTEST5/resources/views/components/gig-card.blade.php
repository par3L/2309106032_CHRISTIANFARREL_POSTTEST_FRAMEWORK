@props(['gig'])

<div class="relative bg-dark-800 rounded-xl overflow-hidden border border-dark-700 hover:border-emerald-500 transition-all duration-300 group">
    <!-- gambar gig -->
    <div class="relative h-48 overflow-hidden">
        @if($gig->image)
            <img src="{{ asset('storage/' . $gig->image) }}" alt="{{ $gig->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        @else
            <img src="https://source.unsplash.com/800x600/?{{ urlencode(strtolower($gig->category->name)) }},work,freelance" alt="{{ $gig->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        @endif
        
        <!-- badge kategori -->
        <div class="absolute top-3 left-3">
            <span class="bg-emerald-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                {{ $gig->category->name }}
            </span>
        </div>
    </div>
    
    <!-- konten card -->
    <div class="p-4">
        <!-- info freelancer -->
        <div class="flex items-center space-x-2 mb-3 relative z-10">
            <div class="w-8 h-8 bg-gradient-to-r from-emerald-400 to-blue-500 rounded-full flex items-center justify-center">
                <span class="text-white text-sm font-bold">{{ substr($gig->user->name, 0, 1) }}</span>
            </div>
            <a href="{{ route('profile.show', $gig->user->id) }}" class="text-gray-400 text-sm hover:text-emerald-400 transition-colors relative z-10">{{ $gig->user->name }}</a>
        </div>
        
        <!-- judul gig -->
        <h3 class="text-white font-semibold text-base mb-2 line-clamp-2 group-hover:text-emerald-400 transition-colors">
            {{ $gig->title }}
        </h3>
        
        <!-- rating & review -->
        <div class="flex items-center space-x-4 mb-4">
            <div class="flex items-center space-x-1">
                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span class="text-yellow-400 text-sm font-medium">
                    {{ $gig->reviews()->count() > 0 ? number_format($gig->reviews()->avg('rating'), 1) : 'New' }}
                </span>
                <span class="text-gray-400 text-sm">({{ $gig->reviews()->count() }})</span>
            </div>
            <span class="text-gray-400 text-sm">{{ $gig->orders()->count() }} orders</span>
        </div>
        
        <!-- harga & waktu -->
        <div class="flex items-center justify-between">
            <div>
                <span class="text-gray-400 text-sm">Mulai dari</span>
                <div class="text-emerald-400 font-bold text-xl">
                    ${{ number_format($gig->price, 0) }}
                </div>
            </div>
            <div class="text-right">
                <span class="text-gray-400 text-sm block">{{ $gig->delivery_time }} hari</span>
                <span class="text-gray-500 text-xs">pengiriman</span>
            </div>
        </div>
    </div>
    
    <!-- link overlay -->
    <a href="{{ route('quickgigs.show', $gig->slug) }}" class="absolute inset-0 z-0" aria-label="View {{ $gig->title }}"></a>
</div>