<?php

namespace App\Models;

use App\Traits\Attach;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use Attach;

    protected $guarded = ['id'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories', 'article_id', 'first_category');
    }

    public function writers(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'article_writers','article_id','user_id');
    }

    public function journal(): BelongsTo
    {
        return $this->belongsTo(Journal::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'article_tags','article_id','tag_id');
    }

    public function log()
    {
        return $this->hasMany(ArticleLog::class,'article_id');
    }

    public function logDownload()
    {
        return $this->hasMany(ArticleLog::class,'article_id')->where('log','download_number');
    }

    public function logView()
    {
        return $this->hasMany(ArticleLog::class,'article_id')->where('log','view_number');
    }
}
