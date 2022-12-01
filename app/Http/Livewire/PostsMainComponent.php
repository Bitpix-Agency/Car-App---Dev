<?php

namespace App\Http\Livewire;

use App\Models\Alert;
use App\Models\FuelType;
use App\Models\Make;
use App\Models\Models;
use App\Models\Post;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class PostsMainComponent extends Component
{
    use WithPagination;

    public $minPrice, $makeId, $modelId, $mileage, $user, $userProfile, $seatId, $year, $reg, $fuelId, $sortBy = "newest-desc", $bodyType, $features, $message = null, $keyword, $makes, $models;

    public function mount(Request $request)
    {
        if ($request->makeId)
            $this->makeId = $request->makeId;
        if ($request->modelId)
            $this->modelId = $request->modelId;
        if ($request->keyword)
            $this->keyword = $request->keyword;
    }

    public function render()
    {
        $date = "2021-04-01";

        $posts = Post::query()->where('is_sold', false)->where('is_waiting', false)->whereDate('created_at', '>=' , $date);

        if ($this->modelId)
            $posts = $posts->where('model_id', $this->modelId);

        if ($this->makeId)
            $posts = $posts->where('make_id', $this->makeId);

        if ($this->minPrice)
            $posts = $posts->where('price', '>=', $this->minPrice);

        if ($this->mileage)
            $posts = $posts->where('mileage', '>=', $this->mileage);

        if ($this->year)
            $posts = $posts->where('year', $this->year);

        if ($this->seatId)
            $posts = $posts->where('seats', $this->seatId);

        if ($this->reg)
            $posts = $posts->where('regno', 'like', '%' . $this->reg . '%');

        if ($this->fuelId)
            $posts = $posts->where('fuel_type_id', $this->fuelId);

        if ($this->sortBy === "price-asc") {
            $posts = $posts->orderBy('price')->paginate(20);
        }

        if ($this->sortBy === "price-desc") {
            $posts = $posts->orderBy('price', 'desc')->paginate(20);
        }

        if ($this->sortBy === "newest-desc") {
            $posts = $posts->orderBy('created_at', 'desc')->paginate(20);
        }

        if ($this->sortBy === "oldest-asc") {
            $posts = $posts->orderBy('created_at')->paginate(20);
        }

        $this->makes = Make::orderBy('name')->get();
        $this->models = Models::inRandomOrder()->limit(50);
        if ($this->makeId)
            $this->models = Models::where('make_id', $this->makeId);

        $this->models = $this->models->orderBy('name')->get();

        return view('livewire.posts-main-component', [
            'posts' => $posts,
            'fuels' => FuelType::all(),
        ]);
    }

    public function clear()
    {
        $this->minPrice = '';
        $this->makeId = '';
        $this->modelId = '';
        $this->mileage = '';
        $this->seatId = '';
        $this->year = '';
        $this->reg = '';
        $this->fuelId = '';
    }

    public function alert()
    {
        $newAlert = Alert::create([
            'user_id' => auth()->user()->id,
            'make_id' => $this->makeId,
            'model_id' => $this->modelId,
            'body_type' => $this->bodyType,
            'min_price' => $this->minPrice,
            'mileage' => $this->mileage,
            'year' => $this->year,
            'reg_no' => $this->reg,
            'fuel_type_id' => $this->fuelId,
            'features' => $this->features,
        ]);
        $newAlert->save();

        $this->message = "saved";
    }
}
