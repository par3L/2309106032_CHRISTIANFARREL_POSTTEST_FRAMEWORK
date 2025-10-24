<nav class="bg-dark-800 border-b border-dark-700 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('quickgigs.index') }}" class="text-2xl font-bold text-emerald-400 flex items-center gap-2 transition-colors hover:text-emerald-300">
                <span class="material-icons text-3xl">dashboard</span>
                <span>QuickGigs</span>
            </a>
            
            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-gray-300 flex items-center gap-2">
                        <span class="material-icons text-emerald-400">person</span>
                        <span class="font-semibold">{{ auth()->user()->name }}</span>
                    </span>
                    <a href="{{ route('gigs.my-gigs') }}" class="text-gray-300 hover:text-emerald-400 font-semibold flex items-center gap-1 transition-colors">
                        <span class="material-icons">work</span>
                        <span>My Gigs</span>
                    </a>
                    <a href="{{ route('gigs.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg font-semibold flex items-center gap-1 transition-all duration-200">
                        <span class="material-icons">add_circle</span>
                        <span>Post Gig</span>
                    </a>
                    <a href="{{ route('logout') }}" class="text-gray-300 hover:text-red-400 flex items-center gap-1 transition-colors">
                        <span class="material-icons">logout</span>
                        <span>Logout</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-emerald-400 font-semibold flex items-center gap-1 transition-colors">
                        <span class="material-icons">login</span>
                        <span>Login</span>
                    </a>
                    <a href="{{ route('register') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg font-semibold flex items-center gap-1 transition-all duration-200">
                        <span class="material-icons">person_add</span>
                        <span>Register</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
