<?php

namespace App\Exceptions;

use App\Domain\Wallet\WalletCreationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->renderable(
            function (UnauthorizedException $e) {
                return response()->json('Unauthorized', 401);
            }
        );

        $this->renderable(function (NotFoundHttpException $e) {
            return response()->json('Not found', 404);
        });

        $this->renderable(function (WalletCreationException $e) {
            return response()->json("Can't create wallet", 500);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
