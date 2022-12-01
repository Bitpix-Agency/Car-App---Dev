<?php

namespace App\Http\Livewire;

use App\Models\FuelType;
use App\Models\Make;
use App\Models\Models;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditListingComponent extends Component
{
    use WithFileUploads;

    public $postId, $currentStep = 1, $regNo, $makeId, $modelId, $mileage, $price, $fuelId, $doors, $type, $seats, $year, $engine;
    public $owners, $transmission, $showLocation, $postDesc, $photos = [], $keys, $serviceHistory, $dealerHistory, $vehicleStatus;
    public $v5Status, $tread1, $tread2, $tread3, $tread4, $success = false, $motExpire, $prep;
    public $userId, $post;

    public function mount($id)
    {
        $this->userId = auth()->user()->id;
        $this->postId = $id;

        $this->post = Post::find($this->postId);
        $this->regNo = $this->post->regno;
        $this->makeId = $this->post->make_id;
        $this->modelId = $this->post->model_id;
        $this->mileage = $this->post->mileage;
        $this->price = $this->post->price;
        $this->fuelId = $this->post->fuel_type_id;
        $this->doors = $this->post->doors;
        $this->type = $this->post->type;
        $this->seats = $this->post->seats;
        $this->year = $this->post->year;
        $this->engine = $this->post->engine;
        $this->owners = $this->post->owners;
        $this->transmission = $this->post->transition;
        $this->postDesc = $this->post->post_desc;
        $this->tread1 = $this->post->tread_1;
        $this->tread2 = $this->post->tread_2;
        $this->tread3 = $this->post->tread_3;
        $this->tread4 = $this->post->tread_4;
        $this->keys = $this->post->keys;
        $this->serviceHistory = $this->post->service_history;
        $this->dealerHistory = $this->post->dealer_history;
        $this->vehicleStatus = $this->post->vehicle_status ?? "";
        $this->v5Status = $this->post->has_v5 ?? "";
        $this->keys = $this->post->keys;
        $this->motExpire = $this->post->mot_expire;
        $this->prep = $this->post->prep;
    }

    public function render()
    {
        if ($this->post->user_id != auth()->user()->id) {
            $this->redirect('/app/dashboard');
        }

        return view('livewire.edit-listing-component', [
            'makes' => Make::all(),
            'models' => Models::all(),
            'fuels' => FuelType::all(),
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'regNo' => 'required',
            'makeId' => 'required|integer',
            'modelId' => 'required|integer',
            'mileage' => 'required|integer',
            'price' => 'required',
            'fuelId' => 'required|integer',
            'doors' => 'required|integer',
            'type' => 'required',
            'seats' => 'required|integer',
            'year' => 'required|integer',
            'engine' => 'required',
            'owners' => 'required|integer',
            'transmission' => 'required',
            'postDesc' => 'required',
            'photos.*' => 'required',
            'keys' => 'required',
            'serviceHistory' => 'required',
            'dealerHistory' => 'required',
            'vehicleStatus' => 'required',
            'v5Status' => 'required',
            'tread1' => 'required|integer',
            'tread2' => 'required|integer',
            'tread3' => 'required|integer',
            'tread4' => 'required|integer',
            'motExpire' => 'required|date',
            'prep' => 'required|integer',
        ]);

        $this->post->title = Make::where('id', $this->makeId)->first()->name . " " . Models::where('id', $this->modelId)->first()->name;
        $this->post->regno = $this->regNo;
        $this->post->make_id = $this->makeId;
        $this->post->model_id = $this->modelId;
        $this->post->mileage = $this->mileage;
        $this->post->price = $this->price;
        $this->post->fuel_type_id = $this->fuelId;
        $this->post->doors = $this->doors;
        $this->post->type = $this->type;
        $this->post->seats = $this->seats;
        $this->post->year = $this->year;
        $this->post->engine = $this->engine;
        $this->post->owners = $this->owners;
        $this->post->transition = $this->transmission;
        $this->post->post_desc = $this->postDesc;
        $this->post->keys = $this->keys;
        $this->post->service_history = $this->serviceHistory;
        $this->post->dealer_history = $this->dealerHistory;
        $this->post->vehicle_status = $this->vehicleStatus;
        $this->post->has_v5 = $this->v5Status;
        $this->post->tread_1 = $this->tread1;
        $this->post->tread_2 = $this->tread2;
        $this->post->tread_3 = $this->tread3;
        $this->post->tread_4 = $this->tread4;
        $this->post->mot_expire = $this->motExpire;
        $this->post->prep = $this->prep;

        //Missing
        $this->post->is_bid = false;
        $this->post->location = "Test Location";

        $this->post->save();

        foreach ($this->photos as $photo) {
            $file_path = 'post-images/' . auth()->user()->id . '/' . $this->post->id . '/';
            Storage::disk('spaces')->putFileAs($file_path, $photo, $photo->getClientOriginalName(), 'public');

            $newPostImage = new PostImage();
            $newPostImage->post_id = $this->post->id;
            $newPostImage->url = Storage::disk('spaces')->url($file_path . $photo->getClientOriginalName());
            $newPostImage->save();
        }

        $this->success = "Post Updated";
    }

    public function sold()
    {
        return redirect(route('sold', ['id' => $this->postId]));
    }

    public function delete()
    {
        $postImages = PostImage::where('post_id', $this->postId)->get();
        foreach ($postImages as $postImage) {
            $postImage->delete();
        }

        $this->post->delete();

        return redirect(route('listings'));
    }
}
