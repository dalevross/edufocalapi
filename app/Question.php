<?php namespace Api;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    /*
     * Relationship: Questions
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('Api\Question');
    }

    /*
     * Relationship: Topic
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function topic()
    {
        return $this->belongsTo('Api\Topic');
    }
}
