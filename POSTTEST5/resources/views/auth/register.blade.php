<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - QuickGigs</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-rose-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <!-- header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-rose-800 mb-2">Create Account</h1>
                <p class="text-gray-600">Join QuickGigs today</p>
            </div>

            <!-- pesan sukses -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- form registrasi -->
            <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- nama -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Full Name <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent transition {{ $errors->has('name') ? 'border-2 border-red-500' : 'border border-gray-300' }}"
                        placeholder="Enter your full name"
                        required
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- username -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                        Username <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        value="{{ old('username') }}"
                        class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent transition {{ $errors->has('username') ? 'border-2 border-red-500' : 'border border-gray-300' }}"
                        placeholder="Choose a unique username"
                        required
                    >
                    @error('username')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent transition {{ $errors->has('password') ? 'border-2 border-red-500' : 'border border-gray-300' }}"
                        placeholder="Min. 6 characters"
                        required
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- konfirmasi password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        Confirm Password <span class="text-rose-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent transition"
                        placeholder="Repeat your password"
                        required
                    >
                </div>

                <!-- foto profil -->
                {{-- <div>
                    <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">
                        Profile Image (Optional)
                    </label>
                    <input 
                        type="file" 
                        id="image" 
                        name="image"
                        accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100"
                    >
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Max 2MB (JPG, PNG, GIF)</p>
                </div> --}}

                <!-- tombol submit -->
                <button 
                    type="submit"
                    class="w-full bg-rose-800 hover:bg-rose-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105"
                >
                    Register
                </button>
            </form>

            <!-- link login -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-rose-800 hover:text-rose-600 font-semibold">
                        Login here
                    </a>
                </p>
            </div>

            <!-- kembali ke home -->
            <div class="mt-4 text-center">
                <a href="{{ route('quickgigs.index') }}" class="text-gray-500 hover:text-gray-700 text-sm">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>
</body>
</html>
