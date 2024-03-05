<?php




$json2 = 'archive.json';
$contents2 = file_get_contents($json2); 
$data = json_decode($contents2,true); 

#### get Museum Site###
$json3 = 'https://www.navanurak.in.th/museum_api/main_museums.php';
$contents3 = file_get_contents($json3); 
$data3 = json_decode($contents3,true); 

foreach ($data3 as $key3 => $value3) {
$my_museum_code = $data3[$key3]['museum_code'];
#echo "$data3[$key3]['museum_code']<br>";
#echo "$my_museum_code <br>";
}
#var_dump($result3);
### End of get Museum Site ###



foreach ($data as $key => $value) {
    #echo $data[$key]['museum_name'];
    
    $myobj = $data[$key]['obj_title'];
    $myobj = str_replace('"',' ',$myobj);
    $museum_code = $data[$key]['arc_site_id'];
    $pic_path = $data[$key]['pic_path'];
    $obj_refcode = $data[$key]['obj_refcode'];
    $obj_path = $data[$key]['obj_path'];
    $category_name = $data[$key]['cat1_name'];
    $obj_keyword = $data[$key]['obj_keyword'];
    $obj_physicals = $data[$key]['obj_physicals'];
    $obj_physicals = trim(preg_replace('/\s+/', ' ', $obj_physicals));
    $obj_physicals = str_replace('“', ' ', $obj_physicals);
    $obj_physicals = str_replace('”', ' ', $obj_physicals);
    $obj_physicals = str_replace('"', ' ', $obj_physicals);
    $obj_latitude = $data[$key]['latitude'];
    $obj_longitude = $data[$key]['longitude'];
    
   # echo "<b>$museum_code - $myobj ::</b> $obj = $obj2 = $obj3 = $obj4 $obj5 <br>";
   
   
   ## check category ###
 /* $category_name = trim($category_name);
   switch ($category_name) {
    case "พระพุทธรูป":
        $cat_id = "cat-1";
        break;
    default:
        $cat_id = "cat-0";
     }
     
    */
   ######################
    
    foreach ($data3 as $key3 => $value3) {
	$my_museum_code = $data3[$key3]['museum_code'];
	if($my_museum_code == $museum_code)
	  {
	   #echo "$my_museum_code : $my_museum_name <br>";
	   $my_museum_name = $data3[$key3]['museum_name'];
	   $my_museum_province = $data3[$key3]['province'];
	   $my_museum_ampher = $data3[$key3]['ampher'];
	   $my_museum_tambon = $data3[$key3]['tambon'];
	   $my_museum_lat = $data3[$key3]['latitude'];
	   $my_museum_lon = $data3[$key3]['longitude'];
	   $my_museum_province = trim($my_museum_province);
	   
	   
	      ## check category ###
   		/*	switch ($my_museum_province) {
   			case "ลำปาง":
        		$city_id = "city-53";
       			break;
   			case "เชียงใหม่":
        		$city_id = "city-13";
       			 break;
    		case "พระนครศรีอยุธยา":
        		$city_id = "city-34";
        		break;
    		default:
        		$city_id = "city-0";
     		}
          */
	
	  } 
	}


    
     
 
    	if($obj_refcode != $obj_refcode2)
    	{
    	  $museum_code_list = "museum-".$museum_code;
    	  
    	  if(($obj_latitude != '') and ($obj_longitude != ''))
    	  {
    	  $my_museum_lat = $obj_latitude ;
    	  $my_museum_lon = $obj_longitude;
    	  }
    	  
         ##echo "<li class=\"mix type-1 $city_id $cat_id  $museum_code_list $my_museum_name $myobj  $category_name $obj_keyword \"><a href ='$obj_path'><img src=\"$pic_path\" alt=\"Image 1\"> $myobj : $my_museum_name</a></li>\n";
          echo "          
          {\"จังหวัด\": \"$my_museum_province\", \"อำเภอ\": \"$my_museum_ampher\", \"ตำบล\": \"$my_museum_tambon\",\"ประเภท\": \"$category_name\",  \"สถานที่\": \"$my_museum_name\", \"ชื่อ\": \"$myobj\" },              
          ";
          $obj_refcode2 = $obj_refcode;
    	}
       
  
    	
   
}


?>
