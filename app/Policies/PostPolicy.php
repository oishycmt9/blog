<?php

namespace App\Policies;

use App\Models\User;

class PostPolicy
{
    public function edit($user, $post): bool
    {
        return $user['id'] == $post['user_id'];
        return false;
    }

    public function update($user, $post): bool
    {
        return $user['id'] == $post['user_id'];
        return false;
    }

    public function delete($user, $post): bool
    {
        return $user['id'] == $post['user_id'];
        return false;
    }
}
