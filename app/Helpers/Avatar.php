<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Avatar
{

    public static function getAvatar($avatar, $name)
    {
        if ($avatar) {
            return Storage::url($avatar);
        } else {
            return "https://ui-avatars.com/api/?name=$name&color=fff&background=5f27cd&bold=true";
        }
    }
}
