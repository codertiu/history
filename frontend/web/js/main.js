$(function(){
	$(document).on('click','.language',function(){
		var lang = $(this).attr('id');
		$.post('/site/language',{'lang':lang},function(data){
			location.reload();
		});
	});
});