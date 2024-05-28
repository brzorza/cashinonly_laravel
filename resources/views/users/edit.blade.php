<x-layout>
    <div class="container mx-auto pt-20">
        <form action="/users/edit" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="md:w-1/2 flex flex-col md:flex-row mx-auto bg-gray-800 rounded-lg shadow-md">

            <div class="md:w-1/2 flex flex-col">
                <div class="w-full max-w-md p-8 flex flex-col items-center">
                    <h2 class="text-2xl font-bold mb-10 text-white">{{$user->name}}</h2>
                    <img src="{{$user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/images/profile_pictures/no_image.jpg')}}" class="rounded-full h-64 w-64 object-cover mb-10">
                    <div class="bg-gray-900 px-5 py-4 rounded-lg shadow-md max-w-xs">
                        <input type="file" name="profile_picture" class="block text-center" />
                        @error('profile_picture')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 flex flex-col items-center justify-start">
                <div class="w-full max-w-md p-8">
                    <h2 class="text-2xl font-bold mb-10 text-white">Edit your profile</h2>
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-white">New Username</label>
                            <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                            value={{old('name')}}>
                            @error('name')
                                <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-white">New Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500"  
                            value={{old('email')}}>
                            @error('email')
                                <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-white">Current Password</label>
                            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            @error('password')
                                <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-10">
                            <label for="newPassword" class="block text-white">New Password</label>
                            <input type="password" id="password" name="newPassword" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" >
                            @error('password')
                                <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="w-full bg-green-600 white px-4 py-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Save</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</x-layout>