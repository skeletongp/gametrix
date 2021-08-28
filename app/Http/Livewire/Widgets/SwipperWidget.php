<?php

namespace App\Http\Livewire\Widgets;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SwipperWidget extends Component
{
    public $url;

    public function mount()
    {
        $api_key = config('services.rawg.api_key');
        $this->url = 'https://api.rawg.io/api/games?key=' . $api_key . '&ordering=-rating';
    }
    public function render()
    {
        $response = Http::get($this->url);
        config()->set('services.juegos', json_decode(json_encode($response->json())));;
        $data = config('services.juegos');
        $results = $data->results;
        return view('livewire.widgets.swipper-widget')->with(['juegos' => $results]);
    }
}
