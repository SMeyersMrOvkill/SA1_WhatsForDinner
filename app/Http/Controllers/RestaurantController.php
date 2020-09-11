<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Account;
use App\Restaurant;

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

    public function list(Request $request)
    {
        $user = Auth::user();
        $acct = Account::where('uid', $user->id)->first();
        $restaurants = Restaurant::where('aid', $acct->id)->get();
        return response()->json([
            'status' => 0,
            'message' => 'OK',
            'data' => json_encode($restaurants)
        ]);
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
