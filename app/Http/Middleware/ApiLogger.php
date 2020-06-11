<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ApiLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    // istek tamamlandıktan sonra çalışacak fonksiyon.
    public function terminate(Request $request, $response)
    {
        if (env('API_LOGGER', true)) {
            $startTime = LARAVEL_START;
            $endTime = microtime(true);
            $log = '[' . date('Y-m-d H:i:s') . ']';
            $log .= '[' . ($endTime - $startTime) * 100 . 'ms]';
            $log .= '[' . $request->ip() . ']';
            $log .= '[' . $request->method() . ']';
            $log .= '[' . $request->fullUrl() . ']';

            //Log::info($log);

            //Kendi log dosyamızı oluşturma

            $fileName = 'api_logger_ ' . date('Y-m-d') . '.log';
            \File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $fileName), $log . "\n");
        }
    }
}
