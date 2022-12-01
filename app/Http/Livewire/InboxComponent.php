<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class InboxComponent extends Component
{
    public $fromUserId, $writeMsg, $conversationId, $errormessage = null;
    public $fromUser = null, $messages = null;

    public function render()
    {
        return view('livewire.inbox-component', [
            'conversations' => Conversation::where('to_user', auth()->user()->id)->orWhere('from_user', auth()->user()->id)->with('fromUser', 'toUser')->orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function getChat($fromUserId, $conversationId)
    {
        $this->conversationId = $conversationId;
        $this->fromUser = User::where('id', $fromUserId)->with('profile')->first();
        $this->messages = Message::where('conversation_id', $conversationId)->orderBy('created_at', 'desc')->get();
    }

    public function sendMessage()
    {
        if ($this->writeMsg == "") {
            $this->errormessage = "You need to add some text";
            return;
        }
        $this->errormessage = null;
        Message::create([
            'message' => $this->writeMsg,
            'is_seen' => false,
            'deleted_from_sender' => false,
            'deleted_from_receiver' => false,
            'user_id' => auth()->user()->id,
            'conversation_id' => $this->conversationId,
        ]);

        $this->messages = Message::where('conversation_id', $this->conversationId)->orderBy('created_at', 'desc')->get();

        $this->writeMsg = '';
    }
}

