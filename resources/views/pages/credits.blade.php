<x-layout>
    <div class="flex flex-col lg:flex-row gap-10 lg:mt-40 my-20 items-center justify-center">

        <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-1 text-white">Add credits</h2>
            <form action="/credits/payin" method="POST">
                @csrf
                @method('PUT')
                <div class="py-5">
                    <label for="amount" class="block text-white">Amount</label>
                    <input type="number" id="amount" name="amount" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required 
                    value={{old('amount')}}>
                    @error('amount')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full bg-green-600 white px-4 py-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Submit</button>
                </div>
            </form>
        </div>

        <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-1 text-white">Cash out</h2>
            <form action="/credits/payout" method="POST">
                @csrf
                <div class="py-5">
                    <label for="amount" class="block text-white">Amount</label>
                    <input type="number" id="amount" name="amount" class="w-full px-3 py-2 border rounded-md text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500" required 
                    value={{old('amount')}}>
                    @error('amount')
                        <p class="text-red-500 text-xs-mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full bg-green-600 white px-4 py-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Submit</button>
                </div>
            </form>
        </div>

    </div>
</x-layout>