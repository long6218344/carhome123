@extends('admin.public.layout')

@section('main-content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">管理组管理</a>
                </li>


                <li class="active">添加管理组</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form action="/admin/authgroup/update" method="post">
                        <input type="hidden" name="id" value="{{$auth_group->id}}" />
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">              {{csrf_field()}}
                            <thead>

                            <tr>
                                <th class="center" style="width:100px;">
                                    <label>
                                        <input type="checkbox" class="ace" id="ischeck" />
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th style="width:200px;"> 管理组名称 </th>

                                <th><input type="text" id="form-field-2" name="title" class="col-xs-10 col-sm-5" value="{{$auth_group->title}}" /></th>
                            </tr>
                            </thead>
                            <tbody>
                            <input type="hidden" value="{{$i=0}}">

                            {{--<foreach name="data" item="rules">--}}
                            @foreach($rule as $v)

                                <input type="hidden" value="{{$i++}}">

                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace checkall{{$key[$i]}}"  />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td class="hidden-480" colspan="2">
                                        {{--<foreach name="rules" item="rule">--}}
                                        @foreach($v as $c)
                                            @foreach($c as $d)
                                            <label><input type="checkbox" class="ace check{{$d->sort}}" name="rules[]" value="{{$d->id}}"><span class="lbl"> {{$d->title}}　　</span></label>
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tr>
                                <td colspan="3">
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">


                                            <button class="btn btn-info" type="submit">
                                                <i class="icon-ok bigger-110"></i>
                                                修改
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="icon-undo bigger-110"></i>
                                                重置
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    @if(!empty(session('error')))
        <script>
            alert('{{session('error')}}');
        </script>
    @endif
@endsection
@section('js')
    <script type="text/javascript">

        /*--------------1---------------*/
        var checkall1 = document.getElementsByClassName("checkall1");
        var check1 = document.getElementsByClassName("check1");
        var len1 = check1.length;

        checkall1[0].onclick = function(){
            for(var i=0;i<len1;i++){
                check1[i].checked = checkall1[0].checked;
            }
        }

        /*--------------2---------------*/
        var checkall2 = document.getElementsByClassName("checkall2");
        var check2 = document.getElementsByClassName("check2");
        var len2 = check2.length;

        checkall2[0].onclick = function(){
            for(var i =0; i < len2; i++){

                check2[i].checked = checkall2[0].checked;
            }
        }

        /*--------------3---------------*/
        var checkall3 = document.getElementsByClassName("checkall3");
        var check3 = document.getElementsByClassName("check3");
        var len3 = check3.length;
        checkall3[0].onclick = function(){
            for(var i =0; i < len3; i++){
                check3[i].checked = checkall3[0].checked;
            }
        }

        /*--------------4---------------*/
        var checkall4 = document.getElementsByClassName("checkall4");
        var check4 = document.getElementsByClassName("check4");
        var len4 = check4.length;
        checkall4[0].onclick = function(){
            for(var i =0; i < len4; i++){
                check4[i].checked = checkall4[0].checked;
            }
        }

        /*--------------5---------------*/
        var checkall5 = document.getElementsByClassName("checkall5");
        var check5 = document.getElementsByClassName("check5");
        var len5 = check5.length;
        checkall5[0].onclick = function(){
            for(var i =0; i < len5; i++){
                check5[i].checked = checkall5[0].checked;
            }
        }

        /*--------------6---------------*/
        var checkall6 = document.getElementsByClassName("checkall6");
        var check6 = document.getElementsByClassName("check6");
        var len6 = check6.length;
        checkall6[0].onclick = function(){
            for(var i =0; i < len6; i++){
                check6[i].checked = checkall6[0].checked;
            }
        }

        /*--------------7---------------*/
        var checkall7 = document.getElementsByClassName("checkall7");
        var check7 = document.getElementsByClassName("check7");
        var len7 = check7.length;
        checkall7[0].onclick = function(){
            for(var i =0; i < len7; i++){
                check7[i].checked = checkall7[0].checked;
            }
        }

        /*--------------8---------------*/
        var checkall8 = document.getElementsByClassName("checkall8");
        var check8 = document.getElementsByClassName("check8");
        var len8 = check8.length;
        checkall8[0].onclick = function(){
            for(var i =0; i < len8; i++){
                check8[i].checked = checkall8[0].checked;
            }
        }

        /*--------------9---------------*/
        var checkall9 = document.getElementsByClassName("checkall9");
        var check9 = document.getElementsByClassName("check9");
        var len9 = check9.length;
        checkall9[0].onclick = function(){
            for(var i =0; i < len9; i++){
                check9[i].checked = checkall9[0].checked;
            }
        }

        /*--------------10---------------*/
        var checkall10 = document.getElementsByClassName("checkall10");
        var check10 = document.getElementsByClassName("check10");
        var len10 = check10.length;
        checkall10[0].onclick = function(){
            for(var i =0; i < len10; i++){
                check10[i].checked = checkall10[0].checked;
            }
        }

        /*--------------11---------------*/
        var checkall11 = document.getElementsByClassName("checkall11");
        var check11 = document.getElementsByClassName("check11");
        var len11 = check11.length;
        checkall11[0].onclick = function(){
            for(var i =0; i < len11; i++){
                check11[i].checked = checkall11[0].checked;
            }
        }

        /*--------------12---------------*/
        var checkall12 = document.getElementsByClassName("checkall12");
        var check12 = document.getElementsByClassName("check12");
        var len12 = check12.length;
        checkall12[0].onclick = function(){
            for(var i =0; i < len12; i++){
                check12[i].checked = checkall12[0].checked;
            }
        }

        /*--------------13---------------*/
        var checkall13 = document.getElementsByClassName("checkall13");
        var check13 = document.getElementsByClassName("check13");
        var len13 = check13.length;
        checkall13[0].onclick = function(){
            for(var i =0; i < len13; i++){
                check13[i].checked = checkall13[0].checked;
            }
        }

        /*--------------14---------------*/
        var checkall14 = document.getElementsByClassName("checkall14");
        var check14 = document.getElementsByClassName("check14");
        var len14 = check14.length;
        checkall14[0].onclick = function(){
            for(var i =0; i < len14; i++){
                check14[i].checked = checkall14[0].checked;
            }
        }

        /*--------------15---------------*/
        var checkall15 = document.getElementsByClassName("checkall15");
        var check15 = document.getElementsByClassName("check15");
        var len15 = check15.length;
        checkall15[0].onclick = function(){
            for(var i =0; i < len15; i++){
                check15[i].checked = checkall15[0].checked;
            }
        }

        /*--------------16---------------*/
        var checkall16 = document.getElementsByClassName("checkall16");
        var check16 = document.getElementsByClassName("check16");
        var len16 = check16.length;
        checkall16[0].onclick = function(){
            for(var i =0; i < len16; i++){
                check16[i].checked = checkall16[0].checked;
            }
        }

        /*--------------17---------------*/
        var checkall17 = document.getElementsByClassName("checkall17");
        var check17 = document.getElementsByClassName("check17");
        var len17 = check17.length;
        checkall17[0].onclick = function(){
            for(var i =0; i < len17; i++){
                check17[i].checked = checkall17[0].checked;
            }
        }

        /*--------------18---------------*/
        var checkall18 = document.getElementsByClassName("checkall18");
        var check18 = document.getElementsByClassName("check18");
        var len18 = check18.length;
        checkall18[0].onclick = function(){
            for(var i =0; i < len18; i++){
                check18[i].checked = checkall18[0].checked;
            }
        }

        /*--------------19---------------*/
        var checkall19 = document.getElementsByClassName("checkall19");
        var check19 = document.getElementsByClassName("check19");
        var len19 = check19.length;
        checkall19[0].onclick = function(){
            for(var i =0; i < len19; i++){
                check19[i].checked = checkall19[0].checked;
            }
        }

        /*--------------20---------------*/
        var checkall20 = document.getElementsByClassName("checkall20");
        var check20 = document.getElementsByClassName("check20");
        var len20 = check20.length;
        checkall20[0].onclick = function(){
            for(var i =0; i < len20; i++){
                check20[i].checked = checkall20[0].checked;
            }
        }

        /*--------------21---------------*/
        var checkall21 = document.getElementsByClassName("checkall21");
        var check21 = document.getElementsByClassName("check21");
        var len21 = check21.length;
        checkall21[0].onclick = function(){
            for(var i =0; i < len21; i++){
                check21[i].checked = checkall21[0].checked;
            }
        }

    </script>
@endsection
