	window.onload = function (){
		var form = document.getElementsByTagName('form')[0];
		var theme = document.getElementsByName('theme')[0];

		theme.onclick = function(){
			theme.value = '';
			theme.focus();
		};

		form.onsubmit = function(){
			if(form.theme.value.length < 2 || form.theme.value.length > 30){
				alert('增加投票主题長度不得小於2位或大於30位!');
				form.theme.value = '';
				form.theme.focus();
				return false;
			}
			return true;
		};
	};
