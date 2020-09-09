<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    
    public function get(Request $request, $id) 
    {
        $rest = Restaurant::find($id);
        if(!$rest) {
            return response()->json([
                'status' => 1,
                'message' => "No Restaurant with id '$id' could be found."
            ]);
        }
        return response()->json([
            'status' => 0,
            'restaurant' => json_encode($rest)
        ]);
    }

    public function list(Request $request, $page=0)
    {
        $i = 0;
        $restaurants = [];
        $user = Auth::user();
        $acct = Account::where('uid', $user->id)->first();
        Restaurant::where('aid', $acct->id)->chunk(15, function($rests) {
            if($i == $page) {
                $restaurants = $rests;
                return;
            } else {
                $i++;
            }
        });

    }

}
