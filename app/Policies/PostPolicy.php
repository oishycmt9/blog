<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy
{
    public function update(Post $post): bool
    {
        return auth()->user()->id === $post->user_id;
    }
}
