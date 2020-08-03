<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Session;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    protected function addCookieToResponse($request, $response)
    {
        $request->session()->regenerateToken();
        $new_token = Session::token();
        echo '<meta name="csrf-token" content="'.$new_token.'">';
        // dump(Session::token(),$request->session()->token());
        return parent::addCookieToResponse($request, $response);
    }
    // protected function tokensMatch($request)
    // {
    //     $token = $this->getTokenFromRequest($request);
    //     dump($token,$request->session()->token());
    //     return parent::tokensMatch($request);

    // }
}
