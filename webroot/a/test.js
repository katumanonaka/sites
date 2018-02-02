/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    var $window             = $(window),
        $aside              = $('#aside'),
        defaultPositionLeft = $aside.css('left'),
        setOffsetPosition   = $aside.offset(),
        fixedClassName      = 'fixed';
 
    $window.on('scroll', function() {
        if ($(this).scrollTop() > setOffsetPosition.top) {
            $aside.addClass(fixedClassName).css('left', setOffsetPosition.left);
        } else {
            if ($aside.hasClass(fixedClassName)) {
                $aside.removeClass(fixedClassName).css('left', defaultPositionLeft);
            }
        }
    }).trigger('scroll');
});


