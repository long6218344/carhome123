<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{

	public function mark($t){
		
		$info = DB::table('bbs_mark')->select('days')->where('uid',$_SESSION['uid'])->get();
		// dd(time());
		if(count($info) == 0){
			$r = DB::table('bbs_mark')->insert(['uid' => $_SESSION['uid'], 'days' => 1,'time'=>time()]);
			// dd($r);
			return 1;
		}
		$time = DB::table('bbs_mark')->select('time')->where('uid',$_SESSION['uid'])->first();
		$now = $t - $time->time;
		// dd($now/3600);
		if ( ($now/3600) < 24){
        	$day = DB::table('bbs_mark')->where('uid', $_SESSION['uid'])->increment('days');
        	$time = DB::update('update `bbs_mark` set `time` = ? where `uid` = '.$_SESSION['uid'],[$t]);
			$d1 = DB::table('bbs_mark')->select('days')->where('uid',$_SESSION['uid'])->first();

			return $d1->days;
		}

		return false;

	}
}
