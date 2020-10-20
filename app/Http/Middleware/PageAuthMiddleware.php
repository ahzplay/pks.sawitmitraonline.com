<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;

class PageAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $endPoint = 'api/pageAuth';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $request->session()->get('jwtToken'),
            //'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5OTgyMDkzMCwiZXhwIjoxNTk5ODI0NTMwLCJuYmYiOjE1OTk4MjA5MzAsImp0aSI6ImU1Z3NSZzQzQldEMHJhZEIiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.kGgeR6azh6da9lUlItxebm_Iy6WYcWQuIKaI1_N2apA ',
        ])->post(env('BACKEND_URL').$endPoint,
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        );

        if($response->status() == 500 || $response->status() == 401) {
            return redirect()->to('/')->with(['error'=>'Your session has expired']);
        }

        /*$response = json_decode($response->body());
        if($response->status == 'fail'){
            return redirect()->to('/')->with(['error'=>'Your session has expired']);
        }*/

        return $next($request);
    }
}
