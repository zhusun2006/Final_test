<?php
namespace App\Observers;
use App\Notifications\TopicReplied;
use App\Models\Reply;

class ReplyObserver
{
    public function created(Reply $reply)
    {
        //$reply->antopic->reply_count = $reply->antopic->replies->count();
        //$reply->antopic->save();

        // 通知话题作者有新的评论
        // $reply->user->notify(new TopicReplied($reply));
    }

}
