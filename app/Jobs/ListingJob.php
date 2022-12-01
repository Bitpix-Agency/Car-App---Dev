<?php

namespace App\Jobs;

use App\Models\FuelType;
use App\Models\Make;
use App\Models\Models;
use App\Models\PostImage;
use App\Models\UserProfile;
use Facebook\Facebook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class ListingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, WithFileUploads;

    /**
     * @var
     */
    private $post;
    /**
     * @var
     */
    private $user;
    /**
     * @var
     */
    private $photos;

    /**
     * ListingJob constructor.
     * @param $post
     * @param $user
     * @param $photos
     */
    public function __construct($post, $user, $photos)
    {
        $this->post = $post;
        $this->user = $user;
        $this->photos = $photos;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->photos as $photo) {
            $compressedImage = cloudinary()->upload($photo, [
                'folder' => 'post-images/' . $this->user->id . '/' . $this->post->id,
                'transformation' => [
                    'quality' => 20,
                ]
            ])->getSecurePath();

            $newPostImage = new PostImage();
            $newPostImage->post_id = $this->post->id;
            $newPostImage->url = $compressedImage;
            $newPostImage->save();
        }
        Log::debug('Before Sleep');
        sleep(900);
        Log::debug("After Sleep");

        $photos = [];
        $fb = new Facebook([
            'app_id' => env('FACEBOOK_CLIENT_ID'),
            'app_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'default_graph_version' => 'v9.0'
        ]);
        $fb->setDefaultAccessToken(env('FACEBOOK_ACCESS_TOKEN'));

        $postsImages = PostImage::where('post_id', $this->post->id)->get();

        $endpoint = "/" . env('FACEBOOK_PAGE_ID') . "/photos";

        foreach ($postsImages as $file_url) {
            array_push($photos, $fb->request('POST', $endpoint, ['url' => $file_url->url, 'published' => FALSE,]));
        }

        $uploaded_photos = $fb->sendBatchRequest($photos, env('FACEBOOK_ACCESS_TOKEN'));
        $data_post = array("attached_media" => array(), "message" => array(), 'access_token' => env('FACEBOOK_ACCESS_TOKEN'));

        foreach ($uploaded_photos as $photo) {
            array_push($data_post['attached_media'], '{"media_fbid":"' . $photo->getDecodedBody()['id'] . '"}');
        }

        $message = "";
        $message = $message . "🌟🚨New App Verified Trader🚨🌟";
        $message = $message . "\nTradable Now @ " . $this->post->price;
        $message = $message . "\nREG Number: " . strtoupper($this->post->regno);
        $message = $message . "\nMileage: " . $this->post->mileage;
        $message = $message . "\nMake: " . Make::where('id', $this->post->make_id)->first()->name;
        $message = $message . "\nModel: " . Models::where('id', $this->post->model_id)->first()->name;
        $message = $message . "\nOverview: " . $this->post->type . " | " . FuelType::where('id', $this->post->fuel_type_id)->first()->name . " | " . $this->post->doors . " doors | " . $this->post->seats . " seats | " . $this->post->engine . " engine | " . $this->post->transition . " transmission | " . $this->post->owners . " owners | " . $this->post->year . " year |";
        $message = $message . "\nLocation: " . UserProfile::where('user_id', $this->user->id)->first()->city ?? " ";
        $message = $message . "\nDealer: " . $this->user->name;
        $message = $message . "\nDescription:\n";
        $message = $message . $this->post->post_desc . "\n";
        $message = $message . "\nView MotorCheck Report On The App: " . url('/app/post/' . $this->post->id);
        $message = $message . "\nDownload IOS App: ";
        $message = $message . "\nDownload Android App: \n";
        $message = $message . "\n#GameChanger #TheOnlyWayIsApp ";

        $data_post['message'] = $message;

        Http::post('https://graph.facebook.com/' . env('FACEBOOK_PAGE_ID') . '/feed', $data_post);

        $this->post->is_waiting = false;
        $this->post->save();
    }
}
