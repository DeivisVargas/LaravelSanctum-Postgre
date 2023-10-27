<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function create(Request $request){
        return response()->json(
            [
                'data' => [
                    'message' => 'Acesso permitido'
                ]
            ]
        );
    }
}
