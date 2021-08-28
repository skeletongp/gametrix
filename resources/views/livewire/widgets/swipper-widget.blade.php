<div>

    <x-swipper-card class="h-max overflow-hidden pt-2">
        <x-slot name="title">los más populares</x-slot>
        @foreach ($juegos as $juego)
                
            {{-- Tarjeta --}}
            <div class="my-card flex items-end justify-center"
                style="background-image: url({{ $juego->background_image }})">
                {{-- Backdrop --}}
                <div class="div-back h-full w-full absolute bg-gray-900 bg-opacity-60">
                </div>
                
                {{-- Año de salida --}}
                <a href="https://rawg.io/games/{{$juego->slug}}" target="_blank" 
                    class="text-md font-bold z-10 text-white top-1 absolute right-2 mx-2 ">
                   <span class="fas fa-cart-arrow-down"></span> {{__('Comprar')}}
                </a>

                {{-- Nombre y ratin con enlace a detalles --}}
                {{-- TODO: Crear página de detalles y enlazar con esto --}}
                <a href="{{ $juego->background_image }}"
                    class="text-xl font-bold z-10 text-white mb-2 text-center mx-2 flex flex-col overflow-ellipsis ">
                    <span>{{ $juego->name }} </span>
                    <small class="text-xs">
                        <span class="fas fa-star text-yellow-400"></span>
                        {{ $juego->rating }}
                    </small></a>
            </div>

        @endforeach
        @if (count($juegos) % 2 == 0)
            <div class="my-card flex items-end justify-center"
                style="background-image: url(https://picsum.photos/200/300)">

            </div>
        @endif
        <div>
        </div>
    </x-swipper-card>
</div>
