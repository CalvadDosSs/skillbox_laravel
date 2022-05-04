<?php

namespace App\Http\Controllers;

use App\Jobs\QuantityReport;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Report;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ReportRequest $reportRequest)
    {
        $attributes = $reportRequest->validated();
        $report = QuantityReport::dispatchNow($attributes);

        Notification::sendNow(auth()->user(), new Report($report));

        return redirect(route('total'));
    }
}
