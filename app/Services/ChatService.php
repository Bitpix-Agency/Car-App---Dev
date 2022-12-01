<?php

namespace App\Services;

use App\Models\Conversation;
use App\Models\Message;
use App\Repositories\Contracts\ChatRepositoryContract;

class ChatService
{
    /**
     * @var ChatRepositoryContract
     */
    protected $chatRepository;

    /**
     * ChatService constructor.
     * @param ChatRepositoryContract $chatRepository
     */
    public function __construct(ChatRepositoryContract $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    /**
     * @param int $toUser
     * @param int $fromUser
     * @param int $status
     * @return Conversation
     */
    public function createUpdateConversation(int $toUser, int $fromUser, int $status): Conversation
    {
        return $this->chatRepository->createUpdateConversation($toUser, $fromUser, $status);
    }

    /**
     * @param string $message
     * @param bool $isSeen
     * @param bool $deletedFromSender
     * @param bool $deletedFromReceiver
     * @param int $fromUser
     * @param int $conversationId
     * @return Message
     */
    public function sendMessage(string $message, bool $isSeen, bool $deletedFromSender, bool $deletedFromReceiver, int $fromUser, int $conversationId): Message
    {
        return $this->chatRepository->sendMessage($message, $isSeen, $deletedFromSender, $deletedFromReceiver, $fromUser, $conversationId);
    }

}
