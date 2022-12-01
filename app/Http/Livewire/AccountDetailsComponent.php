<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountDetailsComponent extends Component
{
    use WithFileUploads;

    public $name, $companyName, $email, $photo, $bio, $phoneNumber, $test, $userId, $user, $message = false, $lat, $lng;

    public function render()
    {
        $this->user = User::where('id', auth()->user()->id)->with('profile', 'posts')->first();

        $this->userId = $this->user->id;

        return view('livewire.account-details-component', [
            'user' => $this->user
        ]);
    }

    protected $listeners = [
        'set:latitude-longitude' => 'setLatitudeLongitude'
    ];

    public function setLatitudeLongitude($latitude, $longitude)
    {
        $this->lat = $latitude;
        $this->lng = $longitude;
    }

    public function update()
    {
        $user = User::where('id', $this->userId)->first();
        $user->name = $this->name ?? $user->name;
        $user->email = $this->email ?? $user->email;
        $user->save();

        $userProfileUpdate = UserProfile::where('user_id', $this->userId)->first();
        $userProfileUpdate->phone_no = $this->phoneNumber ?? $userProfileUpdate->phone_no;
        $userProfileUpdate->user_bio = $this->bio ?? $userProfileUpdate->bio;
        $userProfileUpdate->job = $this->companyName ?? $userProfileUpdate->job;
        $userProfileUpdate->lat = $this->lat ?? $userProfileUpdate->lat;
        $userProfileUpdate->lng = $this->lng ?? $userProfileUpdate->lng;
        if ($this->photo) {
            $file_path = 'profile-images/' . $this->userId . '/';
            Storage::disk('spaces')->putFileAs($file_path, $this->photo, $this->photo->getClientOriginalName(), 'public');
            $profileImageUrl = Storage::disk('spaces')->url($file_path . $this->photo->getClientOriginalName());
            $userProfileUpdate->profile_image = $profileImageUrl;
        }
        $userProfileUpdate->save();

        $this->message = "Profile Updated";

        return view('profile.account');
    }
}
