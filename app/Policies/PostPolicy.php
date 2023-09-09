<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy
{
    public function update($post): bool
    {
        return auth()->user()->id === $post->user_id;
    }
}
