<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $rec_location = DB::table("location")->get();
        // $rec_carousel = Carousel::select('carousel_img','carousel_head','carousel_detail')->whereIn('id',[4,5])->get();
        $rec_carousel = Carousel::all();
        // dd($rec_location);
        return view('page.home', [
            'rec_location' => $rec_location,
            'rec_carousel' => $rec_carousel,
        ]);
    }
}
