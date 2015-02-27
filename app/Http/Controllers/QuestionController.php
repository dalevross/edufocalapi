<?php namespace Api\Http\Controllers;

use Api\Http\Requests;
use Api\Http\Controllers\ApiController;
use Api\Question;
use Api\Http\Transformers\QuestionTransformer;
use League\Fractal\Manager;

use Request;

class QuestionController extends ApiController {

    protected $question = null;

    public function __construct(Manager $fractal, Question $question)
    {
        parent::__construct($fractal);
        $this->question = $question;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = $this->question->where('weight', '>', 1)->take(3)->get();
        return $this->respondWithCollection($questions, new QuestionTransformer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $question = $this->question->find($id);
        return $this->respondWithItem($question, new QuestionTransformer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
