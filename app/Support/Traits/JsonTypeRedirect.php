<?php

namespace Lej\Support\Traits;

trait JsonTypeRedirect
{
    /**
     * Return result redirect url
     *
     * @param string $to - redirect URL
     * @return \Illuminate\Http\JsonResponse
     */
    public function resultRedirect(string $to = '/')
    {
        return response()->json(['success' => true, 'redirect' => $to], 200, ['RedirectTo' => $to]);
    }
}