<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    // Check if user can update this article
    public function update(User $user, Article $article)
    {
        // Only the article author can update it
        return $user->id === $article->user_id;
    }

    // Check if user can delete this article
    public function delete(User $user, Article $article)
    {
        // Only the article author can delete it
        return $user->id === $article->user_id;
    }
}
