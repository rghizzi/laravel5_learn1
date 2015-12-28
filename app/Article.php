<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'excerpts','published_date','user_id'];


    //comment test

    //DATE for carbon usage

    protected $dates = ['published_date'];

    // setNameAttibute
    /**
     * @param $date
     */
    public function setTitleAttribute($date)
    {
        $this->attributes['title'] = strtoupper($date);
    }


    /**
     * @param $query
     */
    public function scopePublished($query)
    {
         $query->where('published_date','<=',Carbon::now());
    }

    /**
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_date','>',Carbon::now());
    }

    /**
     * An article is owner by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Return the tags that belongs to this article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Return the Ids of associated tag
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }
}
