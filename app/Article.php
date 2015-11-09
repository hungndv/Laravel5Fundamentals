<?php

namespace Laravel5Fundatmentals;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // deal with MassAssignmentException
    protected $fillable = array('title', 'body', 'published_at', 'user_id');

    protected $dates = ['published_at'];

    /**
     * Query scope
     * @param $query
     */
    public function scopePublish($query){
        $query->where('published_at', '<=', Carbon::now());
    }


    /**
     * @return static
     */
    public function getDates(){
        return ['published_at'];
        //return Carbon::parse($this->attributes['published_at']);
    }

    /**
     * @param $date
     */
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function getPublishedAtAttribute($date){
        return new Carbon($date);
        //return (new Carbon($date))->format('Y-m-d');
    }


    /**
     * An article belongs to an user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){ // can change to writer, owner
        return $this->belongsTo(User::class);
    }

    /**
     *
     */
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }


    /**
     * Update Article, update selected tags
     *
     * @return mixed
     */
    public function tagListAttribute(){
        return $this->tags()->lists('id')->toArray();
    }
}
