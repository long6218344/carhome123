<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
        // 显示写私信页面
       public function index($jd, $id = '')
       {

    		// dump(session('username'));die;
       		
   		    $user = DB::table('bbs_user_info')->where('username', $_SESSION['username'])->first();

            if($jd == 2){

               	$list = DB::table('bbs_message')->where('reuid', '=', $id )->orWhere('seuid', '=', $id )->simplePaginate(10);
//               	dump($list);
           

               	return view('user/message',['jd' => $jd, 'list' => $list,'name'=>$user->username,'icon'=>$user->icon,'sex'=>$user->sex,'id'=>$_SESSION['uid'],] );
            }
            elseif ($jd == 1)
            {
            	if($id){

	            	$info = DB::table('bbs_user_info')->where('uid', $id)->first();
	                return view('user/message', ['jd' => $jd,'name'=>$user->username,'icon'=>$user->icon,'sex'=>$user->sex,'toname'=>$info->username,] );
            	}else{
            		return view('user/message', ['jd' => $jd,'name'=>$user->username,'icon'=>$user->icon,'sex'=>$user->sex,'toname'=>'',] );
            	}
            }

       }


       /***
        * 接收内容并保存到数据库
        */
       public function write(Request $a)
       {
			$seid     = $a->id;
			$username = "'$a->user'";
			$details  = "'$a->details'";
			$head     = "'$a->head'";
			$time     = date('Y-m-d H:m');
			$time     = "'$time'";
			$sql      = 'select * from `bbs_user_info` where username='.$username;
			$result   = DB::select($sql);
			
			if (!$result){
				return redirect('/user/notice')->withInput()->with(['message'=>'你输入的用户名并不存在','url' =>'/home/message-write/1', 'jumpTime'=>2,'status'=>false]);
				// $this->notice('都和你讲了这个用户名不存在 你这人真的是');
			}
       		$this->validate($a, [
       		    'user' => 'required',
       		    'head' => 'required',
       		    'details' => 'required',
       		]);
			
			foreach($result as $v){
				$reid     = $v->uid;
			}
			$reid   = "'$reid'";
			
			
			$sql  = 'insert into `bbs_message` (`head`, `details`, `reuid`, `seuid`,`time`, `seperson`,`reperson`) value ('.$head.','.$details.','.$reid.','.$seid.','.$time.',"'.$_SESSION['username'].'",'.$username.')';
			
			$add = DB::insert($sql);
			
			if ($add)
			{
			// $this->notice('发送成功');

				return redirect('/user/notice')->with(['message'=>'发送成功','url' =>'/home/message-write/2/'.$_SESSION['uid'], 'jumpTime'=>2,'status'=>true]);
			}

       }


       /***
        * 检测用户名是否存在
        */
       public function detection($data)
       {
           $data = "'$data'";
           $sql = 'select * from `bbs_user_info` where username='.$data;

           $result = DB::select($sql);

           if(!$result){echo 1;}

       }


       /***
        * @param $id
        * 查看私信详情
        */
       public function read($id)
       {
           $sql = 'select `details` from `bbs_message` where id='.$id;
           $result = DB::select($sql);

          foreach($result as $v)
          {
              $detail = $v->details;

          }

          echo $detail;
       }


       public function delete($id)
       {

           $sql = 'delete from `bbs_message` where id='.$id;
           $result = DB::delete($sql);

           if ($result)
           {
               echo 1;
           }


       }

    public function notice($msg, $url = '' ,$time = 1)
    {

        echo '<body style="margin:0">';
        echo '<div style="width: 100%;height: 100%;position: fixed;">

       <h1 style="font-size: 200px;position: fixed;left: 200px;top:50px;">ovo </h1>
       <div>
        <p style="font-size: 35px;position: fixed;left: 200px;top:400px;
        color: red;">['.$msg.']</p>
        <p style="font-size: 20px;position: fixed;left: 300px;top:500px;">
        
        大概还需'.$time.'秒加载完成 
        
        </p>
        
     </div>
     </div>';


        // 如果没有传入url, 默认返回到上一页面
        if( $url  == ''	){
            $url = $_SERVER['HTTP_REFERER'];
        }

        echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'">';
        die;

    }
    
}