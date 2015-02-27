<?php namespace Api\Http\Transformers;

use Api\Question;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'questions',
        'topic'
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
            'status' => $q->status,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/questions/' . $q->id,
                ]
            ]
        ];
    }

    public function includeQuestions(Question $q)
    {
        $questions = $q->questions;
        return $this->collection($questions, $this);
    }

    public function includeTopic(Question $q)
    {
        $topic = $q->topic;
        return $this->item($topic, new TopicTransformer);
    }
}
