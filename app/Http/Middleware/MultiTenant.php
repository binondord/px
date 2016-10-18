<?php

namespace App\Http\Middleware;

use Closure;

class MultiTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $env = env('APP_ENV');
        $site = $this->getMainSite($request->getUri());
        $except = ['elasticbeanstalk.com'];
        $session = config('session');
        if (in_array($site, $except))
            $session['domain'] = \Request::getHost();
        else
            $session['domain'] = '.'.$site;

        config([
            'site' => $site,
            'config' => config(env('LARAVEL_ENV').'.config'),
            'global' => config($env.'.'.'global'),
            'host' => $request->getHttpHost(),
            'session' => $session, //this will override domain in session.php config
            'jobsfeeds' => config($env.'.feeds')
        ]);
        return $next($request);
    }

    protected function getMainSite($url)
    {
        $host = @parse_url($url, PHP_URL_HOST);

        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $host, $regs)) {
            return $regs['domain'];
        }

        if (!$host)
            $host = $url;

        return $host;
    }
}
