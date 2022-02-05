<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUrlRequest;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function addUrl(AddUrlRequest $request)
    {

        do {
            $token = Str::random(7);
        } while (Url::where('short_url', $token)->exists());
        $newUrl = Url::updateOrCreate(
            [
                'url'=>$request['url'],
            ],
            [
                'url' => $request['url'],
                'short_url' => $token,
            ]
        );
        return route('getUrl',['url'=>$newUrl]);
    }
    public function getUrl(Url $url)
    {
        return redirect($url->url);
    }
}
