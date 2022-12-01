<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    /**
     * @param MessageRequest $request
     * @return JsonResponse
     */
    public function message(MessageRequest $request): JsonResponse
    {
        $conversation = $this->chatService->createUpdateConversation($request->to_user, auth()->user()->id, 1);

        $this->chatService->sendMessage($request->message, false, false, false, auth()->user()->id, $conversation->id);

        return $this->responseHelper->response(true, "mesage sent", [], 200);
    }

    /**
     * @return JsonResponse
     */
    public function allMessages(): JsonResponse
    {
        $messages = Conversation::where('to_user', auth()->user()->id)->orWhere('from_user', auth()->user()->id)->with('fromUser', 'toUser')->orderBy('updated_at', 'desc')->paginate(15);
        return $this->responseHelper->response(true, "All conversations", $messages, 200);
    }

    /**
     * @param int $conversationId
     * @return JsonResponse
     */
    public function messages(int $conversationId): JsonResponse
    {
        $conversation = Conversation::where('id', $conversationId)->first();

        if ($conversation) {
            if (($conversation->to_user != auth()->user()->id) && ($conversation->from_user != auth()->user()->id)) {
                return $this->responseHelper->response(false, "You can't view these messages", [], 404);
            }
        } else {
            return $this->responseHelper->response(false, "Not Found", [], 404);
        }

        $messages = Message::where('conversation_id', $conversationId)->orderBy('created_at', 'desc')->get();
        return $this->responseHelper->response(true, "conversation", $messages, 200);
    }
}
