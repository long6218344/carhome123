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
                    <a href="#">后台管理</a>
                </li>

                <li>
                    <a href="#">积分规则管理</a>
                </li>
                <li class="active">添加规则</li>
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
            <div class="page-header">
                <h1>
                    规则管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        添加规则
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal"  action="/admin/point/add" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  显示顺序:</label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name='typeid'/>--}}
                            {{--</div>--}}
                        {{--</div>--}}





                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 名称: </label>

                            <div class="col-sm-9">

                                <input name="name" type="text" class="col-xs-10 col-sm-5" placeholder="名称"/>
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 数值: </label>

                            <div class="col-sm-9">

                                <input name="value" type="text" class="col-xs-10 col-sm-5" placeholder="数值"/>
                            </div>
                        </div>
                        <div class="space-4"></div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" >
                                    <i class="icon-ok bigger-110"></i>
                                    Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
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
        jQuery(function($){

            function showErrorAlert (reason, detail) {
                var msg='';
                if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
                else {
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
                    '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
            }

            //$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

            //but we want to change a few buttons colors for the third style
            $('#editor1').ace_wysiwyg({
                toolbar:
                    [
                        'font',
                        null,
                        'fontSize',
                        null,
                        {name:'bold', className:'btn-info'},
                        {name:'italic', className:'btn-info'},
                        {name:'strikethrough', className:'btn-info'},
                        {name:'underline', className:'btn-info'},
                        null,
                        {name:'insertunorderedlist', className:'btn-success'},
                        {name:'insertorderedlist', className:'btn-success'},
                        {name:'outdent', className:'btn-purple'},
                        {name:'indent', className:'btn-purple'},
                        null,
                        {name:'justifyleft', className:'btn-primary'},
                        {name:'justifycenter', className:'btn-primary'},
                        {name:'justifyright', className:'btn-primary'},
                        {name:'justifyfull', className:'btn-inverse'},
                        null,
                        {name:'createLink', className:'btn-pink'},
                        {name:'unlink', className:'btn-pink'},
                        null,
                        {name:'insertImage', className:'btn-success'},
                        null,
                        'foreColor',
                        null,
                        {name:'undo', className:'btn-grey'},
                        {name:'redo', className:'btn-grey'}
                    ],
                'wysiwyg': {
                    fileUploadError: showErrorAlert
                }
            }).prev().addClass('wysiwyg-style2');

            $('[data-toggle="buttons"] .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                var toolbar = $('#editor1').prev().get(0);
                if(which == 1 || which == 2 || which == 3) {
                    toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
                    if(which == 1) $(toolbar).addClass('wysiwyg-style1');
                    else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
                }
            });

            //Add Image Resize Functionality to Chrome and Safari
            //webkit browsers don't have image resize functionality when content is editable
            //so let's add something using jQuery UI resizable
            //another option would be opening a dialog for user to enter dimensions.
            if ( typeof jQuery.ui !== 'undefined' && /applewebkit/.test(navigator.userAgent.toLowerCase()) ) {

                var lastResizableImg = null;
                function destroyResizable() {
                    if(lastResizableImg == null) return;
                    lastResizableImg.resizable( "destroy" );
                    lastResizableImg.removeData('resizable');
                    lastResizableImg = null;
                }

                var enableImageResize = function() {
                    $('.wysiwyg-editor')
                        .on('mousedown', function(e) {
                            var target = $(e.target);
                            if( e.target instanceof HTMLImageElement ) {
                                if( !target.data('resizable') ) {
                                    target.resizable({
                                        aspectRatio: e.target.width / e.target.height,
                                    });
                                    target.data('resizable', true);

                                    if( lastResizableImg != null ) {//disable previous resizable image
                                        lastResizableImg.resizable( "destroy" );
                                        lastResizableImg.removeData('resizable');
                                    }
                                    lastResizableImg = target;
                                }
                            }
                        })
                        .on('click', function(e) {
                            if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
                                destroyResizable();
                            }
                        })
                        .on('keydown', function() {
                            destroyResizable();
                        });
                }

                enableImageResize();

                /**
                 //or we can load the jQuery UI dynamically only if needed
                 if (typeof jQuery.ui !== 'undefined') enableImageResize();
                 else {//load jQuery UI if not loaded
			$.getScript($path_assets+"/js/jquery-ui-1.10.3.custom.min.js", function(data, textStatus, jqxhr) {
				if('ontouchend' in document) {//also load touch-punch for touch devices
					$.getScript($path_assets+"/js/jquery.ui.touch-punch.min.js", function(data, textStatus, jqxhr) {
						enableImageResize();
					});
				} else	enableImageResize();
			});
		}
                 */
            }

            $('#datetimepicker').datetimepicker({format: 'yyyy-mm-dd hh:ii'});
        });
        var ue = UE.getEditor('container');
    </script>
@endsection