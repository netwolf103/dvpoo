$(function() {
	//最新文章
	var postHover;
	$('#rc_post_bd li').live({
		mouseenter : function() {
			var _this = $(this);
			postHover = setTimeout(function() {
				$('.post_title', _this).animate({
					top : '20px'
				}, 300);
				$('.post_more', _this).animate({
					bottom : '0'
				}, 300);
				$('.post_img img', _this).animate({
					width : '265px',
					height : '265px',
					right : '25px',
					bottom : '25px'
				}, 300);
			}, 150);
		},
		mouseleave : function() {
			clearTimeout(postHover);
			$('.post_title', $(this)).animate({
				top : '-33px'
			}, 300);
			$('.post_more', $(this)).animate({
				bottom : '-110px'
			}, 300);
			$('.post_img img', $(this)).animate({
				width : '215px',
				height : '215px',
				right : '0',
				bottom : '0'
			}, 300);
		}
	});
	
	$('#rc_post_bd li').live({
		mouseenter : function() {
			$('.post_mask', $(this)).animate({
				opacity : '0.8'
			});
		},
		mouseleave : function() {
			$('.post_mask', $(this)).animate({
				opacity : '0'
			});
		}
	});
	
	//关注我们
	var shareHover;
	$('#share_bd li').hover(
		function() {
			var _this = $(this);
			shareHover = setTimeout(function() {
				$('.share_num', _this).animate({
					bottom : '-20px'
				}, 300);
			}, 150);
		},
		function() {
			clearTimeout(shareHover);
			$('.share_num', $(this)).animate({
				bottom : '0'
			}, 300);
		}
	);
	
	//友情链接
	var scrollUlWidth = $('#blog_roll_bd li').outerWidth(true),	//单个 li 的宽度
		scrollUlLeft = 0;
	
	//自动滚动
	setInterval(function() {
		$('#blog_roll_bd').animate({
			left : scrollUlLeft - scrollUlWidth
		}, 1500, function() {
			scrollUlLeft = parseInt($('#blog_roll_bd').css('left'), 10);
			scrollUlLeft = scrollUlLeft + scrollUlWidth;
			$('#blog_roll_bd').css('left', scrollUlLeft);
			//复制第一个 li 并插入到 ul 的最后面
			$('#blog_roll_bd li:first-child').clone().appendTo($('#blog_roll_bd ul'));
			//删除第一个 li
			$('#blog_roll_bd li:first-child').remove();
		})
	}, 1);
	
	//异步翻页
	$('.page-numbers').live('click', function(event) {
		event.preventDefault();
		var pagedNum = 1,
			pageCurr = parseInt($('#rc_post_ft .current').text(), 10);
		if ($(this).hasClass('prev')) {
			pagedNum = pageCurr - 1
		} else if ($(this).hasClass('next')) {
			pagedNum = pageCurr + 1
		} else {
			pagedNum = parseInt($(this).text(), 10)
		}
		var postLoading = $('<div class="post_loading"><img src="' + config.bloginfoTpl + '/imgs/loading.gif" class="loading" alt="" /></div>');
		$('#rc_post').html(postLoading);
		$.ajax({
			url : '?action=ajax_paged&paged=' + pagedNum,
			success : function(data) {
				$('#rc_post').html(data).slideDown('slow', function() {
					//跳至文章顶部
					var targetOffset = $('#rc_post').offset().top;
					$('html,body').animate({
						scrollTop : targetOffset
					}, 800);
				});
			}
		});
	});
})