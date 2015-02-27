<?php namespace Api\Http\Controllers;

use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Manager;

use Api\Http\Controllers\Controller;

class ApiController extends Controller {

    protected $statusCode = 200;
    protected $fractal = null;

    const CODE_WRONG_ARGS = 'API-WRONG-ARGS';
    const CODE_NOT_FOUND = 'API-NOT-FOUND';
    const CODE_INTERNAL_ERROR = 'API-INTERNAL-ERROR';
    const CODE_UNAUTHORISED = 'API-UNAUTHORISED';
    const CODE_FORBIDDEN = 'API-FORBIDDEN';

    public function __construct(Manager $fractal)
    {
        $this->fractal = new Manager();
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    protected function respondWithItem($item, $callback)
    {
        $resource = new Item($item, $callback);
        $rootScope = $this->fractal->createData($resource);
        return $this->respondWithArray($rootScope->toArray());
    }

    protected function respondWithCollection($collection, $callback)
    {
        $resource = new Collection($collection, $callback);
        $rootScope = $this->fractal->createData($resource);
        return $this->respondWithArray($rootScope->toArray());
    }

    protected function respondWithArray(Array $array, Array $headers =[])
    {
        return response($array, $this->statusCode);
    }

    protected function respondWithError($message, $errorCode)
    {
        if ($this->statusCode === 200) {
            trigger_error(
                "You better have a really good reason for erroring on a 200...",
                E_USER_WARNING
            );
        }

        return $this->respondWithArray([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->statusCode,
                'message' => $message,
            ]
        ]);
    }

    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(403)->resondWithError($message, self::CODE_FORBIDDEN);
    }

    public function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)->respondWithError($message, self::CODE_INTERNAL_ERROR);
    }

    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message, self::CODE_NOT_FOUND);
    }

    public function errorUnauthorised($message = 'Unauthorised')
    {
        return $this->setStatusCode(401)->respondWithError($message, self::CODE_UNAUTHORISED);
    }

    public function errorWrongArgs($message = 'Wrong arguments')
    {
        return $this->setStatusCode(400)->respondWithError($message, self::CODE_WRONG_ARGS);
    }
}
