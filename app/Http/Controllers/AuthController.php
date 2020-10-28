<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function loginAction(Request $request) {
        $endPoint = 'api/login';
        $response = Http::withHeaders([
            'Authorization' => 'unnecessary',
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        );

        $response = json_decode($response->body());
        //echo $response->jwtToken; die();
        //get payload from jwt
        $payload = explode('.',$response->jwtToken);
        $payload = $payload[1];
        $payload = base64_decode($payload);
        //echo $payload; die();
        $payload = json_decode($payload, true);

        if($response->status == 'success'){
            $request->session()->put('jwtToken', $response->jwtToken);
            $request->session()->put('role', $payload['role']);
            $request->session()->put('userId', $payload['user_id']);
            $request->session()->put('pksId', $payload['pks'][0]);
            return redirect('/dashboard-page');
        } else {
            return redirect('/')->with(['error' => $response->message]);
        }
    }

    public function logoutAction(Request $request) {
        //http://localhost:8000/api/login
        $endPoint = 'api/logout';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $request->session()->get('jwtToken'),
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        );

        $response = json_decode($response->body());
        if($response->status){
            $request->session()->flush();
            return redirect('login-page');
        }

    }
}
