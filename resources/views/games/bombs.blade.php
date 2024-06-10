<x-layout>
    <div class="container mx-auto pt-20">
        <form action="/games/bombs" method="POST" id="bombs-form">
            @csrf
        <div class="flex w-3/5 xl:w-1/2 flex-col xl:flex-row mx-auto bg-gray-800 rounded-lg shadow-md">

            <div class="flex flex-col w-2/3">
                <div class="w-full h-full p-8 flex flex-col items-center">
                    <h2 class="text-2xl font-bold mb-10 text-white">Board</h2>
                    <div class="w-full h-auto aspect-square bg-gray-900 px-5 py-5 rounded-lg shadow-md max-w-md">

                        <div class="grid grid-cols-{{session('randomNumber') ? session('randomNumber') : '4'}} gap-2 p-4 aspect-square shadow-lg h-full">
                            @for ($i = 1; $i <= 4*4; $i++)
                                    <div class="flex items-center justify-center aspect-square bg-blue-500 text-white rounded-lg">
                                        {{$i}}
                                        <input name='{{$i}}' type='hidden' value='{{$i}}'>
                                    </div>
                            @endfor
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex flex-col w-1/3 items-center justify-start">
                <div class="w-full p-8">
                    <h2 class="text-2xl font-bold mb-10 text-white">Edit your profile</h2>
                        @csrf
                        <div class="mb-4">
                            <label for="" class="block text-white">Multilier: 2.0x</label>
                        </div>
                        <div class="mb-4">
                            <label for="board_size" class="block text-white">Board size</label>
                            <select type="text" id="board_size" name="board_size" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                            @error('board_size')
                                <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="bombs_number" class="block text-white">Number of Bombs</label>
                            <input type="number" id="bombs_number" name="bombs_number" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @error('bombs_number')
                                <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="w-full bg-green-600 white px-4 py-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Play</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</x-layout>