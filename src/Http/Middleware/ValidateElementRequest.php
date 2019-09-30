<?php

namespace Click\Elemental\Http\Middleware;

use Click\Elemental\Http\Requests\Api\ElementRequest;
use Closure;

class ValidateElementRequest
{
    public function handle(ElementRequest $request, Closure $next, $guard = null)
    {
        // TODO: Check for property searches, ordering, filtering, grouping, etc and validate it

        return $next($request);
    }
}