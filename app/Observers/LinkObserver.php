<?php

namespace App\Observers;

use App\Models\Link;
use App\Models\Reply;
use App\Models\Topic;
use App\Notifications\TopicReplied;
use Illuminate\Support\Facades\Cache;

class LinkObserver
{

   public function saved(Link $link){

       Cache::forget($link->cache_key);
   }

}
