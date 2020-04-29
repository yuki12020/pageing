<style>
#pagenation {
	/zoom: 1;
	position: relative;
	overflow: hidden;
	margin: 0 0 10px;
	padding: 10px;
	background: #fff;
}
#pagenation ul {
	position: relative;
	left: 50%;
	float: left;
}
#pagenation ul li {
	list-style: none; /*リストマーク（・）を消す*/
	position: relative;
	left: -50%;
	float: left;
	margin: 0;
}
#pagenation li a {
	display: inline-block;
	margin: 0 1px 1px 0;
	padding: 1px 8px;
	background: #fff;
	border: 1px solid #aaa;
	text-decoration: none;
	vertical-align: middle;
}
#pagenation li a:hover {
	background: #eeeff7;
	border-color: #00f;
}
</style>
<?php
//pager関数の記述
require_once "page_f.php";
//classの呼び出し
include_once "./../class/totalClass.php";

    //ページング処理に必要な計算
	// #総件数取得
	$obj =new total();
	(int)$cnt = $obj->total();
	// #文字列から型変換(int)でcastする
	//var_dump((int)$cnt);
	// #オフセット処理
	$page = 1;
	if (preg_match("/^[0-9]+$/", htmlspecialchars($_GET["page"]))){
    $_GET["page"] !== "0"?($page = (int)$_GET["page"]):$page = 1;
	}
	$limit = 3;
    $offset = ($page[0] - 1) * $limit;
?>
<h1>3件ずつ出力</h1>
<?php 
//pagenation 
echo pager($page,$cnt);
?>
<?php 
 $arr= $obj->select($page);
 #var_dump($arr);
foreach($arr as $key =>$value){
	$smt.= "id:".$value["id"]."<br>";
	$smt.= "日付:".$value["date"]."<br>";
	$smt.= "title:".$value["title"]."<br>";	
	$smt.= "<hr>";
}
echo $smt;
?>
<?php 
//pagenation 
echo pager($page,$cnt);
?>