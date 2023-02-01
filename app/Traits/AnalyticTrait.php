<?php

namespace App\Traits;
use Auth;
use App\Models\Analytic;

trait AnalyticTrait
{
    public function analyticlog($action)
    {
        $log = new Analytic;
        $log->userid = Auth::user()->id;
        $log->ip = $_SERVER['REMOTE_ADDR'];
        $log->domain = $_SERVER['HTTP_HOST'];
        $log->action = $action;
        $log->save();
    }
}
