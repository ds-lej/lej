<?php

namespace Lej\Support\Traits;

trait AddExceptsForMiddleware
{
    /**
     * Add except
     *
     * @param string $except
     * @return $this
     */
    public function addExcept($except)
    {
        if (array_search($except, $this->except) === false)
            $this->except[] = $except;

        return $this;
    }
}