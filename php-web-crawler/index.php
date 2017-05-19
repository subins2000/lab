<?php
require_once __DIR__ . "/../inc/load.php";
init(12);
?>
<!DOCTYPE html>
<html>
 <head>
   <?php head();?>
  <title>Web Crawler in PHP</title>
  <?php include('../inc/track.php');?>
 </head>
 <body>
 <?php top();?>
  <div class="container" id="content">
   
   <form action="index.php" method="POST">
    URL : <input name="url" size="35" placeholder="//www.subinsb.com"/>
    <input type="submit" name="submit" value="Start Crawling"/>
   </form>
   <br/>
   <b>The URL's you submit for crawling are recorded.</b><br/>See All Crawled URL's <a href="url-crawled.html">here</a>.
   <?php
   include("simple_html_dom.php");
   $crawled_urls=array();
   $found_urls=array();
   function rel2abs($rel, $base){
    if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;
    if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;
    extract(parse_url($base));
    $path = preg_replace('#/[^/]*$#', '', $path);
    if ($rel[0] == '/') $path = '';
    $abs = "$host$path/$rel";
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for($n=1; $n>0;$abs=preg_replace($re,'/', $abs,-1,$n)){}
    $abs=str_replace("../","",$abs);
    return $scheme.'://'.$abs;
   }
   function perfect_url($u,$b){
    $bp=parse_url($b);
    if((isset($bp['path']) && $bp['path']!="/" && $bp['path']!="") || !isset($bp['path']) || $bp['path']==''){
     if($bp['scheme']==""){$scheme="http";}else{$scheme=$bp['scheme'];}
     $b=$scheme."://".$bp['host']."/";
    }
    if(substr($u,0,2)=="//"){
     $u="http:".$u;
    }
    if(substr($u,0,4)!="http"){
     $u=rel2abs($u,$b);
    }
    return $u;
   }
   function crawl_site($u){
    global $crawled_urls, $found_urls;
    $uen=urlencode($u);
    if((array_key_exists($uen,$crawled_urls)==0 || $crawled_urls[$uen] < date("YmdHis",strtotime('-25 seconds', time())))){
     $html = file_get_html($u);
     $crawled_urls[$uen]=date("YmdHis");
     foreach($html->find("a") as $li){
      $url=perfect_url($li->href,$u);
      $enurl=urlencode($url);
      if($url!='' && substr($url,0,4)!="mail" && substr($url,0,4)!="java" && array_key_exists($enurl,$found_urls)==0){
       $found_urls[$enurl]=1;
       echo "<li><a target='_blank' href='".$url."'>".$url."</a></li>";
      }
     }
    }
   }
   if(isset($_POST['submit'])){
    $url=$_POST['url'];
    function isDomainAvailible($domain){
     if(!filter_var($domain, FILTER_VALIDATE_URL)){
      return false;
     }
     $curlInit = curl_init($domain);
     curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
     curl_setopt($curlInit,CURLOPT_HEADER,true);
     curl_setopt($curlInit,CURLOPT_NOBODY,true);
     curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
     $response = curl_exec($curlInit);
     curl_close($curlInit);
     if ($response) return true;
     return false;
    }
    if(!isDomainAvailible($url)){
     echo "<h2>A valid URL please.</h2>The URL you gave me was unable to access.";
    }else{
     if(substr($url,0,7) != "ht"."tp://" && substr($url,0,8)!="https://"){
      $url="//".$url;
     }
     $f=fopen("url-crawled.html","a+");
     fwrite($f,"<div><a href='$url'>$url</a> - ".date("Y-m-d H:i:s")."</div>");
     fclose($f);
     echo "<h2>Result - URL's Found</h2><ul style='word-wrap: break-word;width: 400px;line-height: 25px;'>";
     crawl_site($url);
     echo "</ul>";
    }
   }
   ?>
  </div>
  <style>
  input{
   border:none;
   padding:8px;
  }
  </style>
  <?php
  
  footer();
  ?>
 </body>
</html>
