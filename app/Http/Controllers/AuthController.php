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
            'Authorization' => 'hehehe',
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        );

        $response = json_decode($response->body());
        //echo $response->body(); die();
        if($response->status == 'success'){
            $request->session()->put('jwtToken', $response->jwtToken);
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
