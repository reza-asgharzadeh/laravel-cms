<?php
namespace App\Http;
use App\Models\Ticket;

class RandomUniqueCode
{
    public static $str;
    public static $n;

    public static function randomString($n)
    {
        //Generate Random Code with $characters
        $characters = '0123456789';
        $str = '';
        for($i=0; $i<$n; $i++){
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }
        self::$n = $n;
        self::$str = $str;
        //Return to checkUniqueCode() Method
        return self::checkUniqueCode();
    }

    public static function checkUniqueCode()
    {
        //check unique code
        $record = Ticket::where('code',self::$str)->first();

        //if Generated Code Equal Database Code, Return to Generate Code randomString($n)
        if ($record){
            return self::randomString(self::$n);
        } else {
            return self::$str;
        }
    }
}
