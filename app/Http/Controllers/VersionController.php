<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version;

class VersionController extends Controller
{
    public function version() {
        $ver = Version::find(1);
        $str = 'version';
        dump($ver->id);
        dump($ver->version);
        dump($ver->theme);
        dump($ver->desc);
        dump($ver->status);
        dump($ver->created_at);
        dump($ver->updated_at);
    }
}
