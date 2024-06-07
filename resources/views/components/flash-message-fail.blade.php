@if(session()->has('message-fail'))
    {{-- <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3"> --}}
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    class="fixed top-24 min-w-96 right-10 rounded-xl bg-red-500 text-gray-900 text-center text-xl font-medium py-5 animated-border-bottom-fail">
        <p>
            {{session('message-fail')}}
        </p>
    </div>
@endif