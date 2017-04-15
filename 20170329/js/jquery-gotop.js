/**
 * Created by Administrator on 2017/3/29.
 * date: 2017/3/29
 * author: nxr
 * Email: lanlingyi@foxmail.com
 * 回到顶部
 * example:
 *  html_code:
 *  <div id="gotop"><a href="#" class="top"></a></div>
 *  jquery_code:
 *  $(function () {
        $("#gotop").click(function (e) {
                $("body,html").animate({scrollTop:0},interval);
        });
        $("#gotop").mouseover(function (e) {
            $(this).css("opacity",0.2);
        });
        $("#gotop").mouseout(function (e) {
            $(this).css("opacity",1);
        });
        $.goTop();//实现回到顶部元素的渐显与渐隐
    });
 */

$.goTop = function () {
    $(window).scroll(function (e) {
        //若滚动条与顶部距离大于100
        if ($(window).scrollTop()>100) {
            $("#gotop").fadeIn(1000);//以1秒的间隔渐显id=gotop的元素
        }else{
            $("#gotop").fadeOut(1000);//以1秒的间隔渐隐id=gotop的元素
        }
    });
};