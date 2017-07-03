/**
 * PHPWind PAGE JS
 * @Copyright Copyright 2011, phpwind.com
 * @Descript: ǰ̨-ͷ������&��Ϣ
 * @Author	: linhao87@gmail.com
 * @Depend	: core.js��jquery.js(1.7 or later), global
 * $Id: headMsg.js 24161 2013-01-22 07:55:30Z yanchixia $
 */

 //��Ϣ
;(function(){
	var $hm_wrap = $('#J_head_msg'), //��Ϣ��������
			hm_home = '#J_hm_home', //��Ϣ����ҳ�б�
			hm_list = '.J_hm_list', //��Ϣ����ҳ���б���
			hm_max_height = 400, //��Ϣ����
			hm_loading = $('<div class="pop_loading" style="position:absolute;left:50%;top:50%;margin:-40px 0 0 -25px;"></div>'),
			lock = false, //��Ϣ����������
			postlock = false;

	//��ȡ��Ϣ����ҳ
	var headMsgUtil = {
		init : function(){

			//��������
			if(lock) {
				return;
			}
			lock = true;

			var _this = this;

			//������Ϣ����ҳ
			$.post(GV.URL.HEAD_MSG.LIST)
			.done(function(data){
				//global.js
				if(Wind.Util.ajaxTempError(data, $('#J_head_msg_btn'))) {
					$('#J_head_msg_pop').hide();
					$hm_wrap.html('<div class="not_content_mini"><i></i>�����������Ժ�ˢ������</div>');
					return false;
				}

				Wind.use('ajaxForm', function(){
					$hm_wrap.html(data);

					var $hm_list = $(hm_list);
					_this.IE6Height();

					if($.support.getSetAttribute) {
						//ie6 7 ������
						Wind.use('scrollFixed', function(){
							$hm_list.scrollFixed();
						});
					}

					if($.browser.msie && $.browser.version < 7) {
						$hm_list.on('mouseenter', 'li', function(){
							$(this).addClass('current');
						}).on('mouseleave', 'li', function(){
							$(this).removeClass('current');
						});
					}

					$('#J_hm_home li').attr('tabindex','0').on('click', function (e) {
						if(e.target.tagName.toLowerCase() == 'a') {
							return;
						}
						_this.getPage($(this).data('url'), $(this));
					});

				});

			});
		},
		IE6Height : function() {
			//ie6 �߶��ж�
			if ($.browser.msie && $.version === '6.0') {
				if ($(hm_list).height() > this.max_height) {
					$(hm_list).css('height', this.max_height);
				} else {
					//list.css('height', 'auto');
				}
			}
		},
		getPage : function(url, elem) {
			//����ҳ��
			var _this = this;
			$('#J_emotions_pop').hide();
			hm_loading.appendTo($hm_wrap);

			$.post(url)
			.done(function(data){
				if(Wind.Util.ajaxTempError(data)) {
					return false;
				}

				$(hm_home).hide().siblings().remove();
				$hm_wrap.append(data).find(hm_loading).remove();

				//�󶨷�˽��
				if($hm_wrap.find('a.J_send_msg_pop').length) {
					Wind.js(GV.JS_ROOT+ 'pages/common/sendMsgPop.js?v='+ GV.JS_VERSION);
				}

				//����
				if($hm_wrap.find('a.J_insert_emotions').length) {
					Wind.use(GV.JS_ROOT+ 'pages/common/insertEmotions.js?v='+ GV.JS_VERSION);
				}

				_this.IE6Height();

				if(elem.length) {
					//ͳ��
					_this.readCount(elem);
				}
				
				if($.support.getSetAttribute) {
					$(hm_list).scrollFixed();
				}
			});
		},
		readCount : function(elem){
			//δ��ͳ��
			if(!elem.hasClass('unread')) {
				return;
			}

			var hm_num = $('.J_hm_num'),	//����δ��ͳ��
				org_num = parseInt(hm_num[0].innerHTML),
				multi = elem.find('.J_unread_multi'),
				result_num;
			if(multi.length) {
				//˽��
				result_num = org_num - multi.data('unread');
				multi.remove();
			}else{
				//֪ͨ
				result_num = org_num - 1;

				unread_icon = elem.find('.J_unread_icon');
				if(unread_icon.length) {
					unread_icon.attr('class', unread_icon.attr('class').replace('_new', '')).removeClass('J_unread_icon');
				}
			}
			hm_num.text(result_num);
			elem.removeClass('unread');

			if(result_num <= 0) {
				hm_num.parent().addClass('header_message_none');
			}
		},
		topTipsAdd : function(html){
			//�����Ϣ������ʾ
			$('#J_hm_top').after('<div class="tips">'+ html +'</div>');
		},
		topTipsDel : function(){
			//�Ƴ���Ϣ������ʾ
			$('#J_hm_top').next('.tips').remove();
		}
	};
	headMsgUtil.init();


	//��Ϣ���ڲ�����

	//�����з��ذ�ť
	$hm_wrap.on('click', 'a.J_hm_back', function (e) {
		e.preventDefault();
		$('#J_emotions_pop').hide();
		$('#J_hm_home').show().siblings().remove();
	});

	//
	$hm_wrap.on('click', 'a.J_hm_ajaxlink', function (e) {
		e.preventDefault();
		var $this = $(this);
		$.getJSON($this.attr('href'), function(data){
			if(data.state === 'success') {
				Wind.Util.resultTip({
					msg : data.message
				});
			}else if(data.state === 'fail'){
				Wind.Util.resultTip({
					error : true,
					msg : data.message
				});
			}
		});
	});

	//���������&���� ��������ʾ
	$hm_wrap.on('click', 'a.J_hm_ajaxtip', function (e) {
		e.preventDefault();
		var $this = $(this),
				role = $this.data('role'),				//����
				name = $this.data('name'),				//��������
				referer = $this.data('referer');	//��ת��ַ

		$.getJSON($this.attr('href'), function(data){
			if(data.state === 'success') {
				var tip_text, btn_text;

				if(role == 'blacklist') {
					tip_text = '�Ѱ� '+ name +' ��������������������յ�Ta��˽�š�';
					btn_text = '�鿴������';
				}else if(role == 'app'){
					tip_text = '�����������յ� '+ name +' ֪ͨ';
					btn_text = '�鿴֪ͨ����';
				}

				headMsgUtil.topTipsAdd(tip_text);

				//�޸İ�ť״̬���Ƴ���class
				$this.text(btn_text).removeClass('J_hm_ajaxtip').attr('href', referer);

			}else if(data.state === 'fail'){
				Wind.Util.resultTip({
					error : true,
					msg : data.message
				});
			}
		});
	}).on('click', 'a.J_notice_ignore', function(e){
		//����
		e.preventDefault();
		var $this = $(this),
			role = $this.data('role'),
			ignore = $this.data('ignore'),
			anti_ignore = (ignore == '0' ? '1' : '0'),
			anti_text;

		if(role == 'reply') {
			anti_text = (ignore == '0' ? '�رջظ�����' : '�����ظ�����');
		}else{
			anti_text = (ignore == '0' ? '����' : 'ȡ������');
		}

		if(postlock) {
			return false;
		}
		postlock = true;

		$.post(this.href, {ignore : ignore}, function(data){
			if(data.state == 'success') {
				$this.text(anti_text).data('ignore', anti_ignore);

				if(ignore == '1') {
					headMsgUtil.topTipsAdd('���������յ� '+ $this.data('type') +' ֪ͨ');
				}else{
					headMsgUtil.topTipsDel();
				}

			}else if(data.state == 'fail') {
				Wind.Util.resultTip({
					error : true,
					elem : $this,
					follow : true,
					msg : data.message
				});
			}
			postlock = false;
		}, 'json');
	});



	//����
	$hm_wrap.on('click', 'a.J_insert_emotions', function(e){
		e.preventDefault();
		var head_msg_pop = $('#J_head_msg_pop'),
			$this = $(this);

		insertEmotions($this, $('#J_head_msg_textarea'), head_msg_pop);
	}).on('click', 'a.J_msg_follow', function(e){
		//�ӹ�ע
		e.preventDefault();
		var $this = $(this);
		$.post(this.href, {
			uid: $this.data('uid')
		}, function(data){
			if(data.state == 'success') {
				$this.replaceWith('<span class="core_unfollow">�ѹ�ע</span>');
			}else if(data.state == 'fail'){
				//global.js
				Wind.Util.resultTip({
					error : true,
					msg : data.message,
					follow : $this
				});
			}
		}, 'json');
	});

	//����
	$hm_wrap.on('click', '#J_hm_reply_placeholder', function (e) {
		//��ʾ����
		$(this).hide();
		$('#J_message_reply').fadeIn();
		var head_msg_textarea = $('#J_head_msg_textarea'),
			message_reply_btn = $('#J_message_reply_btn');

		//global.js
		Wind.Util.buttonStatus(head_msg_textarea, message_reply_btn);
		Wind.Util.ctrlEnterSub(head_msg_textarea, message_reply_btn);

		$('#J_head_msg_textarea').focus();
	}).on('click', '#J_message_reply_btn', function (e) {
		e.preventDefault();
		var $this = $(this),
				textarea = $('#J_head_msg_textarea');

		$('#J_emotions_pop').hide();

		$this.parents('form').ajaxSubmit({
			dataType : 'json',
			beforeSubmit : function(){
				//global.js
				Wind.Util.ajaxBtnDisable($this);
			},
			success : function(data){
				Wind.Util.ajaxBtnEnable($this, 'disabled');

				if(data.state === 'success') {
					var dialog_list = $('#J_msg_dialog_list');
					dialog_list.prepend('<div class="my cc">\
		<div class="face"><a href=""><img height="25" width="25" data-type="small" src="'+ GV.U_AVATAR +'" class="J_avatar"></a></div>\
		<div class="bubble">\
			<div class="arrow"><em></em><span></span></div>\
			<a class="b" href="http://www.phpwind.dev/index.blade.php?m=space&amp;uid=2">��</a>��'+ $.trim(textarea.val()) +'<div class="io"><span class="time">�ո�</span></div>\
		</div>\
	</div>');
					textarea.val('');
					Wind.Util.postTip({
						elem : textarea,
						msg : '���ͳɹ�',
						zindex : 11,
						callback : function(){
							$('#J_message_reply').hide();
							$('#J_hm_reply_placeholder').fadeIn();
						}
					});

					//global.js
					Wind.Util.avatarError(dialog_list.find('img.J_avatar'));
				}else if(data.state === 'fail'){
					Wind.Util.resultTip({
						error : true,
						msg : data.message
					});
				}
			}
		});
	});

	//ͳһ��������ajaxҳ������
	$hm_wrap.on('click', 'a.J_hm_page', function (e) {
		e.preventDefault();
		headMsgUtil.getPage($(this).attr('href'));
	});

})();



