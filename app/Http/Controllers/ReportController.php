<?php

namespace App\Http\Controllers;

use App\Jobs\QuantityReport;
use App\Http\Requests\ReportRequest;
use App\User;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ReportRequest $reportRequest)
    {
        $attributes = $reportRequest->validated();
        QuantityReport::dispatch($attributes, auth()->user());

        return redirect(route('total'));
    }
}
