<x-layout>
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-6 text-white">Register</h2>
            <form action="/users" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-white">Username</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required
                    value={{old('name')}}>
                    @error('name')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-white">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required 
                    value={{old('email')}}>
                    @error('email')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-10">
                    <label for="password" class="block text-white">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    @error('password')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full bg-green-600 white px-4 py-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Register</button>
                </div>
                <div class="flex items-center justify-between mt-5 text-m">
                    <p class="text-white">Already have an accaunt? <a class="text-green-500" href='/login'>Login</a></p>
                </div>
            </form>
        </div>
    </div>
</x-layout>