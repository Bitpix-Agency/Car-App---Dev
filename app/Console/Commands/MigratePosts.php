<?php

namespace App\Console\Commands;

use App\Models\FuelType;
use App\Models\Make;
use App\Models\Models;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MigratePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Posts';

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
        $posts = DB::connection('mysql2')->table('post_master')->get();
        foreach ($posts as $post) {
            if (User::where('id', $post->user_id)->first()) {
                $newPost = new Post();
                $newPost->id = $post->post_id;
                $newPost->user_id = $post->user_id;
                $newPost->regno = $post->regno;
                $newPost->post_desc = $post->post_desc;
                $newPost->price = $post->price;
                $newPost->is_bid = $post->is_bid;
                $hasMake = Make::where('name', strtoupper($post->make))->first();
                if ($hasMake) {
                    $newPost->make_id = $hasMake->id;
                } else {
                    $newMake = new Make();
                    $newMake->name = strtoupper($post->make);
                    $newMake->save();

                    $newPost->make_id = $newMake->id;
                }

                $hasModel = Models::where('name', strtoupper($post->model))->first();
                if ($hasModel) {
                    $newPost->model_id = $hasModel->id;
                } else {
                    $newModel = new Models();
                    $newModel->name = strtoupper($post->model);
                    $newModel->make_id = $newPost->make_id;
                    $newModel->save();

                    $newPost->model_id = $newModel->id;
                }

                $hasFuelType = FuelType::where('name', strtoupper($post->fuel))->first();
                if ($hasFuelType) {
                    $newPost->fuel_type_id = $hasFuelType->id;
                } else {
                    $newFuelType = new FuelType();
                    $newFuelType->name = strtoupper($post->fuel);
                    $newFuelType->save();

                    $newPost->fuel_type_id = $newFuelType->id;
                }

                $newPost->mileage = $post->mileage;
                $newPost->doors = $post->doors;
                $newPost->type = $post->type;
                $newPost->seats = $post->seats;
                $newPost->transition = $post->transition;
                $newPost->engine = $post->engine;
                $newPost->owners = $post->owners;
                $newPost->year = $post->year;
                $newPost->location = $post->location;
                $newPost->is_sold = $post->is_sold;
                $newPost->is_featured = $post->is_featured;
                $newPost->is_delete = $post->is_delete;
                $newPost->sold_date = $post->sold_date;
                $newPost->created_at = $post->created_on;
                $newPost->updated_at = $post->created_on;
                $newPost->body_type = $post->type;

                $newPost->save();

                $images = DB::connection('mysql2')->table('post_images')->where('post_id', $newPost->id)->get();
                foreach ($images as $image) {
                    $newImage = new PostImage();
                    $newImage->post_id = $newPost->id;
                    $newImage->url = 'http://mizzo.co.uk/resources/assets/upload/post/' . $image->post_photo;
                    $newImage->save();
                }
            }

        }
        echo "Migration Completed!";
    }
}
