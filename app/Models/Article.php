<?php

namespace App\Models;

use App\Traits\Attach;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use Attach;

    protected $guarded = ['id'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories', 'article_id', 'category_id');
    }

    public function writers(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'article_writers','article_id','user_id');
    }

}
