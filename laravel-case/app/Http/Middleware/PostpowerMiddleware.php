<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Session;

class PostpowerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $fid = $request->route('fid');
        if (empty($_SESSION['uid'])) {
            return redirect(url('/user/notice'))->with(['message' => '请登录', 'url' => url('/home/login'), 'jumpTime' => 3, 'status' => false]);
        }
        $uid = $_SESSION['uid'];

        // 判断用户uid权限

        // 从数据库获取权限
        $result = DB::table('bbs_user_info')
            ->join('bbs_user_group', 'bbs_user_group.gid', '=', 'bbs_user_info.grouppower')
            ->where([
                ['bbs_user_info.uid', '=', $uid]
            ])
            ->select()
            ->first();

        // 如果用户为会员,判断他的等级,不同等级对应不同权限
        if ($result->grouppower == 1) {

            if ($result->credits >= 100 && $result->credits < 200) {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 6]
                    ])
                    ->select()
                    ->first();
                $postnum = $result->post_max_num;
                $postpower = $result->allow_post;
                // 判断一天发帖数量
                // 选出所有发出的帖子,选出最新的n个
                $list = DB::table('thread')
                    ->where([
                        ['tauthorid', $uid],
                        ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                    ])
                    ->orderBy('tid', 'desc')
                    ->get();
                $i = 0;
                if (count($list)) {
                    foreach ($list as $v) {
                        $i++;
                        if ($i <= $postnum) {
                            $datelist[] = $v->tdateline;
                        }
                    }
                    $fid = trim($fid,'.');
                    // 如果数量超过规定数量
                    if(count($datelist) >= $postnum){
                        return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                    };
                }

                // 判断有没有发帖权限
                if ($postpower == 1) {
                    return $next($request);
                } else {
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }

            } elseif ($result->credits >= 200 && $result->credits < 500) {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 7]
                    ])
                    ->select()
                    ->first();
                $postpower = $result->allow_post;

                // 判断有没有发帖权限
                if ($postpower == 1) {
                    return $next($request);
                } else {
//                  dd(1);
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }

            } elseif ($result->credits >= 500 && $result->credits < 1000) {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 8]
                    ])
                    ->select()
                    ->first();
                $postnum = $result->post_max_num;
                $postpower = $result->allow_post;
                // 判断一天发帖数量
                // 选出所有发出的帖子,选出最新的n个
                $list = DB::table('thread')
                    ->where([
                        ['tauthorid', $uid],
                        ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                    ])
                    ->orderBy('tid', 'desc')
                    ->get();
                $i = 0;
                if (count($list)) {
                    foreach ($list as $v) {
                        $i++;
                        if ($i <= $postnum) {
                            $datelist[] = $v->tdateline;
                        }
                    }
                    $fid = trim($fid,'.');
                    // 如果数量超过规定数量
                    if(count($datelist) >= $postnum){
                        return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                    };
                }

                // 判断有没有发帖权限
                if ($postpower == 1) {
                    return $next($request);
                } else {
//                  dd(1);
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }

            } elseif ($result->credits >= 1000 && $result->credits < 5000) {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 9]
                    ])
                    ->select()
                    ->first();
                $postnum = $result->post_max_num;
                $postpower = $result->allow_post;
                // 判断一天发帖数量
                // 选出所有发出的帖子,选出最新的n个
                $list = DB::table('thread')
                    ->where([
                        ['tauthorid', $uid],
                        ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                    ])
                    ->orderBy('tid', 'desc')
                    ->get();
                $i = 0;
                if (count($list)) {
                    foreach ($list as $v) {
                        $i++;
                        if ($i <= $postnum) {
                            $datelist[] = $v->tdateline;
                        }
                    }
                    $fid = trim($fid,'.');
                    // 如果数量超过规定数量
                    if(count($datelist) >= $postnum){
                        return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                    };
                }
                // 判断有没有发帖权限
                if ($postpower == 1) {
                    return $next($request);
                } else {
//                  dd(1);
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }

            } elseif ($result->credits >= 5000 && $result->credits < 10000) {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 10]
                    ])
                    ->select()
                    ->first();
                $postnum = $result->post_max_num;
                $postpower = $result->allow_post;
                // 判断一天发帖数量
                // 选出所有发出的帖子,选出最新的n个
                $list = DB::table('thread')
                    ->where([
                        ['tauthorid', $uid],
                        ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                    ])
                    ->orderBy('tid', 'desc')
                    ->get();
                $i = 0;
                if (count($list)) {
                    foreach ($list as $v) {
                        $i++;
                        if ($i <= $postnum) {
                            $datelist[] = $v->tdateline;
                        }
                    }
                    $fid = trim($fid,'.');
                    // 如果数量超过规定数量
                    if(count($datelist) >= $postnum){
                        return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                    };
                }

                // 判断有没有发帖权限
                if ($postpower == 1) {
                    return $next($request);
                } else {
//                  dd(1);
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }

            } elseif ($result->credits >= 10000 && $result->credits < 50000) {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 11]
                    ])
                    ->select()
                    ->first();
                $postnum = $result->post_max_num;
                $postpower = $result->allow_post;
    // 判断一天发帖数量
                // 选出所有发出的帖子,选出最新的n个
                $list = DB::table('thread')
                    ->where([
                        ['tauthorid', $uid],
                        ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                    ])
                    ->orderBy('tid', 'desc')
                    ->get();
                $i = 0;
                if (count($list)) {
                    foreach ($list as $v) {
                        $i++;
                        if ($i <= $postnum) {
                            $datelist[] = $v->tdateline;
                        }
                    }
                    $fid = trim($fid,'.');
                // 如果数量超过规定数量
                    if(count($datelist) >= $postnum){
                        return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                    };
                }

         // ---------------判断有没有发帖权限-------------
                if ($postpower == 1) {
                    return $next($request);
                } else {
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }
            } elseif ($result->credits >= 0 && $result->credits < 100) {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 1]
                    ])
                    ->select()
                    ->first();
                $postnum = $result->post_max_num;
                $postpower = $result->allow_post;
                // 判断一天发帖数量
                // 选出所有发出的帖子,选出最新的n个
                $list = DB::table('thread')
                    ->where([
                        ['tauthorid', $uid],
                        ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                    ])
                    ->orderBy('tid', 'desc')
                    ->get();
                $i = 0;
                if (count($list)) {
                    foreach ($list as $v) {
                        $i++;
                        if ($i <= $postnum) {
                            $datelist[] = $v->tdateline;
                        }
                    }
                    $fid = trim($fid,'.');
                    // 如果数量超过规定数量
                    if(count($datelist) >= $postnum){
                        return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                    };
                }

                // 判断有没有发帖权限
                if ($postpower == 1) {
                    return $next($request);
                } else {
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }
//                dd($result);
            } else {
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid', '=', 12]
                    ])
                    ->select()
                    ->first();
                $postnum = $result->post_max_num;
                $postpower = $result->allow_post;
                // 判断一天发帖数量
                // 选出所有发出的帖子,选出最新的n个
                $list = DB::table('thread')
                    ->where([
                        ['tauthorid', $uid],
                        ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                    ])
                    ->orderBy('tid', 'desc')
                    ->get();
                $i = 0;
                if (count($list)) {
                    foreach ($list as $v) {
                        $i++;
                        if ($i <= $postnum) {
                            $datelist[] = $v->tdateline;
                        }
                    }
                    $fid = trim($fid,'.');
                    // 如果数量超过规定数量
                    if(count($datelist) >= $postnum){
                        return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                    };
                }

                // 判断有没有发帖权限
                if ($postpower == 1) {
                    return $next($request);
                } else {
                    return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
                }
            }
        }
