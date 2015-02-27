<?php namespace Api\Http\Transformers;

use Api\Question;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
{
    public function transform(Question $q)
    {
        return [
            'id' => $q->id,
            'body' => $q->question,
            'choices' => $q->choices,
            'answer' => $q->accepted_answers
        ];
    }
}
