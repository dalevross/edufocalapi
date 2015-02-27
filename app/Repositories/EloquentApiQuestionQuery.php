<?php namespace Api\Repositories;

use DB;
use Api\Question;
use Api\Contracts\QuestionQueryInterface;

class  EloquentApiQuestionQuery implements QuestionQueryInterface {

    /*
     * Naive implementation of querying.
     * Intend to iterate on this to get eager loading right
     * based on option paramters.
     */
    public function getQuestions($options=[])
    {
        if (! isset($options['limit'])) {
            $options['limit'] = 3;
        }

        //TODO: set api endpoint limit
        if ($options['limit'] > 10) {
            $options['limit'] = 10;
        }

        return $this->_getQuestions($options);
    }

    /*
     * TODO: Order by
     */
    protected function _getQuestions($options=[])
    {
        $query = Question::take($options['limit']);

        if (isset($options['topic'])) {
            $query->where('topic_id', '=', $options['topic']);
        }

        if (isset($options['teacher'])) {
            $query->where('user_id', '=', $options['teacher']);
        }

        if (isset($options['except'])) {
            $query->whereNotIn('id', (array)$options['except']);
        }

        if (isset($options['id'])) {
            $query->whereIn('id', (array)$options['id']);
        }

        if (isset($options['status'])) {
            $query->where('status', '=', $options['status']);
        }

        if (isset($options['limit'])) {
            $query->take($options['limit']);
        }

        $query->where('question_id', '=', 0);

        return $query->get();

        //return Question::whereIn('id', $subset)->orderBy('weight', 'desc')->get();
    }
}
