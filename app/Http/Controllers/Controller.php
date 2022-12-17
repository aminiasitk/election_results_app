<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $per_page = 50;
    public $status_codes = [
        'success'   => 1,
        'error'     => 0
    ];
    public $venue_class = [
        'feo-vsc'   => 'FEO VSC',
        'poll-day'  => 'Poll Day',
        'pre-poll'  => 'Pre Poll'
    ];

    public $return_data = [];

    protected function returnResponse($data = [])
    {
        return response([
            "version"   => '1.0.1',
            "code" 		=> isset($data['code']) ? $data['code']:'UNKNOWN',
            "msg"       => isset($data['msg']) ? $data['msg'] : 'UNKNOWN',
            "response"  => isset($data['response']) ? $data['response'] : 'UNKNOWN',
            "execution" => abs(str_replace(' ', '', microtime()) - str_replace(' ', '', $this->start)),
            "data" 	    => isset($data['data']) ? $data['data'] : [],
        ], isset($data['status']) ? $data['status'] : Response::HTTP_OK);
    }
}
