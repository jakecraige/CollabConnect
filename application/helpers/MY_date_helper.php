<?php
  function time_ago_in_words($time)
  {
    $time = strtotime($time);
     $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
     $lengths = array("60","60","24","7","4.35","12","10");

     $now = time();

         $difference     = $now - $time;
         $tense         = "ago";

     for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
         $difference /= $lengths[$j];
     }

     $difference = round($difference);

     if($difference != 1) {
         $periods[$j].= "s";
     }

     return "$difference $periods[$j] ago";
  }
  function current_datetime()
  {
    return date('Y-m-d H:i:s');
  }
?>