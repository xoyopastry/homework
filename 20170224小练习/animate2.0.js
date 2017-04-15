/**
 * Created by Administrator on 2017/2/24.
 */
function animate(elem, targetJSON, time,callback) {
    //动画间隔要根据不同浏览器来设置
    if (window.navigator.userAgent.indexOf("MSIE") != -1) {
        var interval = 50;
    } else {
        var interval = 10; //最小值为5
    }

    //我们现在要得到现在的状态，当做信号量，这个信号量是所有变化的属性的集合
    var semaphoreJSON = {}; //信号量对象
    //给信号量对象添加属性，添加什么属性，根据目标对象中有什么属性，这里就添加什么属性
    //值就是当前的计算样式
    for (var k in targetJSON) {
        semaphoreJSON[k] = parseFloat(fetchComputedStyle(elem, k));
    }

    var maxcount = time / interval;
    var count = 0;
//    console.log(maxcount);

    var stepJSON = {};
    for (var k in targetJSON) {
        //把每个targetJSON中的值都去掉px
        targetJSON[k] = parseFloat(targetJSON[k]);
        stepJSON[k] = (targetJSON[k] - semaphoreJSON[k]) / maxcount;
    }

    //定时
    var timer = setInterval(function () {
        //要让所有的信号量发生变化
        for(var k in semaphoreJSON) {
            //信号量的变化
            semaphoreJSON[k] += stepJSON[k];
            //改变样式, 动：
            //根据是不是opacity来设置单位
            if (k != "opacity") {
                elem.style[k] = semaphoreJSON[k] + "px";
            } else {
                elem.style[k] = semaphoreJSON[k];
                elem.style.filter = "alpha(opacity="
                    + (semaphoreJSON[k] * 100) + ")";
            }
        }

        //计数器
        count++;
        if (count == maxcount) {
            //次数够了，所以停止
            //加一个强制让elem跑到targetJSON那个位置
            for (var k in targetJSON) {
                if (k != "opacity") {
                    elem.style[k] = targetJSON[k] + "px";
                } else {
                    elem.style[k] = targetJSON[k];
                    elem.style.filter = "alpha(opacity="
                        + (targetJSON[k] * 100) + ")";
                }
            }
            clearInterval(timer);
            callback.call(oDiv);
        }
    }, interval);
};

function fetchComputedStyle(obj, property) {
    if (window.getComputedStyle) {
        property = property.replace(/([A-Z])/g, function (match, $1) {
            return "-" + $1.toLowerCase();
        });
        return window.getComputedStyle(obj)[property];
    } else {
        property = property.replace(/-([a-z])/g, function (match, $1) {
            return $1.toUpperCase();
        });
        return obj.currentStyle[property];
    }
}