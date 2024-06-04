<x-layout>
    <div class="flex pt-20 items-center justify-center">
        <div class="w-full max-w-xl bg-gray-800 rounded-lg shadow-md p-8">
            <table class="min-w-full rounded-lg shadow-md">
                <thead>
                    <tr class="bg-green-500 text-white rounded-lg">
                        <th class="py-2 px-4 text-center">Rank</th>
                        <th class="py-2 px-4 text-center">Name</th>
                        <th class="py-2 px-4 text-center">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr class="border-b bg-gray-900 scoreboard-custom-bg">
                            <td class="py-2 px-4 text-center">{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</td>
                            <td class="py-2 px-4 text-center">{{$user->name}}</td>
                            <td class="py-2 px-4 text-center">{{ number_format($user->total, 2, '.', ' ') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 float-right">
                {{$users->links('pagination::tailwind')}}
            </div>
        </div>
    </div>
</x-layout>