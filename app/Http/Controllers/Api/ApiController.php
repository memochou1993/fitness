<?php

namespace App\Http\Controllers\Api;

use App;
use Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     *
     */
    protected $per_page;

    /**
     *
     *
     *
     */
    public function __construct()
    {
        if (! App::environment('local')) {
            $this->middleware('auth:api');
        }

        $this->per_page = (int) Request::input('per_page');
    }
}
