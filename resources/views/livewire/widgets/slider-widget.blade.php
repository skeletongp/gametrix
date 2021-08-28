<div>
    <x-slider-card>
        <x-slot name="title">Plataformas de juegos </x-slot>
        @foreach ($platforms as $platform)
            <div class="card ">

                <div class="card-bg flex items-end justify-center"
                    style="background-image: url({{ $platform->image_background }});">
                    <div class="div-back h-full w-full absolute bg-gray-900 bg-opacity-60">
                    </div>
                    {{-- Backdrop --}}


                    <a href="{{ $platform->image_background }}"
                        class="text-xl font-bold z-20 text-white mb-2 text-center mx-2 flex flex-col overflow-ellipsis ">
                        <span>{{ $platform->name }} </span>
                        <small class="text-xs">
                            <span class="fas fa-gamepad "></span>
                            {{ $platform->games_count }}
                        </small></a>
                </div>
            </div>
        @endforeach
    </x-slider-card>
</div>
