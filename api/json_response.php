<?php

class JSONResponse
{

    function success($res)
    {

        $data = [
            "status" => [
                "code" => 200,
                "Success"
            ],
            "res" => $res,
        ];

        return json_encode($data);
    }

    function failed($res)
    {

        $data = [
            "status" => [
                "code" => 500,
                "Failed"
            ],
            "res" => $res,
        ];

        return json_encode($data);
    }
}
