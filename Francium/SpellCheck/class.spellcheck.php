<?php
namespace Fr;

/**
.---------------------------------------------------------------------------.
| The Francium Project                                                      |
| ------------------------------------------------------------------------- |
| This software logSys is a part of the Francium (Fr) project.              |
| //subinsb.com/the-francium-project                                   |
| ------------------------------------------------------------------------- |
|     Author: Subin Siby                                                    |
| Copyright (c) 2014 - 2015, Subin Siby. All Rights Reserved.               |
| ------------------------------------------------------------------------- |
|   License: Distributed under the General Public License (GPL)             |
|            //www.gnu.org/licenses/gpl-3.0.html                       |
| This program is distributed in the hope that it will be useful - WITHOUT  |
| ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or     |
| FITNESS FOR A PARTICULAR PURPOSE.                                         |
'---------------------------------------------------------------------------'
*/

/**
.---------------------------------------------------------------------------.
|  Software: SpellCheck                                                     |
|   Version: 0.1 (2015-05-05)                                               |
|   Contact: //github.com/subins2000/francium-spellcheck               |
|   Documentation: https://subinsb.com/add-spell-check-using-google         |
|   Support: //github.com/subins2000/francium-spellcheck/issues        |
'---------------------------------------------------------------------------'
*/

ini_set("display_errors", "on");

class SC {

  /**
   * ------------
   * BEGIN CONFIG
   * ------------
   * Edit the configuraion
   */
  
  public static $default_config = array(
    /**
     * Information about who uses logSys
     */
    "info" => array(
      "company" => "My Site",
      "email" => "mail@subinsb.com"
    ),
    
    "request_url" => "https://translate.google.com/translate_a/single"
  );
  
  /* ------------
   * END Config.
   * ------------
   * No more editing after this line.
   */
  
  public static $config = array();
  private static $constructed = false;
  
  /**
   * Merge user config and default config
   */
  public static function config(){
    self::$config = array_merge(self::$default_config, self::$config);
  }
  
  /**
   * Log something in the Francium.log file.
   * To enable logging, make a file called "Francium.log" in the directory
   * where "class.logsys.php" file is situated
   */
  public static function log($msg = ""){
    $log_file = __DIR__ . "/Francium.log";
    if(file_exists($log_file)){
      if($msg != ""){
        $message = "[" . date("Y-m-d H:i:s") . "] $msg";
        $fh = fopen($log_file, 'a');
        fwrite($fh, $message . "\n");
        fclose($fh);
      }
    }
  }
  
  public static function construct(){
    self::config();
  }
  
  public function check($word){
    self::config();
    $url = self::$config['request_url'] . "?client=t&sl=en&tl=ml&hl=en&dt=bd&dt=ex&dt=ld&dt=md&dt=qc&dt=rw&dt=rm&dt=ss&dt=t&dt=at&ie=UTF-8&oe=UTF-8&otf=2&rom=1&ssel=4&tsel=3&kc=1&tk=520910|569655&q=" . urlencode(strtolower($word));
    
    $response = self::url_get_contents($url);
    
    preg_match('/u003e","(.*?)"/', $response, $matches);
    if(isset($matches[1])){
      $corrected = $matches[1];
      $corrected = str_replace('",', '', $corrected);
      return $corrected;
    }else{
      return null;
    }
  }
  
  public static function url_get_contents($url) {
    if (!function_exists('curl_init')){ 
      self::log('CURL is not installed!');
    }else{
      $ch = curl_init();
      
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $output = curl_exec($ch);
      
      if(curl_errno($ch)){
        self::log('cURL Error : ' . curl_error($ch));
        $output = false;
      }
      curl_close($ch);
      
      return $output;
    }
  }
}
