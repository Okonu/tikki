<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClearSessionData
{
    public function handle($event)
    {
        if (Session::has('allCertificates')) {
            
            Session::forget('allCertificates');
        }
    }
}
