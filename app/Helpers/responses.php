<?php
/*
 * Helper functions for API response as JSON
 */

//response generator
function helper_response_main($message=null,$result=null,$error=null,$status=200): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'result' => $result,
        'message' => $message,
        'error' => $error,
    ],$status);
}


//Custom error message
function helper_response_error($message): \Illuminate\Http\JsonResponse
{
    return helper_response_main(null,null,$message,409);
}

//Custom success message
function helper_response_success($message): \Illuminate\Http\JsonResponse
{
    return helper_response_main(null,null,$message);
}


//simple response for fetch data
function helper_response_fetch($result=[]): \Illuminate\Http\JsonResponse
{
    return helper_response_main('fetch success !',$result);
}

//success create data response
function helper_response_created($result): \Illuminate\Http\JsonResponse
{
    return helper_response_main('item created success !',$result,'',201);
}

//success updated data response
function helper_response_updated($result): \Illuminate\Http\JsonResponse
{
    return helper_response_main('item updated success !',$result,'',202);
}

//success deleted data response
function helper_response_deleted(): \Illuminate\Http\JsonResponse
{
    return helper_response_main('item deleted success !');
}

