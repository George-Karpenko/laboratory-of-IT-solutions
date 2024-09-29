<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SlideResource;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SlideController extends Controller
{
    public function index()
    {
        // Сортировка слайдов искользует Insert поэтому кэш после неё остаться 
        return Cache::remember('slide', Carbon::now()->addMinutes(30), function () {
            return SlideResource::collection(Slide::sorted()->get());
        });
    }
}
