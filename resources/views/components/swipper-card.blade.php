<div class="card-html mt-0 mx-auto ">
    <div {{ $attributes->merge(['class' => 'div-container mx-4']) }}>
        <h1 {{ $attributes->merge(['class' => 'text-white font-bold text-xl md:text-2xl uppercase']) }}>
            {{ isset($title) ? $title : 'Sección sin título' }}</h1>
        <div class="card-carousel mt-4">
            {{ $slot }}
        </div>
    </div>
</div>
