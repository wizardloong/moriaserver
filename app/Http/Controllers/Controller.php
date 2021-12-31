<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    public function __construct()
    {
        $this->defaultMiddleware();
    }

    protected function defaultMiddleware()
    {
        $this->middleware(function ($request, $next) {
            $this->user = UserService::getCurrent();

            View::share('current', $this->user);

            return $next($request);
        });
    }
}
