<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prueba') }}
        </h2>
    </x-slot>

    <x-swipper-card class="h-max overflow-hidden pt-6">
        @for ($i = 0; $i <7; $i++)
        <div class="my-card bg-cover bg-no-repeat" style="background-image: url(https://picsum.photos/id/{{$i*18}}/200/300)"></div>
        @endfor
    </x-swipper-card>

</x-app-layout>
