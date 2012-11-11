(function(){
	$('#feature').slideDown('slow')
})(jQuery);

function pager( elem, paged, cat, posts_per_page, type )
{
	$.ajaxSetup({
		beforeSend: function(){
			$(elem).parents('.box').find('.loading').show();
			$(elem).parents('.box').find('.box_bd').hide();
		}
	});
	 
	$.post('/dvpoo.com/wp-admin/admin-ajax.php?action=posts', {paged:paged, cat:cat, posts_per_page:posts_per_page, type:type}, function( html ){
		var width = $(elem).parents('.box').width();
		var left = 0;
		$(elem).parents('.box').html( $(html).fadeIn("slow") );

	});
}