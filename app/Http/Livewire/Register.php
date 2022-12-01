<?php

namespace App\Http\Livewire;

use App\Models\PostImage;
use App\Models\StripePayment;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Hash;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $currentStep = 299;
    public $user, $firstname, $lastname, $companyName, $email, $status = 1, $password, $photo, $accepted = false, $subId, $password_confirmation, $lat, $lon, $phone, $cardName, $intent = null, $token = null, $message = null, $disabled = false;
    public $subscriptions, $photoId, $photoSelfie, $document;

    protected $listeners = [
        'set:latitude-longitude' => 'setLatitudeLongitude'
    ];

    public function setLatitudeLongitude($latitude, $longitude)
    {
        $this->lat = $latitude;
        $this->lon = $longitude;
    }

    public function mount($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function render()
    {
        $this->subscriptions = StripePayment::whereIn('id', [StripePayment::STRIPE_STANDARD, StripePayment::STRIPE_PREMIUM])->get();
        return view('livewire.register');
    }

    public function clearForm()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->companyName = '';
        $this->email = '';
        $this->password = '';
        $this->photo = '';
        $this->subId = '';
    }

    public function start()
    {
        $this->currentStep = 1;
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'companyName' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
        ]);

        $this->currentStep = 99;
    }

    public function location()
    {
        $validatedData = $this->validate([
            'lat' => 'required',
            'lon' => 'required',
        ]);

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'password' => 'required|confirmed',
        ]);

        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'photo' => 'required',
        ]);

        $this->currentStep = 4;
    }

    public function forthStepSubmit()
    {
        $this->accepted = true;

        $this->currentStep = 5;
    }

    public function fifthStepSubmit()
    {
        $validatedData = $this->validate([
            'subId' => 'required',
        ]);

        $this->user = User::create([
            'name' => $this->firstname . " " . $this->lastname,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $file_path = 'profile-images/' . $this->user->id . '/';
        Storage::disk('spaces')->putFileAs($file_path, $this->photo, $this->photo->getClientOriginalName(), 'public');
        $profileImageUrl = Storage::disk('spaces')->url($file_path . $this->photo->getClientOriginalName());

        UserProfile::create([
            'user_id' => $this->user->id,
            'profile_image' => $profileImageUrl,
            'lat' => $this->lat,
            'lng' => $this->lon,
            'phone_no' => $this->phone,
        ]);

        $this->intent = $this->user->createSetupIntent()->client_secret;

        $this->currentStep = 6;
    }

    public function sixthStepSubmit()
    {
        $this->currentStep = 7;
    }

    public function store()
    {
        if (!$this->token) {
            $this->message = "Please confirm again";
        }
        $this->message = "Submitting Payment Please Wait";
        $this->disabled = true;
        $plan = StripePayment::where('id', $this->subId)->first();

        $this->user->newSubscription('default', $plan->price_id)->create($this->token);

        $this->currentStep = 8;
    }

    public function eighthStepSubmit()
    {
        $validatedData = $this->validate([
            'photoId' => 'required',
            'photoSelfie' => 'required',
            'document' => 'required',
        ]);

        $file_path = 'user-documents/' . $this->user->id . '/';

        Storage::disk('spaces')->putFileAs($file_path, $this->photoId, $this->photoId->getClientOriginalName(), 'public');
        $photoIdUrl = Storage::disk('spaces')->url($file_path . $this->photoId->getClientOriginalName());

        Storage::disk('spaces')->putFileAs($file_path, $this->photoSelfie, $this->photoSelfie->getClientOriginalName(), 'public');
        $selfieImageUrl = Storage::disk('spaces')->url($file_path . $this->photoSelfie->getClientOriginalName());

        Storage::disk('spaces')->putFileAs($file_path, $this->document, $this->document->getClientOriginalName(), 'public');
        $documentUrl = Storage::disk('spaces')->url($file_path . $this->document->getClientOriginalName());

        $userProfileUpdate = UserProfile::where('user_id', $this->user->id)->first();
        $userProfileUpdate->photo_id_url = $photoIdUrl;
        $userProfileUpdate->selfie_url = $selfieImageUrl;
        $userProfileUpdate->document_url = $documentUrl;
        $userProfileUpdate->save();

        $this->currentStep = 9;
    }

    public function submitForm()
    {
        return $this->redirect('/auth/login/email');
    }
}
