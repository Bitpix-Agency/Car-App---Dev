<?php

namespace App\Providers;

use App\Repositories\ChatRepository;
use App\Repositories\Contracts\ChatRepositoryContract;
use App\Repositories\Contracts\DealRepositoryContract;
use App\Repositories\Contracts\DeviceRepositoryContract;
use App\Repositories\Contracts\FeedbackRepositoryContract;
use App\Repositories\Contracts\FuelRepositoryContract;
use App\Repositories\Contracts\MakeRepositoryContract;
use App\Repositories\Contracts\MembershipRepositoryContract;
use App\Repositories\Contracts\ModelRepositoryContract;
use App\Repositories\Contracts\NotificationRepositoryContract;
use App\Repositories\Contracts\PaymentRepositoryContract;
use App\Repositories\Contracts\PostRepositoryContract;
use App\Repositories\Contracts\RatingRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\DealRepository;
use App\Repositories\DeviceRepository;
use App\Repositories\FeedbackRepository;
use App\Repositories\FuelRepository;
use App\Repositories\MakeRepository;
use App\Repositories\MembershipRepository;
use App\Repositories\ModelRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\PostRepository;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(PostRepositoryContract::class, PostRepository::class);
        $this->app->bind(MembershipRepositoryContract::class, MembershipRepository::class);
        $this->app->bind(ChatRepositoryContract::class, ChatRepository::class);
        $this->app->bind(DealRepositoryContract::class, DealRepository::class);
        $this->app->bind(DeviceRepositoryContract::class, DeviceRepository::class);
        $this->app->bind(FeedbackRepositoryContract::class, FeedbackRepository::class);
        $this->app->bind(FuelRepositoryContract::class, FuelRepository::class);
        $this->app->bind(MakeRepositoryContract::class, MakeRepository::class);
        $this->app->bind(ModelRepositoryContract::class, ModelRepository::class);
        $this->app->bind(NotificationRepositoryContract::class, NotificationRepository::class);
        $this->app->bind(PaymentRepositoryContract::class, PaymentRepository::class);
        $this->app->bind(RatingRepositoryContract::class, RatingRepository::class);
    }
}
