<?php

namespace App\Http\Models;
use  Illuminate\Http\JsonResponse;
class JsonApi {
  public static function success(string $message, $data):JsonResponse{
    return response()->json([
        "status"=>'success',
        "message"=>$message,
        "data"=>$data
    ], 200);
  }

  public static function error(string $message):JsonResponse{
    return response()->json([
        "status"=>'error',
        "message"=>$message,
        "data"=>null
    ], 200);
  }

  public static function show(string $status, string $message,  $data):JsonResponse{
    return response()->json([
        "status"=>$status,
        "message"=>$message,
        "data"=>$data
    ], 200);
  }
}
