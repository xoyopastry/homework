
/**
 * function changepic
 * @param elem    jQuery选中的元素
 * @param images  需要切换的图片数组
 * @param options 选项，里面可以传一个time属性，用来设置切换的时间
 */
$.changepic = function (elem,images,options) {

    //参数检查
    // if (! isArray(images) || images.length < 2){
    //     console.log("(╥╯^╰╥)请传递一个至少有两项的图片数组");
    //     return;
    // }//isArray()低版本jquery不支持

    var index = 0;
    var interval = options && options.time ? parseInt(options.time) : 1000;
    setInterval(function () {
        index++;
        if (index > images.length-1) {
            index=0;
        }
        elem.attr("src",images[index]);
    },interval);
};