//����
(function(){
	var forum_data = {}, //�������
		head_forum_ct = $('#J_head_forum_ct'), //��鵯���б���
		post_to_forum = $('#J_post_to_forum'), //������_���
		head_forum_sub = $('#J_head_forum_sub'), //ȷ��
		forum_ul,
		cur_cid = head_forum_ct.data('cid'), //��ǰcid
		cur_fid = head_forum_ct.data('fid'), //��ǰfid
		fid = '';

	if(!forum_data.data) {
		//����������
		$.post(GV.URL.FORUM_LIST, {
				'withMyforum' : 1
			}, function(data){
			if(data.state == 'success') {
				forum_data.data = data.data;

				//ѭ��д���������
				var cate_data = forum_data.data['cate'],		//��������
						cate_arr = [];
				for(i=0, len=cate_data.length;i<len;i++) {
					cate_arr.push('<li tabindex="0" role="option" class="J_cate_item" data-cid="'+ cate_data[i][0] +'" aria-label='+ cate_data[i][1] +'>'+ cate_data[i][1] +'</li>');
				}
				head_forum_ct.html('<div class="source_forum" tabindex="0" role="combobox" aria-owns="J_forum_list" aria-label="ѡ��Ҫ�������ķ��࣬���س���ѡ������tab���̽����л�"><h4>ѡ�����</h4><ul id="J_forum_list">'+ cate_arr.join('') +'</ul></div><div class="target_forum" tabindex="0" role="combobox" aria-owns="J_forum_ul" aria-label="ѡ��Ҫ�����İ�飬���س���ѡ������tab���̽����л�"><h4>ѡ����</h4><ul id="J_forum_ul"></ul></div>');
				forum_ul = $('#J_forum_ul');

				if(cur_cid) {
					$('#J_forum_list li[data-cid='+cur_cid+']').trigger('click');
				}
			}else if(data.state == 'fail') {
				head_forum_ct.html(data.message);
			}
		}, 'json');
	}


	//�������
	head_forum_ct.on('click keydown', 'li.J_cate_item', function(e) {
		if(e.type === 'keydown' && e.keyCode !== 13) {
			return;
		}
		var current_cid = $(this).data('cid');

		$(this).addClass('current').siblings().removeClass('current');
		post_to_forum.text('');																								//������_���
		head_forum_sub.addClass('disabled').prop('disabled', 'disabled');		//ȷ����ť������

		//ѭ��д��������

		var data_forum = forum_data.data['forum'][current_cid],
				forum_arr = [];
		for(i=0,len=data_forum.length;i<len;i++) {
			forum_arr.push('<li tabindex="0" role="option" class="J_forum_item" data-fid="'+ data_forum[i][0] +'" aria-label='+ data_forum[i][1] +'>'+ data_forum[i][1] +'</li>');
		}
		forum_ul.html(forum_arr.join(''));
		forum_ul.parent().focus();

		if(cur_fid) {
			forum_ul.find('li[data-fid='+ cur_fid +']').trigger('click');
		}
		
	});

	//������
	head_forum_ct.on('click keydown', 'li.J_forum_item', function(e) {
		if(e.type === 'keydown' && e.keyCode !== 13) {
			return;
		}else {
			e.preventDefault();
		}
		fid = $(this).data('fid');
		$(this).addClass('current').siblings('.current').removeClass('current');
		post_to_forum.text($(this).text().replace(/-/g, ''));								//������_���
		head_forum_sub.removeClass('disabled').removeProp('disabled');		//ȷ����ť����
		if(e.type === 'keydown') {
			$('#head_forum_join').focus();
		}
	});

	//��ת����ҳ
	head_forum_sub.on('click', function(e) {
		e.preventDefault();
		var $this = $(this),
			href = $this.data('url') +'&fid='+ fid,
			head_forum_join = $('#J_head_forum_join');

		if(head_forum_join.prop('checked')) {
			//������
			$.post(head_forum_join.data('url'), {fid : fid}, function(data){
				location.href = href;
			}, 'json');
		}else{
			location.href = href;
		}
	});

	//�ر�
	$('#J_head_forum_close').on('click', function(e){
		e.preventDefault();
		$('#J_head_forum_pop').hide();
	});

})();