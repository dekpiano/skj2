
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Timeago {
  

		function timeAgo_e($time_ago)
		{
		    $time_ago = strtotime($time_ago);
		    $cur_time   = time();
		    $time_elapsed   = $cur_time - $time_ago;
		    $seconds    = $time_elapsed ;
		    $minutes    = round($time_elapsed / 60 );
		    $hours      = round($time_elapsed / 3600);
		    $days       = round($time_elapsed / 86400 );
		    $weeks      = round($time_elapsed / 604800);
		    $months     = round($time_elapsed / 2600640 );
		    $years      = round($time_elapsed / 31207680 );
		    // Seconds
		    if($seconds <= 60){
		        return "just now";
		    }
		    //Minutes
		    else if($minutes <=60){
		        if($minutes==1){
		            return "one minute ago";
		        }
		        else{
		            return "$minutes minutes ago";
		        }
		    }
		    //Hours
		    else if($hours <=24){
		        if($hours==1){
		            return "an hour ago";
		        }else{
		            return "$hours hrs ago";
		        }
		    }
		    //Days
		    else if($days <= 7){
		        if($days==1){
		            return "yesterday";
		        }else{
		            return "$days days ago";
		        }
		    }
		    //Weeks
		    else if($weeks <= 4.3){
		        if($weeks==1){
		            return "a week ago";
		        }else{
		            return "$weeks weeks ago";
		        }
		    }
		    //Months
		    else if($months <=12){
		        if($months==1){
		            return "a month ago";
		        }else{
		            return "$months months ago";
		        }
		    }
		    //Years
		    else{
		        if($years==1){
		            return "one year ago";
		        }else{
		            return "$years years ago";
		        }
		    }
		}

		function timeAgo_T($time_ago)
		{
		    $time_ago = strtotime($time_ago);
		    $cur_time   = time();
		    $time_elapsed   = $cur_time - $time_ago;
		    $seconds    = $time_elapsed ;
		    $minutes    = round($time_elapsed / 60 );
		    $hours      = round($time_elapsed / 3600);
		    $days       = round($time_elapsed / 86400 );
		    $weeks      = round($time_elapsed / 604800);
		    $months     = round($time_elapsed / 2600640 );
		    $years      = round($time_elapsed / 31207680 );
		    // Seconds
		    if($seconds <= 60){
		        return "just now";
		    }
		    //Minutes
		    else if($minutes <=60){
		        if($minutes==1){
		            return "1 นาทีที่แล้ว";
		        }
		        else{
		            return "$minutes นาทีที่แล้ว";
		        }
		    }
		    //Hours
		    else if($hours <=24){
		        if($hours==1){
		            return "ชั่วโมงที่ผ่านมา";
		        }else{
		            return "$hours ชั่วโมงที่ผ่านมา";
		        }
		    }
		    //Days
		    else if($days <= 7){
		        if($days==1){
		            return "เมื่อวาน";
		        }else{
		            return "$days วันที่ผ่านมา";
		        }
		    }
		    //Weeks
		    else if($weeks <= 4.3){
		        if($weeks==1){
		            return "สัปดาห์ที่ผ่านมา";
		        }else{
		            return "$weeks สัปดาห์ที่ผ่านมา";
		        }
		    }
		    //Months
		    else if($months <=12){
		        if($months==1){
		            return "เดือนที่ผ่านมา";
		        }else{
		            return "$months เดือนที่ผ่านมา";
		        }
		    }
		    //Years
		    else{
		        if($years==1){
		            return "1 ปีที่ผ่านมา";
		        }else{
		            return "$years ปีที่ผ่านมา";
		        }
		    }
		}
    
	function getAge($birthday) {
		$then = strtotime($birthday);
		return(floor((time()-$then)/31556926));
	}



}