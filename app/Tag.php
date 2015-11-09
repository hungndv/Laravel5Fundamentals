<?php

namespace Laravel5Fundatmentals;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = array('name');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(){
        return $this->belongsToMany(Article::class);
        //return $this->belongsToMany(Article::class, 'pivot_table_name', 'article_column_name_in_pivot_table');
    }
}
