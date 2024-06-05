<x-layout>
    <div class="flex pt-20 items-center justify-center">
        <div class="w-full max-w-xl bg-gray-800 rounded-lg shadow-md p-8">
            <form action="/games/dice_roll" method="POST">
                @csrf
                <div class="flex justify-center flex-col">
                    <button type="submit" class="mx-auto mb-5">
                        <img src="/images/games_covers/dices.png" class="h-2/4 w-2/4 rounded-xl mx-auto">
                    </button>

                    <label for="guessed_number" class="mt-4 text-center">Geuess the number!</label>
                    <input type="number" name="guessed_number" id="guessed_number" class="mt-1 mx-auto w-1/2 text-gray-900 p-1 text-xl font-semibold" value='1'>
                    @error('guessed_number')
                        <p class="text-red-500 text-xs mt-1 text-center">{{$message}}</p>
                    @enderror

                    <label for="guessed_number" class="mt-4 text-center">Bet amount</label>
                    <input type="number" name="bet_amount" id="bet_amount" class="mt-1 mx-auto w-1/2 text-gray-900 p-1 text-xl font-semibold" value='10'>
                    @error('bet_amount')
                        <p class="text-red-500 text-xs mt-1 text-center">{{$message}}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</x-layout>