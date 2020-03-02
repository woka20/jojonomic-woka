<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
            if ($request->has('api_token')) {
                $token = $request->input('api_token');
                $check_token = User::where('api_token', $token)->first();
                
                if ($check_token['email'] != "woka@alterra.id") {
                    $res['success'] = false;
                    $res['message'] = 'Permission not allowed!';

                    return response($res);
                }else{
                    return $next($request);
                }
            }else{
                $res['success'] = false;
                $res['message'] = 'Login please!';

                return response($res);
            }
        
        return response('Unauthorized.', 401);
    
    }
}
