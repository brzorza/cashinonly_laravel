<x-layout>
    <div class="flex pt-20 items-center justify-center">
        <div class="w-full max-w-xl bg-gray-800 rounded-lg shadow-md p-8">
            <form action="/games/dice_roll" method="POST">
                @csrf
                <div class="flex justify-center flex-col">
                    <button type="submit" class="mx-auto mb-5">
                        <img src="{{ session('randomNumber') ? asset('/images/games_covers/dice_' . session('randomNumber') . '.png') : asset('/images/games_covers/dices.png') }}" 
                        class="h-52 w-52 rounded-xl mx-auto">
                    </button>

                    <label for="guessed_number" class="mt-4 text-center">Choose your number!</label>
                    <input type="hidden" name="guessed_number" id="guessed_number" value='1'>
                    <div class="w-3/4 mx-auto flex space-x-4 px-4 py-2 shadow-lg">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="input-box flex items-center aspect-square justify-center w-1/6 h-auto rounded-lg cursor-pointer text-white bg-emerald-500"
                                onclick="changeInputValue(this)">
                                    {{ $i }}
                            </div>
                        @endfor
                    </div>
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

<script>

    let selectedValue;

    function changeInputValue(element) {
        document.getElementById('guessed_number').value = element.textContent;
        selectedValue = parseInt(element.textContent);


        number_divs = document.querySelectorAll('.input-box');
        number_divs.forEach(ele => {
            ele.classList.add('bg-emerald-500');
            ele.classList.remove('bg-emerald-700'); 
        });

        element.classList.add('bg-emerald-700');
        element.classList.remove('bg-emerald-500');
    }
</script>