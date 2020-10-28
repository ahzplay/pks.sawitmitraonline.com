<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController
{
    public function fetchTransactions(Request $request) {
        $endPoint = 'api/fetch-transaction';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $request->session()->get('jwtToken'),
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'pksId' => $request->session()->get('pksId'),
                'stageRequest' => $request->stageRequest,
                'search' => $request->search['value'],
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
                'pks_id' => $request->session()->get('pksId'),
                'created_by' => $request->session()->get('userId'),
            ]
        );

        echo $response->body();
    }

    public function updateSortir(Request $request) {
        $endPoint = 'api/update-sortir';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $request->session()->get('jwtToken'),
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'id' => $request->id,
                'totalLong' => $request->totalLong,
                'sortingPercentage' => $request->sortingPercentage,
                'komidel' => $request->komidel,
                'sortingWeight' => $request->sortingWeight,
            ]
        );

        echo $response->body();
    }

    public function printScaleCard(Request $request) {
        $endPoint = 'api/fetch-detail-transaction';
        $response = Http::withHeaders([
            //'Authorization' => 'Bearer ' . $request->session()->get('jwtToken'),
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'id' => $request->id,
            ]
        );

        $dataParsed = json_decode($response->body(), true);
        return view('scaleCardView')->with('data', $dataParsed);
    }

    public function logoutProcess(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }

    public function index(Request $request) {
        echo $request->session()->get('jwtToken');
        return view('dashboard');
    }
}
