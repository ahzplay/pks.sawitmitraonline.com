<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController
{
    public function fetchTransactions(Request $request) {
        $endPoint = 'api/fetch-transaction';
        $response = Http::withHeaders([
            'Authorization' => 'hehehe',
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        );

        echo $response->body();
    }

    public function addTransaction(Request $request) {
        $endPoint = 'api/create-transaction';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $request->session()->get('jwtToken'),
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'mitra_tani_name' => $request->mitra_tani_name,
                'vehicle_number' => $request->vehicle_number,
                'driver_name' => $request->driver_name,
            ]
        );

        echo $response->body();
    }

    public function printScaleCard(Request $request) {
        return view('scaleCardView');
    }

    public function logoutProcess(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }



    public function index(Request $request) {
        return view('dashboard');
    }
}
