<?php

namespace App\Services;

use App\Repositories\Contracts\NotificationRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class NotificationService
{
    /**
     * @var NotificationRepositoryContract
     */
    protected $notificationRepository;

    /**
     * NotificationService constructor.
     * @param NotificationRepositoryContract $notificationRepository
     */
    public function __construct(NotificationRepositoryContract $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function newNotification(array $data): Model
    {
        return $this->notificationRepository->newNotification($data);
    }

}
