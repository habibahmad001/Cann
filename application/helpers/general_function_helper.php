<?php 
function selectedLink($link, $selectedLink){
	
	if($link == $selectedLink){
		return  'class="selected"';	
	}
	
	return '';
}
function getMessage($MessageID){
	
	$CI = & get_instance();
	$messageData = '';
	if((bool)($CI->session->userdata($MessageID)) == TRUE){
		$messageData = $CI->session->userdata($MessageID);
		$CI->session->unset_userdata($MessageID);
	}
	
	return $messageData;
}
function paginationList(){
	
	$CI = & get_instance();	
	$perPage = $CI->session->userdata('recordsPerPage');
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';
	
	switch($perPage){
		
		case 20:
			$option1 = 'selected';
		break;
		
		case 50:
			$option2 = 'selected';
		break;
		
		case 100:
			$option3 = 'selected';
		break;
		
		case 200:
			$option4 = 'selected';
		break;
		
		case 500:
			$option5 = 'selected';
		break;
	}
	
	return '
			<select name="records_per_page" id="records_per_page" style="margin:6px 4px 0 0; border: 1px solid #CCCCCC; width: 50px;" onchange="changeRecordsPerPage();">
				<option value="20" '.$option1.'>20</option>
				<option value="50" '.$option2.'>50</option>
				<option value="100" '.$option3.'>100</option>
				<option value="200" '.$option4.'>200</option>
				<option value="500" '.$option5.'>500</option>
			</select>
			<input type="hidden" id="base___URL"  value="'.base_url().'"/>
			';
}
function displayDate($date){
	
	$count = 0;
	$tok = strtok($date, "-");	
	$year = $tok;
	while ($tok !== false) {
		$count++;	
		$tok = strtok("-");
		if($count == 1){
			$month = $tok;	
		}
		else{
			$day = $tok;
			break;	
		}
	}	
	
	$month_code = $month;
	switch($month_code){
		case '01':
			$month = 'Janurary';
		break;
		
		case '02':
			$month = 'Feburary';
		break;
		
		case '03':
			$month = 'March';
		break;
		
		case '04':
			$month = 'April';
		break;
		
		case '05':
			$month = 'May';
		break;
		
		case '06':
			$month = 'June';
		break;
		
		case '07':
			$month = 'July';
		break;
		
		case '08':
			$month = 'August';
		break;
		
		case '09':
			$month = 'September';
		break;
		
		case '10':
			$month = 'October';
		break;
		
		case '11':
			$month = 'November';
		break;
		
		case '12':
			$month = 'December';
		break;	
	}
	
	return $day.', '.$month.' '.$year;
	
}
function showStatus($currentStatus){
	
	if($currentStatus == 'YES'){
		return '<img src="'.base_url().'public/admin/images/check.png">Enabled';
	}
	
	return '<img src="'.base_url().'public/admin/images/uncheck.png">Disabled';
}
function setMessage($MessageID, $Message){
	
	$CI = & get_instance();
		
	$sessData = array($MessageID => $Message);
	$CI->session->set_userdata($sessData);
}
function getCurrentDate(){
	
	date_default_timezone_set('Asia/Karachi');
	
	return date('Y-m-d');
}
function getCurrentTime(){
	
	date_default_timezone_set('Asia/Karachi');
	
	return date('h:i A', time());
}
function getCurrentTimesec(){
	
	date_default_timezone_set('Asia/Karachi');
	
	return date('h:i:s', time());
}
function initializeImageSettings(){
	
	$CI = & get_instance();
	$imagePath = '../public/bt-uploads/';
	
	$config['upload_path'] = realpath(APPPATH . $imagePath);
	$config['allowed_types'] = 'gif|jpg|png';	//type of images allow to upload
	$config['max_size']	= 0;					// 0 stand for upload image size is maximum########### or give size of image you want allow
	$config['max_width']  = 0;
	$config['max_height']  = 0;
	$config['encrypt_name'] = 0;
	$CI->upload->initialize($config);	
}
function resize_image($image_name, $new_directory, $newWidth, $newHeight){
	
	$CI = & get_instance();
	$imagePath = '../public/bt-uploads/';
	
	$config_img = array();
	$config_img['image_library'] = 'gd2';
	$config_img['source_image'] = realpath(APPPATH . $imagePath . $image_name);
	
	if($new_directory != ''){
	   $config_img['new_image'] = realpath(APPPATH . $imagePath.$new_directory.'/');
	}
	
	$config_img['maintain_ratio'] = TRUE;
	$config_img['width'] = $newWidth;
	if($newHeight > 0){
		$config_img['height'] = $newHeight;
	}
	
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;
	
	$CI->image_lib->initialize($config_img);
	
	if ( ! $CI->image_lib->resize()){
	  return false;
	}
	
	return true;
}
function Email_Template($mailBody){
	
	$CI = & get_instance();
	
	$emailHeader = '<div style="background:#F1F2F6; width:1000px; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;"><a href="'.base_url().'"><img src="'.base_url().'public/images/logo.png'.'"></a></div>';
	
	$emailFooter = '<div style="padding:10px; background:#F1F2F6; width:1000px;  color:#374953; font-family: arial,sans-serif;">
						<hr color="#CCCCCC">
						<div align="center"><a href="'.base_url().'">'.$CI->project_model->projectName().'</a> powered by <a href="http://www.hiconint.com/">Hicon Soft</a></div>
					</div>';
	
	return $emailHeader.'<div style="padding:10px; background:#F1F2F6;  width:1000px;  color:#374953; font-family: arial,sans-serif;">'.$mailBody.'</div>'.$emailFooter;
}

function removeImage($imageName){
	
	$imagePath = '../public/bt-uploads/';
	
	unlink(realpath(APPPATH.$imagePath.'/'.$imageName));
	unlink(realpath(APPPATH.$imagePath.'medium'.'/'.$imageName));
	unlink(realpath(APPPATH.$imagePath.'thumbs'.'/'.$imageName));
}
function shortDescription($string, $numberOfWords, $readMoreLink){
	
	$stringtArray = preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY);
	
	$arraySize  = sizeof($stringtArray);
	
	$newString = '';
	
	if($arraySize > $numberOfWords){
		
		for($i=0; $i<$numberOfWords; $i++){
			$newString.= $stringtArray[$i];	
		}
		
		return $newString.$readMoreLink;
	}
	
	return $string;
		
}

//////////////// check user login ////////////////
function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata['default'];
    if (!isset($user)) { return false; } else { return true; }
}
//////////////// check user login ////////////////
function isNumber($Value){
 
 if(preg_match('/^\d+$/',$Value)) {
   return true;
 } 
 
 return false;
}

?>