<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Responses\LoginResponse;

class LoginController extends LoginResponse
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $redirect = null;
        if (session()->has('salla_callback_url')) {
            $url = session()->pull('salla_callback_url');

            // Validate URL to prevent open redirects
            $parsedUrl = parse_url($url);
            $expectedPath = parse_url(route('salla.callback'), PHP_URL_PATH); // Use your route name

            if ($parsedUrl['path'] === $expectedPath) {
                $redirect = $url;
            }
        }
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(empty($redirect)?Fortify::redirects('login'):redirect()->to($redirect));
    }
}
