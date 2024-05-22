<x-layout>
    <div class="flex pt-20 items-center justify-center">
        <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-6 text-white">Login</h2>
            <form action="/users/authenticate" method="POST">
                @csrf
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
                    <button type="submit" class="w-full bg-green-600 white px-4 py-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Login</button>
                </div>
                <div class="flex items-center justify-between mt-5 text-m">
                    <p class="text-white">Don't have an accaunt? <a class="text-green-500" href='/register'>Register</a></p>
                </div>
            </form>
        </div>
    </div>
</x-layout>