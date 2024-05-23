<x-layout>
    <div class="container mx-auto p-4">
        <div class="mt-20 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($games as $game)
                <a href="/games/{{$game->name}}">
                    <div class="bg-gray-800 p-6 rounded-xl">
                        <img class="p-4 rounded-3xl" src="{{$game->image_src}}">
                        <h2 class="text-center text-normal text-2xl py-3">{{$game->title}}</h2>
                    </div>
                </a>
            @endforeach
            
        </div>
    </div>
</x-layout>