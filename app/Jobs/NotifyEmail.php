<?php

namespace App\Jobs;

use App\Mail\Adminmail;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $total_answers = Question::where('question_type','textarea')
            ->where('created_at','>',
                Carbon::now()->subHours(48)->toDateTimeString()
            )
            ->limit('5')
            ->get();

        $total_answers  = count($total_answers);

        $question_answers = Question::where('question_type','textarea')
            ->where('created_at','>',
                Carbon::now()->subHours(48)->toDateTimeString()
            )
            ->limit('5')
            ->get();
        Mail::to('test@laravel.com')->send(new Adminmail($question_answers,$total_answers));
    }
}
