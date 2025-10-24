<nav class="bg-dark-800 border-b border-dark-700 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('quickgigs.index') }}" class="text-2xl font-bold text-emerald-400 hover:text-emerald-300 transition-colors">
                    QuickGigs
                </a>
            </div>
            
            <!-- navigasi -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('quickgigs.index') }}" class="text-gray-300 hover:text-emerald-400 transition-colors">
                    Beranda
                </a>
                <a href="{{ route('quickgigs.search') }}" class="text-gray-300 hover:text-emerald-400 transition-colors">
                    Cari Gigs
                </a>
                <div class="relative group">
                    <button class="text-gray-300 hover:text-emerald-400 transition-colors flex items-center space-x-1">
                        <span>Kategori</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-64 bg-dark-800 border border-dark-700 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="p-4 grid grid-cols-2 gap-2">
                            <a href="{{ route('quickgigs.category', 'web-development') }}" class="text-gray-300 hover:text-emerald-400 py-2 px-3 rounded hover:bg-dark-700 transition-colors text-sm">Web Development</a>
                            <a href="{{ route('quickgigs.category', 'mobile-development') }}" class="text-gray-300 hover:text-emerald-400 py-2 px-3 rounded hover:bg-dark-700 transition-colors text-sm">Mobile Development</a>
                            <a href="{{ route('quickgigs.category', 'ui-ux-design') }}" class="text-gray-300 hover:text-emerald-400 py-2 px-3 rounded hover:bg-dark-700 transition-colors text-sm">UI/UX Design</a>
                            <a href="{{ route('quickgigs.category', 'graphic-design') }}" class="text-gray-300 hover:text-emerald-400 py-2 px-3 rounded hover:bg-dark-700 transition-colors text-sm">Graphic Design</a>
                            <a href="{{ route('quickgigs.category', 'content-writing') }}" class="text-gray-300 hover:text-emerald-400 py-2 px-3 rounded hover:bg-dark-700 transition-colors text-sm">Content Writing</a>
                            <a href="{{ route('quickgigs.category', 'digital-marketing') }}" class="text-gray-300 hover:text-emerald-400 py-2 px-3 rounded hover:bg-dark-700 transition-colors text-sm">Digital Marketing</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('quickgigs.index') }}#about" class="text-gray-300 hover:text-emerald-400 transition-colors">
                    Tentang
                </a>
            </div>
            
            <!-- auth links -->
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('gigs.my-gigs') }}" class="text-gray-300 hover:text-emerald-400 transition-colors flex items-center gap-2">
                        <span class="material-icons text-lg">work</span>
                        <span>My Gigs</span>
                    </a>
                    <a href="{{ route('gigs.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                        <span class="material-icons text-lg">add_circle</span>
                        <span>Post Gig</span>
                    </a>
                    <a href="{{ route('logout') }}" class="text-gray-300 hover:text-red-400 transition-colors flex items-center gap-2">
                        <span class="material-icons text-lg">logout</span>
                        <span>Logout</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-emerald-400 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>