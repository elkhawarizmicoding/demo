<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function register(ClientRequest $request) {
        $request["password"] = Hash::make($request["password"]);
        $result = Client::create($request->all());
        $token = $result->createToken("authToken")->plainTextToken;
        return response()->json([
            "client" => $result,
            "token" => $token
        ]);
    }
}
