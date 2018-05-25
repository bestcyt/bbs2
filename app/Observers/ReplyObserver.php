<?php

namespace App\Observers;

use App\Models\Reply;
use App\Models\Topic;

class ReplyObserver
{

    public function creating(Reply $reply){
        $reply->content = clean($reply->content,'user_topic_body');
    }

    public function saved(Reply $reply){

        $reply->topic->increment('reply_count', 1);
    }

}
