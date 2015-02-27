<?php namespace Api\Contracts;

/*
 * Retrieving questions based on options given
 * in the options object.
 */
interface QuestionQueryInterface {

    public function getQuestions($options);

}
