<?php namespace Api\Http\Controllers;

use Api\Http\Requests;
use Api\Http\Controllers\ApiController;
use League\Fractal\Manager;

use Illuminate\Http\Request;

class QuestionController extends ApiController {

    protected $question = null;

    public function __construct(Manager $fractal, \Api\Question $question)
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
        $questions = $this->question->take(10)->get();

        return $this->respondWithCollection($questions, function($q) {

            return [
                'id' => $q->id,
                'body' => $q->question,
                'choices' => $q->choices,
                'answer' => $q->accepted_answers
            ];

        });
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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
