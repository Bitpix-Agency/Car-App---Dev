<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MigrateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Users';

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
        $users = DB::connection('mysql2')->table('users')->get();
        foreach ($users as $user) {
            if (!User::where('email', $user->email)->first()) {
                $newUser = new User();
                $newUser->id = $user->id;
                $newUser->name = $user->name ?? null;
                $newUser->email = $user->email;
                $newUser->password = $user->password;
                $newUser->is_admin = false;
                $newUser->remember_token = $user->remember_token ?? null;
                $newUser->uuid = null;
                $newUser->stripe_id = $user->stripe_payment_id ?? null;
                $newUser->fb_id = $user->social_id ?? null;
                if ($user->is_verified === 2) {
                    $user->is_verified = 0;
                }
                $newUser->is_active = $user->is_verified ?? false;
                $newUser->created_at = $user->created_at ?? null;
                $newUser->updated_at = $user->updated_at ?? null;
                $newUser->save();

                $newProfile = new UserProfile();
                $newProfile->user_id = $newUser->id;
                $newProfile->user_name = $user->user_name ?? null;
                $newProfile->phone_no = $user->phone_no ?? null;
                $newProfile->user_bio = $user->user_bio ?? null;
                $newProfile->address = $user->address ?? null;
                $newProfile->city = $user->city ?? null;
                $newProfile->country = $user->country ?? null;
                $newProfile->postcode = $user->postcode ?? null;
                $newProfile->lat = $user->lat ?? null;
                $newProfile->lng = $user->lng ?? null;
                if ($user->profile_pic) {
                    $test = strpos($user->profile_pic, "http");
                    if ($test === 0 || $test !== false) {
                        $newProfile->profile_image = $user->profile_pic ?? null;
                    } else {
                        $newProfile->profile_image = 'http://mizzo.co.uk/resources/assets/upload/user/' . $user->profile_pic ?? null;
                    }
                }
                $newProfile->job = null;
                if ($usrPass = DB::connection('mysql2')->table('users_verification')->where('user_id', $newUser->id)->first()) {
                    if (strlen($usrPass->usr_passport) > 0)
                        $newProfile->photo_id_url = 'http://mizzo.co.uk/resources/assets/upload/userdoc/' . $usrPass->usr_passport;
                }
                if ($usrSelfie = DB::connection('mysql2')->table('users_verification')->where('user_id', $newUser->id)->first()) {
                    if (strlen($usrPass->usr_selfie) > 0)
                        $newProfile->selfie_url = 'http://mizzo.co.uk/resources/assets/upload/userdoc/' . $usrSelfie->usr_selfie;
                }
                if ($usrDoc = DB::connection('mysql2')->table('users_verification')->where('user_id', $newUser->id)->first()) {
                    if (strlen($usrPass->usr_doc) > 0)
                        $newProfile->document_url = 'http://mizzo.co.uk/resources/assets/upload/userdoc/' . $usrDoc->usr_doc;
                }
                $newProfile->created_at = $user->created_at ?? null;
                $newProfile->updated_at = $user->updated_at ?? null;
                $newProfile->save();
            } else {
                Log::debug("Email: " . $user->email . " Upvotes: " . $user->total_upvote . " UserId: " . $user->id);
            }
        }
        echo "Migration Completed!";
    }
}
