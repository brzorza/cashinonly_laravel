<x-layout>
    <div class="flex pt-20 items-center justify-center">
        <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-6 text-white">Add post</h2>
            <form action="/forum/create" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-white">Title</label>
                    <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required 
                    value={{old('title')}}>
                    @error('title')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-10">
                    <label for="body" class="block text-white">Content</label>
                    <textarea type="text" id="body" name="body" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                    @enderror
                <div class="flex items-center justify-between mt-5 text-m">
                    <input type="checkbox" id="anonymous" name="anonymous" class="check-bg px-3 py-2 border rounded-md text-gray-800">
                    <label for="anonymous" class="w-full px-2">Add post anonymously?</label>
                </div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full bg-green-600 white px-4 py-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Publish</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>