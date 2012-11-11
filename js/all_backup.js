$(function() {
    //导航
    $('<div id="curbar"></div>').appendTo($('#header'));
    
    var hoverEvent,
        outEvent;
    var headerOffsetLeft = $('#header').offset().left;
    var baseMenu;
    if ($('.current-menu-item').length > 0) {
        baseMenu = $('.current-menu-item');
    } else {
        baseMenu = $('#nav li:first');
    }
    $('#curbar').css({
        left : baseMenu.offset().left - headerOffsetLeft
    });
    $('#nav li').hover(
        function() {
            var _this = $(this);
            if (_this.parent('.sub-menu').length > 0) {
                return;
            }
            clearTimeout(outEvent);
            hoverEvent = setTimeout(function() {
                var curliWidth = parseInt(_this.width(), 10),
                    curliOffsetLeft = _this.offset().left;
                $('#curbar').animate({
                    width : curliWidth,
                    left : curliOffsetLeft - headerOffsetLeft
                }, 300);
            }, 150);
        },
        function() {
            var _this = $(this);
            if (_this.parent('.sub-menu').length > 0) {
                return;
            }
            clearTimeout(hoverEvent);
            outEvent = setTimeout(function() {
                var curliWidth = parseInt(_this.width(), 10),
                    curliOffsetLeft = _this.offset().left,
                    curliLeft = curliOffsetLeft - headerOffsetLeft + curliWidth / 2;
                $('#curbar').animate({
                    width : 0,
                    left : curliLeft
                }, 300);
            }, 150);
        }
    );
    
    $('#nav .sub-menu li:last-child').addClass('subment_btn');
    
    $('#nav ul').css({
        left : ( parseInt($('#header').width(), 10) - parseInt($('#nav ul').width(), 10) ) / 2
    });
    
    $('#nav li:has(ul)').each(function() {
        var _this = $(this);
        var submenuHover,
            submenuOut;
        _this.hover(
            function() {
                var menuThis = $(this);
                clearTimeout(submenuOut);
                submenuHover = setTimeout(function() {
                    $('.sub-menu', menuThis).css({
                        left : (parseInt(_this.width(), 10) - 160) / 2
                    });
                    $('.sub-menu', menuThis).slideDown();
                }, 150);
            },
            function() {
                var menuThis = $(this);
                clearTimeout(submenuHover);
                submenuOut = setTimeout(function() {
                    $('.sub-menu', menuThis).slideUp();
                }, 150);
            }
        );
    });
    
    //搜索
    $('#sear .sear_txt').focus(function() {
        if ($(this).val() == '请输入搜索内容') {
            $(this).val('');
        }
    });
    
    $('#sear .sear_txt').blur(function() {
        if ($(this).val() == '') {
            $(this).val('请输入搜索内容');
        }
    });
    
    //底部导航
    $('#map ul li:not(:last)').append('|');
    
    //底部展开
    var moreHover;
    $('#more_btn').hover(
        function() {
            moreHover = setTimeout(function() {
                if ($('#more_btn').hasClass('fold')) {
                    var downScroll = setInterval(function() {
                        $(window).scrollTop(9999);
                    }, 1);
                    $('#col_wrapper').slideDown(600, function() {
                        $('#more_btn').removeClass('fold').addClass('unfold');
                        $(this).css('margin-top', '-12px');
                        clearInterval(downScroll);
                    });
                } else if ($('#more_btn').hasClass('unfold')) {
                    $('#col_wrapper').slideUp(600, function() {
                        $('#more_btn').removeClass('unfold').addClass('fold');
                    });
                }
            }, 150);
        },
        function() {
            clearTimeout(moreHover);
            return;
        }
    );
    
    //scroll
    $(window).scroll(function () {
        var bodyTop = 0;
        if (typeof window.pageYOffset != 'undefined') {
            bodyTop = window.pageYOffset;
        } else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {
            bodyTop = document.documentElement.scrollTop;
        } else if (typeof document.body != 'undefined') {
            bodyTop = document.body.scrollTop;
        }
        $('#scroll').css('top', 250 + bodyTop);
    });
    
    $('a[href*=#]').click(function (ev) {
        ev.preventDefault();
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
            if ($target.length) {
                var targetOffset = $target.offset().top;
                $('html,body').animate({
                    scrollTop : targetOffset
                }, 1000);
                return false;
            }
        }
    });

    //focus
    $('a,input[type="submit"],object').bind('focus', function() {
        if (this.blur) {
            this.blur();
        }
    });
    
    //blogroll
    $('.entry .blogroll li a').each(function() {
        $(this).append($('<span class="blogroll_mask">点击查看</span>'));
    });
    var blogrollHover;
        
    $('.entry .blogroll li a').hover(
        function() {
            var _this = $(this);
            blogrollHover = setTimeout(function() {
                $('.blogroll_mask', _this).animate({
                    opacity : 0.8,
                    top : 0
                }, 500);
            }, 150);
        },
        function() {
            clearTimeout(blogrollHover);
            $('.blogroll_mask', $(this)).animate({
                opacity : 0,
                top : 42
            }, 500);
        }
    );
    
    //隐藏 scroll
    if ($('#sidebar').length == 0) {
        $('#scroll').css('display', 'none');
    }
    
    //分享到微博
    var miniBlogShare = function() {
        //指定位置驻入节点
        $('<img id="imgSinaShare" class="img_share" title="将选中内容分享到新浪微博" src="' + config.bloginfoTpl + '/imgs/sina_share.gif" /><img id="imgQqShare" class="img_share" title="将选中内容分享到腾讯微博" src="' + config.bloginfoTpl + '/imgs/tt_share.png" />').appendTo('body');
       
        //默认样式
        $('.img_share').css({
            display : 'none',
            position : 'absolute',
            cursor : 'pointer'
        });
       
        //选中文字
        var funGetSelectTxt = function() {
            var txt = '';
            if(document.selection) {
                txt = document.selection.createRange().text;
            } else {
                txt = document.getSelection();
            }
            return txt.toString();
        };
       
        //选中文字后显示微博图标
        $('html,body').mouseup(function(e) {
            if (e.target.id == 'imgSinaShare' || e.target.id == 'imgQqShare') {
                return;
            }
            e = e || window.event;
            var txt = funGetSelectTxt(),
                sh = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0,
                left = (e.clientX - 40 < 0) ? e.clientX + 20 : e.clientX - 40,
                top = (e.clientY - 40 < 0) ? e.clientY + sh + 20 : e.clientY + sh - 40;
            if (txt) {
                $('#imgSinaShare').css({
                    display : 'inline',
                    left : left,
                    top : top
                });
                $('#imgQqShare').css({
                    display : 'inline',
                    left : left + 30,
                    top : top
                });
            } else {
                $('#imgSinaShare').css('display', 'none');
                $('#imgQqShare').css('display', 'none');
            }
        });
       
        //点击新浪微博
        $('#imgSinaShare').click(function() {
            var txt = funGetSelectTxt(), title = $('title').html();
            if (txt) {
                window.open('http://v.t.sina.com.cn/share/share.php?title=' + txt + ' —— 转载自：' + title + '&url=' + window.location.href);
            }
        });
       
        //点击腾讯微博
        $('#imgQqShare').click(function() {
            var txt = funGetSelectTxt(), title = $('title').html();
            if (txt) {
                window.open('http://v.t.qq.com/share/share.php?title=' + encodeURIComponent(txt + ' —— 转载自：' + title) + '&url=' + window.location.href);
            }
        });
    }();
});