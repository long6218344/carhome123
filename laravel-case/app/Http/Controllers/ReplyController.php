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



    public function delete(Request $request)
    {
        $rid = $request->rid;
        $renumber = DB::table('thread')->value('renumber');
        $renumber = ($renumber - 1);

        DB::transaction(function() use ($rid, $renumber)
        {
            try {
        DB::table('reply')->where('rid',$rid)->delete() ;
        DB::table('thread')->update(['renumber'=>$renumber]);
                 } catch (\Exception $e) {
                var_dump('删除失败');
                exit;
            }
        });
        echo '删除成功';
    }
}
