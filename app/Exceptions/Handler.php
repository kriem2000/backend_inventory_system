<?php

namespace App\Exceptions;

use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            $response = [
                //'code'  =>  3007,
                'message'   =>  'Model not found'
            ];
            return response()->json($response);
        }

        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return response()->json(["message"=>'User unauthorized'],403);
        }

        if($exception instanceOf \Illuminate\validation\ValidationException)
        {
            return Response()->json(['errors' => $exception->errors()],422);
        }

        return Response()->json(["errors"=>$exception->getMessage()]);
        //return parent::render($request, $exception);

        
    }
}
