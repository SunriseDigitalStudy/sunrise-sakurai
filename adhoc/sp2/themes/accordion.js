    $(function(){
        /*--<li>タグの要素は非表示にしておく--*/
        $('ul.list').css('display','none');
        /*--<li>タグでもopenクラスを指定したものは表示しておく--*/
        $('ul.open').css('display', 'block');
    });
    $(function(){
        var handler = $('#nav-container h3');
        handler.click(function(){
    /*--h3要素の次の要素（ul）を取得する--*/
            var _thisMenu = $(this).next();
            /*--見えてる要素は隠し、見えてない要素は表示する--*/
            if(_thisMenu.is(':visible')){
				$(this).find('span').removeClass('on');
                _thisMenu.slideUp('fast');
            }else if(_thisMenu.is(':hidden')) {
				$(this).find('span').addClass('on');
                _thisMenu.slideDown('fast');
            }
        });
    });
