<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReplyController extends Controller
{
    public function index()
    {
        $result = DB::table('reply')->get();
        return view('/admin/posts/reply',['result'=>$result]);
    }



}
