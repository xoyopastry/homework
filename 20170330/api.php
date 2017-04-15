<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/30
 * Time: 14:26
 */
//通用处理
header('Content-Type:application/json');//设置响应的数据类型
date_default_timezone_set('PRC');//设置时区
//定义数据库信息
define('DB_HOST','localhost');
define('DB_NAME','web6cms');
define('DB_USER','root');
define('DB_PASS','');
//数据库连接
$conn = mysqli_connect(DB_HOST,DB_NAME,DB_USER,DB_PASS);
if (mysqli_connect_errno($conn)){
    return response(2,"数据库连接失败");
}
mysqli_set_charset($conn,"utf8");

/**
 * 处理增删改查的函数
 * @param string $sql 需要执行的SQL语句
 * @return array|bool|int|string
 */
function DB($sql = ''){
    global $conn;
    if ($sql == '') return false;
    $result = mysqli_query($conn, $sql);
    if (!$result) return array();
    $sql = strtolower($sql);
    if(substr_count($sql, 'select')) {
        $rows = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    } elseif (substr_count($sql, 'insert')) {
        return mysqli_insert_id($conn);
    } else {
        $affected_rows = mysqli_affected_rows($conn);
        return $affected_rows > 0 ? $affected_rows : 0;
    }
}

/**
 * 返回API数据
 * @param int $code 错误码：0表示成功，1表示失败
 * @param string $message 返回信息
 * @param array $data 返回的数据
 */
function response($code, $message='', $data=array()){
    $result = array(
        'code' => $code,
        'message' => $message,
        'data' => $data,
    );
    echo json_encode($result);
    exit;
}
/**
 * 新闻资讯API
 * Class Api
 */
class Api{
    /**
     * 添加栏目
     */
    public function addCategory(){
        $cat_name = isset($_POST['cat_name']) ? $_POST['cat_name'] :"";
        $cat_desc = isset($_POST['cat_desc']) ? $_POST['cat_desc'] :"";
        if ($cat_name==""){
            response(2,"分类名称不能为空");
        }
        $sql="INSERT INTO cms_category(`cat_name`,`cat_desc`) VALUES('{$cat_name}','{$cat_desc}')";
        $result=DB($sql);
        if($result){
            response(0, 'ok');
        }else{
            response(1, 'fail');
        }
    }

    /**
     * 显示栏目
     */
    public function showCategory(){
        $sql="SELECT * FROM `cms_category` WHERE `cat_status` = 1";
        $result=DB($sql);
        if ($result) {
            response(0, 'ok',$result);
        } else {
            response(1, 'fail');
        }
    }

    /**
     * 添加新闻
     */
    public function addNews(){
        $news_title=isset($_POST['news_title'])?$_POST['news_title']:"";
        $news_leads=isset($_POST['news_leads'])?$_POST['news_leads']:"";
        $news_author=isset($_POST['news_author'])?$_POST['news_author']:"";
        $news_content=isset($_POST['news_content'])?$_POST['news_content']:"";
        $news_source=isset($_POST['news_source'])?$_POST['news_source']:"";
        $keywords=isset($_POST['keywords'])?$_POST['keywords']:"";
        $cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:"";
        if ($news_title==""){response(2,"新闻标题不能为空");}
        if ($news_leads==""){response(2,"新闻导语不能为空");}
        if ($news_author==""){response(2,"作者不能为空");}
        if ($news_source==""){response(2,"新闻来源不能为空");}
        if ($keywords==""){response(2,"新闻关键字不能为空");}
        if ($news_content==""){response(2,"新闻内容不能为空");}
        if ($cat_id==""){response(2,"新闻栏目不能为空");}

        $sql="INSERT INTO cms_news(`news_title`,`news_leads`,`news_author`,`news_content`,`news_source`,`keywords`,`cat_id`)
              VALUES('{$news_title}','{$news_leads}','{$news_author}','{$news_content}','{$news_source}','{$keywords}','{$cat_id}')";
        $result=DB($sql);
        if($result){
            response(0, 'ok');
        }else{
            response(1, 'fail');
        }
    }

    /**
     * @param int $cat_id 新闻栏目编号
     */
    public function showNewsByCatId($cat_id){
        $sql="SELECT * FROM `cms_news` WHERE `news_status` = 1 && `cat_id`=$cat_id ";
        $result=DB($sql);
        if ($result) {
            response(0, 'ok',$result);
        } else {
            response(1, 'fail');
        }
    }

    /**
     * 根据新闻编号查询新闻
     * @param int $news_id 新闻编号
     */
    public function showNewsById($news_id){
        $sql="SELECT * FROM `cms_news` WHERE `news_status` = 1 && `news_id`=$news_id ";
        $result=DB($sql);
        if ($result) {
            response(0, 'ok',$result);
        } else {
            response(1, 'fail');
        }
    }

    /**
     * 更新新闻的阅读数量
     * @param int $news_id 新闻编号
     */
    public function updateNewsReadCount($news_id){
        $sql="SELECT `news_clicks` FROM `cms_news` WHERE `news_status` = 1 && `news_id`=$news_id ";
        $result=DB($sql);
        if($result){
            response(0, 'ok',$result);
        }else{
            response(1, 'fail');
        }
    }

    /**
     * 添加评论
     * @param array $comment 评论
     */
    public function addComment($comment){
        $com_content = isset($_POST['com_content']) ? $_POST['com_content'] :"";
        $news_id = isset($_POST['news_id']) ? $_POST['news_id'] :"";
        if ($com_content==""){
            response(2,"评论内容不能为空");
        }
        $sql="INSERT INTO cms_comment(`com_content`,`news_id`) VALUES('{$com_content}','{$news_id}')";
        $result=DB($sql);
        if($result){
            response(0, 'ok');
        }else{
            response(1, 'fail');
        }
    }

    /**
     * @param $news_id
     */
    public function showCommentsByNewsId($news_id){
        $sql="SELECT * FROM `cms_comment` WHERE `news_status` = 1 && `news_id`=$news_id ";
        $result=DB($sql);
        if($result){
            response(0, 'ok',$result);
        }else{
            response(1, 'fail');
        }
    }
}

//1.接收前端的参数
$a = isset($_GET['a']) ?$_GET['a'] : "";//a表示action，具体的动作。
//2.参数校验
if (!in_array($a, array(
    'addCategory',
    'showCategory',
    'addNews',
    'showNewsByCatId',
    'showNewsById',
    'updateNewsReadCount',
    'addComment',
    'showCommentsByNewsId'
))){
    return response(1,"参数传错啦，参数只能是（addCategory、showCategory、addNews、showNewsByCatId、showNewsById、updateNewsReadCount、addComment、showCommentsByNewsId）");
}
//3.调用对应的API
$api = new Api();
switch($a) {
    case 'addCategory': {
        $api->addCategory();
        break;
    }
    case 'showCategory': {
        $api->showCategory();
        break;
    }
    case 'addNews': {
        $api->addNews();
        break;
    }
    case 'showNewsByCatId': {
        $cat_id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
        $api->showNewsByCatId($cat_id);
        break;
    }
    case 'showNewsById': {
        $news_id = isset($_GET['news_id']) ? intval($_GET['news_id']) : 0;
        $api->showNewsById($news_id);
        break;
    }
    case 'updateNewsReadCountByNewsId': {
        $news_id = isset($_GET['news_id']) ? intval($_GET['news_id']) : 0;
        $api->updateNewsReadCount($news_id);
        break;
    }
    case 'addComment': {
        $api->addComment();
        break;
    }
    case 'showCommentsByNewsId':
    {
        $api->showCommentsByNewsId();
        break;
    }
}