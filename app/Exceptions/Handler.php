<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

//exceptions to handle
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
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
        $this->renderable(function (Throwable $e, $request) {
            //para que solamente retorne respuesta json cuando la url es de apo tiene el segmento api
            if ($request->is('api/*')) {//wantsJson - expectsJson
                if ($e instanceof NotFoundHttpException) {
                    return response()->json([
                        'message' => 'Información no encontrada - NotFoundHttpException'
                    ], 404);
                }elseif($e instanceof QueryException){
                    return response()->json([
                        'message' => 'Consulta no permitida. - QueryException'
                    ], 500);
                }elseif($e instanceof MethodNotAllowedHttpException){
                    return response()->json([
                        'message' => 'Acción no permitida. - MethodNotAllowedHttpException'
                    ], 405);
                }
            }            
        });
    }
}
