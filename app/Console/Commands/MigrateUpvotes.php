<?php

namespace App\Console\Commands;

use App\Models\Upvote;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MigrateUpvotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:upvotes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Upvotes';

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
     * @return int
     */
    public function handle()
    {
        echo "Migration Started Please wait!";
        $votes = DB::connection('mysql2')->table('user_vote')->get();
        foreach ($votes as $vote) {
            $hasVote = Upvote::where('id', $vote->srno)->first();
            $hasToUser = User::where('id', $vote->to_user_id)->first();
            $hasFromUser = User::where('id', $vote->from_user_id)->first();
            if (!$hasVote && $hasToUser && $hasFromUser) {
                $newVote = new Upvote();
                $newVote->id = $vote->srno;
                $newVote->to_user_id = $vote->to_user_id;
                $newVote->from_user_id = $vote->from_user_id;
                $newVote->created_at = Carbon::now();
                $newVote->updated_at = Carbon::now();
                $newVote->save();
            }
        }
        echo "Migration Completed!";
    }
}
