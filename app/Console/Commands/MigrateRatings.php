<?php

namespace App\Console\Commands;

use App\Models\Rating;
use App\Models\Upvote;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserRating;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MigrateRatings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:ratings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Ratings';

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
     *
     */
    public function handle()
    {
        echo "Migration Started Please wait!";
        $ratings = DB::connection('mysql2')->table('rating_master')->get();
        foreach ($ratings as $rating) {
            $hasRating = UserRating::where('id', $rating->rating_id)->first();
            $hasToUser = User::where('id', $rating->to_user_id)->first();
            $hasFromUser = User::where('id', $rating->from_user_id)->first();
            if (!$hasRating && $hasToUser && $hasFromUser) {
                $newRating = new UserRating();
                $newRating->id = $rating->rating_id;
                $newRating->to_user = $rating->to_user_id;
                $newRating->from_user = $rating->from_user_id;
                $newRating->rating = $rating->rating_star;
                $newRating->created_at = $rating->created_on;
                $newRating->updated_at = Carbon::now();
                $newRating->save();
            }

        }
        echo "Migration Completed!";
    }
}