// ------------------ 如果不是会员组--------------------
        // 如果是游客组
        if ($result->grouppower == 2) {
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid', '=', 2]
                ])
                ->select()
                ->first();
            $postnum = $result->post_max_num;
            $postpower = $result->allow_post;
            // 判断一天发帖数量
            // 选出所有发出的帖子,选出最新的n个
            $list = DB::table('thread')
                ->where([
                    ['tauthorid', $uid],
                    ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                ])
                ->orderBy('tid', 'desc')
                ->get();
            $i = 0;
            if (count($list)) {
                foreach ($list as $v) {
                    $i++;
                    if ($i <= $postnum) {
                        $datelist[] = $v->tdateline;
                    }
                }
                $fid = trim($fid,'.');
                // 如果数量超过规定数量
                if(count($datelist) >= $postnum){
                    return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                };
            }

            // 判断有没有发帖权限
            if ($postpower == 1) {
                return $next($request);
            } else {
                return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
            }
        }
        // 如果是管理员
        if ($result->grouppower == 3) {
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid', '=', 3]
                ])
                ->select()
                ->first();
            $postnum = $result->post_max_num;
            $postpower = $result->allow_post;
            // 判断一天发帖数量
            // 选出所有发出的帖子,选出最新的n个
            $list = DB::table('thread')
                ->where([
                    ['tauthorid', $uid],
                    ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                ])
                ->orderBy('tid', 'desc')
                ->get();
            $i = 0;
            if (count($list)) {
                foreach ($list as $v) {
                    $i++;
                    if ($i <= $postnum) {
                        $datelist[] = $v->tdateline;
                    }
                }
                $fid = trim($fid,'.');
                // 如果数量超过规定数量
                if(count($datelist) >= $postnum){
                    return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                };
            }

            // 判断有没有发帖权限
            if ($postpower == 1) {
                return $next($request);
            } else {
                return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
            }
        }
        // 如果是版主
        if ($result->grouppower == 4) {
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid', '=', 4]
                ])
                ->select()
                ->first();
            $postnum = $result->post_max_num;
            $postpower = $result->allow_post;
            // 判断一天发帖数量
            // 选出所有发出的帖子,选出最新的n个
            $list = DB::table('thread')
                ->where([
                    ['tauthorid', $uid],
                    ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                ])
                ->orderBy('tid', 'desc')
                ->get();
            $i = 0;
            if (count($list)) {
                foreach ($list as $v) {
                    $i++;
                    if ($i <= $postnum) {
                        $datelist[] = $v->tdateline;
                    }
                }
                $fid = trim($fid,'.');
                // 如果数量超过规定数量
                if(count($datelist) >= $postnum){
                    return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                };
            }

            // 判断有没有发帖权限
            if ($postpower == 1) {
                return $next($request);
            } else {
                return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
            }
        }
        // 如果是禁言
        if ($result->grouppower == 5) {
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid', '=', 5]
                ])
                ->select()
                ->first();
            $postnum = $result->post_max_num;
            $postpower = $result->allow_post;
            // 判断一天发帖数量
            // 选出所有发出的帖子,选出最新的n个
            $list = DB::table('thread')
                ->where([
                    ['tauthorid', $uid],
                    ['tdateline','>', date('Y-m-d H:i:s',time()-86400)]
                ])
                ->orderBy('tid', 'desc')
                ->get();
            $i = 0;
            if (count($list)) {
                foreach ($list as $v) {
                    $i++;
                    if ($i <= $postnum) {
                        $datelist[] = $v->tdateline;
                    }
                }
                $fid = trim($fid,'.');
                // 如果数量超过规定数量
                if(count($datelist) >= $postnum){
                    return redirect('/user/notice')->with(['message' => '发帖量超过'.$postnum, 'url' => '/home/blog/'.$fid, 'jumpTime' => 3, 'status' => false]);
                };
            }

            // 判断有没有发帖权限
            if ($postpower == 1) {
                return $next($request);
            } else {
                return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
            }
        }


        return $next($request);//通过了检测,进行下一步操作
    }
}
