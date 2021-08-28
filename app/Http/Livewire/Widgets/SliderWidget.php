<?php

namespace App\Http\Livewire\Widgets;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SliderWidget extends Component
{
    public function render()
    {
        $response=Http::get('https://api.rawg.io/api/platforms',[
            'key'=>config('services.rawg.api_key'),
            'ordering'=>'-games_count',
            'page_size'=>20,
        ]);
        $data=json_decode(json_encode($response->json()));
       $platforms=$data->results;

        return view('livewire.widgets.slider-widget')->with(['platforms'=>$platforms]);
    }
}
