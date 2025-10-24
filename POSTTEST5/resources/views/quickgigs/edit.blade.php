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
    @include('components.navbar')

    <!-- konten utama -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-dark-800 border border-dark-700 rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-white mb-6 flex items-center gap-3">
                <span class="material-icons text-4xl text-emerald-400">edit_note</span>
                <span>{{ $title }}</span>
            </h1>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('gigs.update', $gig->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- kategori -->
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-300 mb-2">
                        Category <span class="text-emerald-400">*</span>
                    </label>
                    <select 
                        id="category_id" 
                        name="category_id"
                        class="w-full px-4 py-3 bg-dark-700 border border-dark-700 text-white rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        required
                    >
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $gig->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- judul -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-300 mb-2">
                        Gig Title <span class="text-emerald-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title', $gig->title) }}"
                        class="w-full px-4 py-3 bg-dark-700 border border-dark-700 text-white rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        required
                    >
                </div>

                <!-- deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-300 mb-2">
                        Description <span class="text-emerald-400">*</span>
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="6"
                        class="w-full px-4 py-3 bg-dark-700 border border-dark-700 text-white rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        required
                    >{{ old('description', $gig->description) }}</textarea>
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-300 mb-2">
                        Price (Rp) <span class="text-emerald-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="price" 
                        name="price" 
                        value="{{ old('price', $gig->price) }}"
                        min="0"
                        step="0.01"
                        class="w-full px-4 py-3 bg-dark-700 border border-dark-700 text-white rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        required
                    >
                </div>

                <!-- waktu pengiriman -->
                <div>
                    <label for="delivery_time" class="block text-sm font-semibold text-gray-300 mb-2">
                        Delivery Time (days) <span class="text-emerald-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="delivery_time" 
                        name="delivery_time" 
                        value="{{ old('delivery_time', $gig->delivery_time) }}"
                        min="1"
                        class="w-full px-4 py-3 bg-dark-700 border border-dark-700 text-white rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        required
                    >
                </div>

                <!-- gambar saat ini -->
                @if($gig->image_url)
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Current Image</label>
                        <img src="{{ asset('storage/' . $gig->image_url) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg border border-dark-700">
                    </div>
                @endif

                <!-- upload gambar -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-300 mb-2">
                        {{ $gig->image ? 'Change Image (Optional)' : 'Add Image (Optional)' }}
                    </label>
                    <input 
                        type="file" 
                        id="image" 
                        name="image"
                        accept="image/*"
                        class="w-full px-4 py-3 bg-dark-700 border border-dark-700 text-white rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-500/20 file:text-emerald-400 hover:file:bg-emerald-500/30"
                    >
                    <p class="mt-1 text-xs text-gray-400">Max 2MB (JPG, PNG, GIF). Leave empty to keep current image.</p>
                </div>

                <!-- Is Active -->
                <div>
                    <label class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            value="1"
                            {{ old('is_active', $gig->is_active) ? 'checked' : '' }}
                            class="rounded border-dark-700 text-emerald-500 shadow-sm focus:ring-emerald-500"
                        >
                        <span class="ml-2 text-sm font-semibold text-gray-300">Gig is Active</span>
                    </label>
                </div>

                <!-- tombol submit -->
                <div class="flex gap-3">
                    <button 
                        type="submit"
                        class="flex-1 bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-2"
                    >
                        <span class="material-icons">update</span>
                        <span>Update Gig</span>
                    </button>
                    <a 
                        href="{{ route('gigs.my-gigs') }}"
                        class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center gap-2"
                    >
                        <span class="material-icons">close</span>
                        <span>Cancel</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
