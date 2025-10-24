@extends('layouts.app')

@section('title', $user->name . ' - Profile')

@section('content')
<!-- header profil -->
<section class="bg-dark-800 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
                <!-- Profile Picture -->
                <div class="w-32 h-32 bg-gradient-to-r from-emerald-400 to-blue-500 rounded-full flex items-center justify-center">
                    @if($user->profile_picture)
                        <img src="{{ $user->profile_picture }}" alt="{{ $user->name }}" class="w-full h-full rounded-full object-cover">
                    @else
                        <span class="text-white text-4xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                    @endif
                </div>
                
                <!-- info -->
                <div class="text-center md:text-left flex-1">
                    <h1 class="text-4xl font-bold text-white mb-2">{{ $user->name }}</h1>
                    @if($user->bio)
                        <p class="text-gray-300 text-lg mb-4">{{ $user->bio }}</p>
                    @endif
                    
                    <div class="flex flex-wrap justify-center md:justify-start gap-4 text-sm text-gray-400">
                        @if($user->location)
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $user->location }}</span>
                            </div>
                        @endif
                        
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 0V6a2 2 0 00-2 2H10a2 2 0 00-2-2V6m8 0h2a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h2"></path>
                            </svg>
                            <span>{{ $user->gigs->count() }} active gigs</span>
                        </div>
                        
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span>{{ $user->reviews()->count() > 0 ? number_format($user->reviews()->avg('rating'), 1) : 'No' }} rating ({{ $user->reviews()->count() }} reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  skill  -->
@if($user->skills->count() > 0)
<section class="py-12 bg-dark-900">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-white mb-6">Skills & Expertise</h2>
            <div class="flex flex-wrap gap-3">
                @foreach($user->skills as $skill)
                    @php
                        $colorClass = match($skill->color) {
                            '#3B82F6' => 'bg-blue-500/20 border-blue-500 text-blue-400',
                            '#EF4444' => 'bg-red-500/20 border-red-500 text-red-400',
                            '#10B981' => 'bg-green-500/20 border-green-500 text-green-400',
                            '#F59E0B' => 'bg-yellow-500/20 border-yellow-500 text-yellow-400',
                            '#8B5CF6' => 'bg-purple-500/20 border-purple-500 text-purple-400',
                            '#06B6D4' => 'bg-cyan-500/20 border-cyan-500 text-cyan-400',
                            '#F97316' => 'bg-orange-500/20 border-orange-500 text-orange-400',
                            '#84CC16' => 'bg-lime-500/20 border-lime-500 text-lime-400',
                            default => 'bg-emerald-500/20 border-emerald-500 text-emerald-400'
                        };
                    @endphp
                    <span class="px-4 py-2 rounded-full text-sm font-medium border {{ $colorClass }}">
                        {{ $skill->name }}
                        <span class="ml-1 text-xs opacity-75">({{ ucfirst($skill->level) }})</span>
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

@if($user->portfolios->count() > 0)
<section class="py-12 bg-dark-800">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-white mb-6">Portfolio</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($user->portfolios as $portfolio)
                    <div class="bg-dark-700 rounded-xl overflow-hidden border border-dark-600">
                        @if($portfolio->image_url)
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-emerald-500 to-blue-600 flex items-center justify-center">
                                <span class="text-white text-6xl">📁</span>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-white font-semibold text-lg mb-2">{{ $portfolio->title }}</h3>
                            <p class="text-gray-400 text-sm mb-4">{{ Str::limit($portfolio->description, 100) }}</p>
                            
                            @if($portfolio->technologies)
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach($portfolio->technologies as $tech)
                                        <span class="px-2 py-1 bg-emerald-500/20 text-emerald-400 text-xs rounded">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="flex items-center justify-between text-sm text-gray-400">
                                <span>{{ $portfolio->completed_at->format('M Y') }}</span>
                                @if($portfolio->project_url)
                                    <a href="{{ $portfolio->project_url }}" target="_blank" class="text-emerald-400 hover:text-emerald-300">
                                        View Project →
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- gigs -->
@if($user->gigs->where('is_active', true)->count() > 0)
<section class="py-12 bg-dark-900">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-white mb-6">Active Gigs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($user->gigs->where('is_active', true)->take(4) as $gig)
                    <x-gig-card :gig="$gig" />
                @endforeach
            </div>
            
            @if($user->gigs->where('is_active', true)->count() > 4)
                <div class="text-center mt-6">
                    <a href="{{ route('quickgigs.search', ['user' => $user->id]) }}" class="text-emerald-400 hover:text-emerald-300">
                        View All {{ $user->gigs->where('is_active', true)->count() }} Gigs →
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- reviews -->
@if($user->reviews->count() > 0)
<section class="py-12 bg-dark-800">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-white mb-6">Recent Reviews</h2>
            <div class="space-y-6">
                @foreach($user->reviews->take(5) as $review)
                    <div class="bg-dark-700 rounded-xl p-6 border border-dark-600">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">{{ substr($review->user->name, 0, 1) }}</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <h4 class="text-white font-medium">{{ $review->user->name }}</h4>
                                    <div class="flex items-center space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="text-gray-400 text-sm">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-300">{{ $review->comment }}</p>
                                @if($review->gig)
                                    <p class="text-emerald-400 text-sm mt-2">For: {{ $review->gig->title }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@endsection