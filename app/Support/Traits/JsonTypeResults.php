<?php

namespace Lej\Support\Traits;

trait JsonTypeResults
{
    /**
     * Return success result data
     *
     * @param string $msg   - result message
     * @param array  $data  - result data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resultSuccess(string $msg = '', array $data = [])
    {
        return $this->result([
            'message' => $msg,
            'data'    => $data
        ], true);
    }

    /**
     * Return error result data
     *
     * @param string $msg        - error message
     * @param array  $errorsMsg  - errors message list
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resultError(string $msg = '', array $errorsMsg = [])
    {
        return $this->result([
            'message' => $msg,
            'errors'  => $errorsMsg
        ], false);
    }

    /**
     * Return result data
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function resultData(array $data = [])
    {
        return $this->result(['data' => $data], true);
    }

    /**
     * Return result data
     *
     * @param array  $resultData - result data
     * @param bool   $success    - status
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function result(array $resultData = [], bool $success = true)
    {
        return response()->json(array_merge(['success' => $success], $resultData));
    }
}