<?php namespace Api\Http\Transformers;

use Api\Topic;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{

    public function transform(Topic $top)
    {
        return [
            'id' => $top->id,
            'name' => $top->name,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/topics/'.$top->id,
                ],
                [
                    'rel' => 'topics.questions',
                    'uri' => '/topics/'.$top->id.'/questions',
                ]
            ]
        ];
    }
}
