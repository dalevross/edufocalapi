<?php namespace Api\Http\Transformers;

use Api\Question;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'questions'
    ];

    public function transform(Question $q)
    {
        return [
            'id' => $q->id,
            'instruction' => $q->instruction,
            'body' => $q->question,
            'choices' => $q->choices,
            'answer' => $q->accepted_answers,
            'parts' => $q->weight,
        ];
    }

    public function includeQuestions(Question $q)
    {
        $questions = $q->questions;
        return $this->collection($questions, new QuestionTransformer);
    }
}
