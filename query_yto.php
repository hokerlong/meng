<?php
  require_once("simple_html_dom.php");
  date_default_timezone_set("Asia/Shanghai");
  function array_rpush($tarArray, $value)
  {
    $retArray = array();
    array_push($retArray, $value);
    foreach($tarArray as $row)
    {
      array_push($retArray, $row);
    }
    $tarArray = $retArray;
    return $tarArray;
  }
  $ytoid = strtoupper($_GET["ytoid"]);
  $return_type = strtolower($_GET["r"]);
  
  $arrTrans = array();
  //$url = "http://jingang.yto56.com.cn/expws/expquery/waybillService.action?waybillNo=".$ytoid;
  $url = "http://www.kiees.cn/yto.php?wen=".$ytoid."&action=ajax";
  $ch = curl_init();
  $timeout = 5; 
  curl_setopt($ch, CURLOPT_URL, $url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $result = curl_exec($ch); 
  curl_close($ch);

  $html = str_get_html($result);

  //$status = $html->find('//*[@id="article"]/table/tbody/tr', 0)->plaintext;

  $content = str_get_html($html->find('/table', 0)->innertext);
  if (isset ($content))
  {
    $i = 0;
    foreach($content->find('tr') as $row)
    {
        if ($i++ > 1)
        {
            $line = str_get_html($row->innertext)->find('td');
            $date = str_replace("&nbsp;", " ", trim($line[1]->plaintext));
            $desc = str_replace("&nbsp;", " ", trim($line[2]->plaintext));
            $dateTime = new DateTime($date);
            list($loc) = split (' ', $desc);
            $desc = str_replace("$loc ", "", $desc);
            array_push($arrTrans, array('time' => $dateTime, 'loc' => $loc, 'desc' => $desc));
        }
    }
  }
  
    if ($return_type == "oneline")
    {
      $result = array_pop($arrTrans);
      $resultstr = $result['time']->format("Y-m-d H:i")." ".$result['loc']." ".$result['desc'];
      echo $resultstr;
    }
    else
    {
      echo json_encode($arrTrans);
    }
?>