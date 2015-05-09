<?php
function saveMedia($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);    
        curl_setopt($ch, CURLOPT_NOBODY, 0);    //对body进行输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $package = curl_exec($ch);
        $httpinfo = curl_getinfo($ch);
       
        curl_close($ch);
        $media = array_merge(array('mediaBody' => $package), $httpinfo);
        
        //求出文件格式
        preg_match('/\w\/(\w+)/i', $media["content_type"], $extmatches);
        $fileExt = $extmatches[1];
        $filename = time().rand(100,999).".{$fileExt}";
        $dirname = "./wximages/";
        if(!file_exists($dirname)){
            mkdir($dirname,0777,true);
        }
        file_put_contents($dirname.$filename,$media['mediaBody']);
        $diret =dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]);
        $reurl=$diret.'/wximages/'.$filename;
        return  $reurl;
}
function getAccessToken() {
   // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
   $data = json_decode(file_get_contents("access_token.json"));
   if ($data->expire_time < time()) {
     // 如果是企业号用以下URL获取access_token
     // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
     $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxa832dc06778e6011&secret=a88d1b39ca8319fbba602ed240e29945";
     $res = json_decode($this->httpGet($url));
     $access_token = $res->access_token;
     if ($access_token) {
       $data->expire_time = time() + 7000;
       $data->access_token = $access_token;
       $fp = fopen("access_token.json", "w");
       fwrite($fp, json_encode($data));
       fclose($fp);
     }
   } else {
     $access_token = $data->access_token;
   }
   return $access_token;
 }
 function httpGet($url) {
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_TIMEOUT, 500);
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
     curl_setopt($curl, CURLOPT_URL, $url);

     $res = curl_exec($curl);
     curl_close($curl);

     return $res;
   }

$access_token = getAccessToken();
 
//下载图片
// $mediaid ='2zi9oB5wj0KfoXo_02qhIafSD4jcxF7YhrzvE_GDmrGoJhl7-1qNWA310uwEbdlK';
$mediaid = $_POST['mid'];
$url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$access_token&media_id=$mediaid";
$imgurl = saveMedia($url);
echo json_encode($imgurl);
?>