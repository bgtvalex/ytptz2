<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function testPage() {
        $test = Test::find(1);
        $str = 'test';
        dump($test->id);
        dump($test->title);
        dump($test->desc);
        dump($test->comments);
        dump($test->created_at);
        dump($test->updated_at);
    }
}
