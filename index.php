<?php
  error_reporting(0);
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $access_token = ""; // Nhập Token 
  $id = "100012668051362"; // Nhập ID người bạn muốn chạy share cho
  $page_avoid = ['']; // Nhập ID Fanpage mà bạn không muốn curl share chạy

  $page = json_decode(request("https://graph.facebook.com/me/accounts?access_token=$access_token"),TRUE);
  $get_posts = json_decode(request("https://graph.facebook.com/$id/feed?limit=1&access_token=$access_token"),TRUE);
  $first_post_id = $get_posts['data'][0]['id'];
  
  foreach($page['data'] as $data){

	  if(!in_array($data['id'],$page_avoid)){
	    $result = request("https://graph.facebook.com/$first_post_id/sharedposts?method=POST&access_token=".$data['access_token']."\n");
		sleep(2);
	  }
  }
  $response = json_decode($result,TRUE);
  $time = date("H:i:s Y-m-d");
  $file = fopen('log.txt','a');
  if($response['error']){
	  echo "Thất bại !!! Bài viết phải ở chế độ công khai";
	  fwrite($file,"$time : $first_post_id - Lỗi !!! \n");
  }
  else{
	  echo "Thành công !!! Xem dữ liệu đã ghi lại <a href='log.txt'>Xem</a>";
	  $count = count($page['data']);
	  fwrite($file,"$time : $first_post_id - Thành công - Share : $count !!! \n");
  }
  function request($url){
	$ch = curl_init();
	CURL_SETOPT_ARRAY($ch,array(
		CURLOPT_URL => $url,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_SSL_VERIFYHOST => 2,
		CURLOPT_SSL_VERIFYPEER => FALSE,
		CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.87 Safari/537.36"
	));
	$response = curl_exec($ch);
	return $response;
	curl_close($ch);
}
?>
<meta http-equiv="refresh" content="5">
