	window.onload = function (){
		var guestform = document.getElementsByName('guestform')[0];		//留言表单
		var searchform = document.getElementsByName('searchform')[0];	//搜索表单
		//判断提交的留言信息是否合法
		if(guestform != undefined){
			guestform.onsubmit = function(){
				if(guestform.title.value.length < 2 || guestform.title.value.length > 50){
					alert('留言標題不得小於2位或大於50位!');
					guestform.title.value = '';
					guestform.title.focus();
					return false;
				}

				if(/[<>\'\"\ \  ]/.test(guestform.title.value)){
					alert('留言標題不得包含敏感字串!');
					noticeform.title.value = '';
					noticeform.title.focus = '';
					return false;
				}

				if(guestform.content.value.length < 2 || guestform.content.value.length > 255){
					alert('留言内容長度不得小於2位或不得大於255位!');
					guestform.content.value = '';
					guestform.content.focus();
					return false;
				}

				return true;
			};
		}

		searchform.keyword.onclick = function (){
			searchform.keyword.value = '';
			searchform.keyword.focus();
		};

		//检查搜索表单
		searchform.onsubmit = function (){
			if('/[<>\/\\\'\"\`]/'.test(searchform.keyword.value)){
				alert('搜尋關鍵字不能包含敏感字串!');
				searchform.keyword.value = '';
				searchform.keyword.focus();
				return false;
			}
			return true;
		};
	};
