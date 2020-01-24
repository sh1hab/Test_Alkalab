<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Question;
use App\Mail\Adminmail;
use Illuminate\Support\Facades\Mail;
// use App\Http\Controllers\Controller;

class Delete_emp_ans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:empty_answers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'soft deletes all question answers with an empty value from the past 24 hours';

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
        $deleted_questions = Question::where('answer',0)->delete();
        
    }
}
