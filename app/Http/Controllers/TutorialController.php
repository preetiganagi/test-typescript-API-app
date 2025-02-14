<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class TutorialController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data =  \DB::table('tutorials')->get();
            return Response::json(['message' => 'success', 'data' => $data], 200);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
