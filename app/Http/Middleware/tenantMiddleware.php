<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class tenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = $this->getSubdomain($request->getHost());
        if($subdomain == 'localhost')  return $next($request);

        $user = User::where('subdomain', $subdomain)->first();

        if(is_null($user)) return response()->json(['message'=>'user does not exist', 'status'=>false], 404);

        config(['tenant.subdomain'=>$subdomain]);

        return $next($request);
    }

    private function getSubdomain($host){
            return $subdomain = explode('.', $host)[0];
    }
}
