<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Account;

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

    public function create(Request $request)
    {
        Log::debug("Restaurant added: " . json_encode($request->all()). "\n");
        Log::debug("For Account: " . json_encode(Account::findByUser(Auth::user())) . " for User: " . json_encode(Auth::user()));
        return response()->json([
            'status' => 0
        ]);
    }

}
