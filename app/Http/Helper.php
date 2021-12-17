<?php

namespace App\Http;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class Helper extends Controller
{
    public static  function generateUniqueNumber()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Ticket::where("code", "=", $code)->first());

        return $code;
    }
}
