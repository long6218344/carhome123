<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Shanghai');
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class HomeIndexController extends Controller
{
    public function index()
    {
        // 张伟康
        $list =DB::table('bbs_carousel')->get();
        $list2 =DB::select('select * from `Advertisement` order by rand( ) limit 1;');
        $list3 =DB::select('select * from `Advertisement` order by rand( ) limit 1;');
        $list4 =DB::table('bbs_notice')->get();

        $thread = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',0)->orderBy('replies','desc')
            ->paginate(10,  ['*'],  'spage');;

        $best = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',1)->orderBy('replies','desc')
            ->paginate(2,  ['*'],  'tpage');;

        $reply = DB::table('reply')->get();
        $forum = DB::table('forum')->paginate(10,  ['*'],  'fpage');;


//        $today = Carbon::today()->toDateString();
//        $tomorrow = Carbon::tomorrow()->toDateString();
//        $tdateline = DB::table('forum')
//            ->join('thread', 'forum.fid', '=', 'thread.fid')
//            ->whereBetween('tdateline', [$today, $tomorrow])
//            ->get();
//    var_dump($question);die;

        return view('home/newcard/index',['forum'=>$forum,'thread'=>$thread,'best'=>$best,'list'=>$list,'list2'=>$list2,'list3'=>$list3,'list4'=>$list4]);

    }

    public function getinfo()
    {
        $host = "http://jisuznwd.market.alicloudapi.com";
        $path = "/iqa/query";
        $method = "GET";
        $appcode = "434cdcf95bca4ebe830053f9151ecd67";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
//        if($q == null){$q = '上海天气';}
        $querys = "question=上海天气";

        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        $data = curl_exec($curl);
        curl_close($curl);
        $jsonObj = json_decode($data);
        $question = $jsonObj->result;
        return $question;
    }

    public function post()
    {
//        $weather = $this->getinfo();
        $thread = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',0)->orderBy('tdateline','desc')
            ->paginate(10,  ['*'],  'spage');;

        $best = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',1)->orderBy('tdateline','desc')
            ->paginate(2,  ['*'],  'tpage');;

        $reply = DB::table('reply')->get();

        $forum = DB::table('forum')->paginate(10,  ['*'],  'fpage');;
        return view('home/newcard/index',['forum'=>$forum,'thread'=>$thread,'best'=>$best]);
    }
    public function reply()
    {
//        $weather = $this->getinfo();
        $thread = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',0)->orderBy('replies','desc')
            ->paginate(10,  ['*'],  'spage');;

        $best = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',1)->orderBy('replies','desc')
            ->paginate(2,  ['*'],  'tpage');;

        $reply = DB::table('reply')->get();

        $forum = DB::table('forum')->paginate(10,  ['*'],  'fpage');;
        return view('home/newcard/index',['forum'=>$forum,'thread'=>$thread,'best'=>$best]);
    }
    public function hot()
    {
//        $weather = $this->getinfo();
        $thread = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',0)->orderBy('clicknumber','desc')
            ->paginate(10,  ['*'],  'spage');;

        $best = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',1)->orderBy('clicknumber','desc')
            ->paginate(2,  ['*'],  'tpage');;

        $reply = DB::table('reply')->get();

        $forum = DB::table('forum')->paginate(10,  ['*'],  'fpage');;
        return view('home/newcard/index',['forum'=>$forum,'thread'=>$thread,'best'=>$best]);
    }
    public function best()
    {
//        $weather = $this->getinfo();
        $thread = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('best',1)->orderBy('replies','desc')
            ->paginate(10,  ['*'],  'spage');;

        $best = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',1)->orderBy('replies','desc')
            ->paginate(2,  ['*'],  'tpage');;

        $reply = DB::table('reply')->get();

        $forum = DB::table('forum')->paginate(10,  ['*'],  'fpage');;
        return view('home/newcard/index',['forum'=>$forum,'thread'=>$thread,'best'=>$best]);

    }


}
