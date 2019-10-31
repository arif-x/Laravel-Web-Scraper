<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function uploadFile($name, $destination, $request = null)
    {
        try {

            $image = $request->file($name);

            $fileName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($destination, $fileName);

            return ["state" => 1, "filename" => $fileName];
        } catch (\Exception $ex) {

            return ["state" => 0, "filename" => ""];
        }
    }
}
