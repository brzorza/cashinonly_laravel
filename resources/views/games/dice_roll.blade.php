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
                    <div class="w-3/4 mx-auto flex space-x-4 px-4 py-2">
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
                    <input type="hidden" name="bet_amount" id="bet_amount" class="mt-1 mx-auto w-1/2 text-gray-900 p-1 text-xl font-semibold" value='10'>
                    <div class="amount-wrapper w-3/4 mx-auto flex space-x-1 justify-center px-4 py-2">
                        <div class="input-box flex items-center aspect-square justify-center w-14 h-14 my-auto rounded-lg cursor-pointer text-white bg-emerald-500"
                                onclick="updateAmountValue(1)">
                                    +1
                        </div>
                        <div class="input-box flex items-center aspect-square justify-center w-16 h-16 my-auto rounded-lg cursor-pointer text-white bg-emerald-500"
                                onclick="updateAmountValue(5)">
                                    +5
                        </div>
                        <div class="bet_amount input-box flex items-center aspect-square justify-center w-20 h-20 my-auto text-2xl font-semibold rounded-lg cursor-pointer text-white bg-green-600">
                            10
                        </div>
                        <div class="input-box flex items-center aspect-square justify-center w-16 h-16 my-auto rounded-lg cursor-pointer text-white bg-emerald-500"
                                onclick="updateAmountValue(-5)">
                                    -5
                        </div>
                        <div class="input-box flex items-center aspect-square justify-center w-14 h-14 my-auto rounded-lg cursor-pointer text-white bg-emerald-500"
                                onclick="updateAmountValue(-1)">
                                    -1
                        </div>
                    </div>
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

    function updateAmountValue(amount) {

        amount_input = document.getElementById('bet_amount');
        amount_display = document.querySelector('.bet_amount');

        if(amount == -5 && parseInt(amount_input.value) < 5 && parseInt(amount_display.textContent) < 5){

        }else if(amount == -1 && parseInt(amount_input.value) < 1 && parseInt(amount_display.textContent) < 1){

        }else if(amount == 1 && parseInt(amount_input.value) >= 100 && parseInt(amount_display.textContent) >= 100){

        }else if(amount == 5 && parseInt(amount_input.value) >= 96 && parseInt(amount_display.textContent) >= 96){

        }else{
            amount_input.value = amount + parseInt(amount_input.value);
            amount_display.textContent = parseInt(amount_display.textContent) + amount;
        }

    }
</script>