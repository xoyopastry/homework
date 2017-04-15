/**
 * Created by Administrator on 2017/3/10.
 */
//表单序列化
function formSerial(form) {
    var elems = form.elements;//得到表单中所有的控件
    var arr = [];
    //遍历所有的控件
    for (var i = 0; i < elems.length; i++) {
        var e = elems[i];//当前遍历的小元素
        switch(e.type){
            case "button":
            case "submit":
            case "reset":
                break;
            case "text":
            case "password":
            case "textarea":
                arr.push(e.name+"="+e.value);
                break;
            case "radio":
            case "checkbox":
                e.checked && arr.push(e.name+"="+e.value);
                break;
            case "select-one":
                var options = e.getElementsByTagName("option");
                console.log(options);
                for (var j = 0; j < options.length; j++) {
                    var obj = options[j];
                    if(obj.selected){
                        arr.push(e.name + "=" + obj.value);
                    }
                }
                break;
        }
    }
    console.log(arr.join("&"));
}

