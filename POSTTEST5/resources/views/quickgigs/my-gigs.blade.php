<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - QuickGigs</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: {
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark-900">
    <!-- navbar -->
    <x-navbar />

    <!-- konten utama -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-white flex items-center gap-3">
                    <span class="material-icons text-4xl text-emerald-400">work_outline</span>
                    <span>{{ $title }}</span>
                </h1>
                <a href="{{ route('gigs.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-lg font-semibold flex items-center gap-2 transition-all duration-200 hover:shadow-lg transform hover:scale-105">
                    <span class="material-icons">add_circle_outline</span>
                    <span>Post New Gig</span>
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($data->isEmpty())
                <div class="bg-dark-800 border border-dark-700 rounded-2xl shadow-lg p-12 text-center">
                    <div class="text-gray-500 mb-4">
                        <span class="material-icons" style="font-size: 96px;">work_off</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">No Gigs Yet</h3>
                    <p class="text-gray-400 mb-6">Start by creating your first gig to offer your services!</p>
                    <a href="{{ route('gigs.create') }}" class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 hover:shadow-lg transform hover:scale-105">
                        <span class="material-icons">add_circle</span>
                        <span>Create Your First Gig</span>
                    </a>
                </div>
            @else
                <div class="grid gap-6">
                    @foreach($data as $gig)
                        <div class="bg-dark-800 border border-dark-700 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
                            <div class="md:flex">
                                <!-- Gig Image -->
                                <div class="md:w-1/3">
                                    @if($gig->image)
                                        <img src="{{ asset('storage/' . $gig->image) }}" alt="{{ $gig->title }}" class="w-full h-64 object-cover">
                                    @else
                                        <img src="https://source.unsplash.com/800x600/?{{ urlencode(strtolower($gig->category->name)) }},work,freelance" alt="{{ $gig->title }}" class="w-full h-64 object-cover">
                                    @endif
                                </div>

                                <!-- Gig Details -->
                                <div class="md:w-2/3 p-6">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <span class="inline-block bg-emerald-500/20 text-emerald-400 text-xs px-3 py-1 rounded-full font-semibold mb-2">
                                                {{ $gig->category->name }}
                                            </span>
                                            <h2 class="text-2xl font-bold text-white">{{ $gig->title }}</h2>
                                        </div>
                                        <span class="text-2xl font-bold text-emerald-400">
                                            Rp {{ number_format($gig->price, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <p class="text-gray-300 mb-4 line-clamp-2">{{ $gig->description }}</p>

                                    <div class="flex items-center text-sm text-gray-400 mb-4">
                                        <span class="mr-4 flex items-center gap-1">
                                            <span class="material-icons text-base">schedule</span>
                                            <span>{{ $gig->delivery_time }} days delivery</span>
                                        </span>
                                        <span class="mr-4 flex items-center gap-1">
                                            @if($gig->is_active)
                                                <span class="material-icons text-green-500 text-base">check_circle</span>
                                                <span class="text-green-500 font-semibold">Active</span>
                                            @else
                                                <span class="material-icons text-gray-500 text-base">cancel</span>
                                                <span class="text-gray-500">Inactive</span>
                                            @endif
                                        </span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3">
                                        <a href="{{ route('quickgigs.show', $gig->slug) }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-1 transition-all duration-200 hover:shadow-md">
                                            <span class="material-icons text-base">visibility</span>
                                            <span>View</span>
                                        </a>
                                        <a href="{{ route('gigs.edit', $gig->slug) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-1 transition-all duration-200 hover:shadow-md">
                                            <span class="material-icons text-base">edit</span>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('gigs.destroy', $gig->slug) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this gig?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-1 transition-all duration-200 hover:shadow-md">
                                                <span class="material-icons text-base">delete</span>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
