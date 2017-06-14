<?php
include("PHPCrawl/libs/PHPCrawler.class.php");
class SBCrawler extends PHPCrawler { 
 function handleDocumentInfo(PHPCrawlerDocumentInfo $p){ 
  $pageurl= $p->url;
  $status = $p->http_status_code;
  $source = $p->source;
  if($status==200 && $source!=""){
   // Got Page Successfully
   echo $pageurl."<br/>";
   flush();
  }
 }
}
function crawl($u){
 $C = new SBCrawler();
 $C->setURL($u);
 $C->addContentTypeReceiveRule("#text/html#");
 $C->addURLFilterRule("#(jpg|gif|png|pdf|jpeg|svg|css|js)$# i"); /* We don't want to crawl non HTML pages */
 $C->setTrafficLimit(2000 * 1024);
 $C->obeyRobotsTxt(true); /* Should We follow robots.txt */
 $C->go();
}
if(isset($crawlURL)){
 crawl($crawlURL);
}