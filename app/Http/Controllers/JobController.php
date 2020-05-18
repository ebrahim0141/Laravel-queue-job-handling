<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmail;

class JobController extends Controller
{
    /**
     * Handle Queue Process
     */
    public function processQueue()
    {

        $emailJob = new SendWelcomeEmail();
        $email=$emailJob->delay(Carbon::now()->addSeconds(10));
        dispatch($email);
        return view('mail.view');
    }

}
