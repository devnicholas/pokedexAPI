<?php

namespace App\Http\Controllers;

use App\Ranking;
use Illuminate\Http\Request;

class rankingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function get()
    {
        $ranking = Ranking::paginate(10);

        return $ranking;
    }

    public function save(Request $request)
    {
        $find = Ranking::whereNickname($request->nickname)->first();
        if(!$find){
            $find = Ranking::create([
                'nickname' => $request->nickname,
                'points' => $request->points,
            ]);
        }else{
            $points = $find->points + $request->points;
            $find->points = $points;
            $find->save();
        }

        return $find;
    }
}
