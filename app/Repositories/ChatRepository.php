<?php

namespace App\Repositories;

use App\Models\Conversation;
use App\Models\Message;
use App\Repositories\Contracts\ChatRepositoryContract;

class ChatRepository implements ChatRepositoryContract
{
    /**
     * @param int $toUser
     * @param int $fromUser
     * @param int $status
     * @return Conversation
     */
    public function createUpdateConversation(int $toUser, int $fromUser, int $status): Conversation
    {
        return Conversation::updateOrCreate(
            [
                'to_user' => $toUser,
                'from_user' => $fromUser,
            ],
            [
                'to_user' => $toUser,
                'from_user' => $fromUser,
                'status' => $status,
            ]);
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
        return Message::create([
            'message' => $message,
            'is_seen' => $isSeen,
            'deleted_from_sender' => $deletedFromSender,
            'deleted_from_receiver' => $deletedFromReceiver,
            'user_id' => $fromUser,
            'conversation_id' => $conversationId,
        ]);
    }
}
