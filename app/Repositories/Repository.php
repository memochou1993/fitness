<?php

namespace App\Repositories;

use Illuminate\Http\Request;

class Repository
{
    /**
     *
     */
    protected $request;

    /**
     *
     *
     *
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
