//All function
	//Function Back
	function goBack(){
		window.history.back();
	}
	//Function Confirm
	function con(a){
		return confirm(a);
	}
	//WYSIWYG Editor
	$('.wysihtml5').wysihtml5();
$(function(){
	$('.ajax').click(function(){
		$.ajax({url:$(this).attr('href'),type:'post',
			success:function(a){
				$('.resultAjax').html(a);
			}			
		});
		return false;
	});
	//Save HTML
	$('#saveEditor').submit(function(){
		$.ajax({url:$(this).attr('url'),type:'post',data:$(this).serialize(),
			success:function(a){$('#result').html(a)}});
		alert('Save Editor');
		return false;
	});
	//popover
	$(".thumbnail #popHover").popover({trigger: 'hover'});  
});