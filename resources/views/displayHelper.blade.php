<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Helper') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <p> {{ __("Comma seprated: ") }}{{ $joined; }}</p>
                        <p>{{ __("Comma seprated with and: ") }}{{ $andJoined; }}</p>
                        <p>{{ __("Key By: ") }}{{ print_r($keyed, true); }}</p>
                        <p>{{ __("Mapped: ") }}{{ print_r($mapped, true); }}</p>
                        <p>{{ __("Array Pluck: ") }}{{ print_r($pluck, true); }}</p>
                        <p>{{ __("Head: ") }}{{ print_r($head, true); }}</p>
                        <p>{{ __("Last: ") }}{{ print_r($last, true); }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>