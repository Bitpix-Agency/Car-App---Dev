<?php

namespace App\Repositories\Contracts;

use App\Models\Conversation;
use App\Models\Message;

interface ChatRepositoryContract
{
    /**
     * @param int $toUser
     * @param int $fromUser
     * @param int $status
     * @return Conversation
     */
    public function createUpdateConversation(int $toUser, int $fromUser, int $status): Conversation;

    /**
     * @param string $message
     * @param bool $isSeen
     * @param bool $deletedFromSender
     * @param bool $deletedFromReceiver
     * @param int $fromUser
     * @param int $conversationId
     * @return Message
     */
    public function sendMessage(string $message, bool $isSeen, bool $deletedFromSender, bool $deletedFromReceiver, int $fromUser, int $conversationId): Message;

}
