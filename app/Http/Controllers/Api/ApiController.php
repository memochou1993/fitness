<?php

namespace App\Http\Controllers\Api;

use App;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     *
     *
     *
     */
    public function __construct()
    {
        if (App::environment('production')) {
            $this->middleware('auth:api');
        }
    }
}
