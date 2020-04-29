<?php
//db接続用のファイル
include dirname(__FILE__) ."./../conf/db_connect.php";
?>
<?php
class total{
	public function total(){
	//データの総件数取得、ページングで使用する
	global $db;
	$sql="select count(id) from test;";
	$info = $db->query($sql);
	$results = $info->fetchColumn();
	return $results;		
	}
	
	public function select($page){
	global $db;
	//pagerの設定
	//1ページに表示するレコード
	$limit = 3;
	//offset処理
    $offset = ($page - 1) * $limit; 
	$sql .="select * from test";
	$sql .=" where true ";	
	$sql .=" limit ".strval($limit);
    $sql .=" offset ".strval($offset);
	#クエリの実行
	$info = $db->query($sql);	
	#データベースのデータを全て取得fetchAll(PDO::FETCH_ASSOC);
	#データベースのデータを1行取得fetchColumn();
	$results = $info->fetchAll(PDO::FETCH_ASSOC);	
	return $results;
	} 
	
	
	
}