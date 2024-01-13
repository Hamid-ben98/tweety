<?php


namespace App\Models;




use Illuminate\Database\Eloquent\Builder;

trait Likble
{
public function scopeWithLikes(Builder  $query){
    $query->leftJoinSub('select tweet_id,sum(liked) likes,sum(!liked) disliked from
    likes group by tweet_id','likes','likes.tweet_id','tweets.id');
}
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like(User $user)
    {
        $this->likes()->updateOrCreate([
                'user_id' => $user ? $user->id : auth()->id()]
            , ['liked' => true]
        );
    }

    public function dislike(User $user)
    {
        $this->likes()->updateOrCreate([
                'user_id' => $user ? $user->id : auth()->id()]
            , ['liked' => false

            ]);
    }

    public function isDislikedBy(User $user)
    {
        return $this->likes()
            ->where('user_id', $user->id)
            ->where('liked', false)
            ->exists();
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()
            ->where('user_id', $user->id)
            ->where('liked', true)
            ->exists();
    }
}
