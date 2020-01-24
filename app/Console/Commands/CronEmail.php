<?php

namespace App\Console\Commands;

use App\Mail\Adminmail;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sends email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
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

        $question_answers=Question::where('question_type','textarea')
                                    ->where('created_at','>',
                                        Carbon::now()->subHours(48)->toDateTimeString()
                                    )
                                    ->limit('5')
                                    ->get();
        Mail::to('test@laravel.com')->send(new Adminmail($question_answers));
    }
}
