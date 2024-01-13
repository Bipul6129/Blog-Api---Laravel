<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;

class BlogException extends Exception
{
    public static function blogNotFound(){
        return new self("blog not found",404);
    }

}
