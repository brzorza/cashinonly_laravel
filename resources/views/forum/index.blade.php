<x-layout>
    <div class="container mx-auto pt-20">
        <a href="/forum/create">Add post</a>
        @foreach ($posts as $post)
            <div class="py-10 my-2 bg-green-700">
                {{$post->title}}
                {{$post->body}}
                {{$post->user->name}}
            </div>
        @endforeach
    </div>
</x-layout>