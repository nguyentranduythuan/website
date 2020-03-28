<?php 

function _upload_file_name($filename,$ext = false) 
{
	$filet = uniqid(rand(1000000, 10000000));
	switch(strtolower(substr($filename, -4, 4)))
	{
		case '.mov': $file = '.mov';	break;
		case '.wmv': $file = '.wmv';	break;
		case '.avi': $file = '.avi';	break;
		case '.3gp': $file = '.3gp';	break;
		case '.mp4': $file = '.mp4';	break;
		case '.flv': $file = '.flv';	break;
		case '.f4v': $file = '.f4v';	break;
		case '.jpg':
		case 'jpeg': $file = '.jpg';	break;
		case '.png': $file = '.png';	break;
		default:
			$file = '';
	}

	if(!empty($file))
	{
		if($ext == true)
			$file = $file;
		else
			$file = $filet.$file;
		return $file;
	}

	$file = $filet;
	
	return $file;
}

function checkValidatePhoneNumber($phone = "")
{
    //if(preg_match("/^[0]{1}[1-9]{9}|[0]{1}[1]{1}[1-9]{9}$/", $phone))
    if(preg_match("/^(84|0)(\d{9})$/", $phone))
    {
        return true;
    }
    return false;
}

function checkValidateEmail($email = "")
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
        return true;
    else
        return false;
}

function formatCurrency($money = "", $ext = "VNĐ")
{
    if(is_decimal($money))
    {
        return number_format($money,3,".",","). " ".$ext;
    }
    else
    {
        return number_format($money,0,".",","). " ".$ext;   
    }
}

function getCurrencyText($n)
{
    return VndText($n);
}
function VndText($amount)
{
    if($amount <=0)
    {
        return $textnumber = "Tiền phải là số nguyên dương lớn hơn số 0";
    }
    $Text=array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
    $TextLuythua =array("","nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
    $textnumber = "";
    $length = strlen($amount);
    
    for ($i = 0; $i < $length; $i++)
    $unread[$i] = 0;
    
    for ($i = 0; $i < $length; $i++)
    {               
        $so = substr($amount, $length - $i -1 , 1);                
        
        if ( ($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)){
            for ($j = $i+1 ; $j < $length ; $j ++)
            {
                $so1 = substr($amount,$length - $j -1, 1);
                if ($so1 != 0)
                    break;
            }                       
                   
            if (intval(($j - $i )/3) > 0){
                for ($k = $i ; $k <intval(($j-$i)/3)*3 + $i; $k++)
                    $unread[$k] =1;
            }
        }
    }
    
    for ($i = 0; $i < $length; $i++)
    {        
        $so = substr($amount,$length - $i -1, 1);       
        if ($unread[$i] ==1)
        continue;
        
        if ( ($i% 3 == 0) && ($i > 0))
        $textnumber = $TextLuythua[$i/3] ." ". $textnumber;     
        
        if ($i % 3 == 2 )
        $textnumber = 'trăm ' . $textnumber;
        
        if ($i % 3 == 1)
        $textnumber = 'mươi ' . $textnumber;
        
        
        $textnumber = $Text[$so] ." ". $textnumber;
    }
    
    //Phai de cac ham replace theo dung thu tu nhu the nay
    $textnumber = str_replace("không mươi", "lẻ", $textnumber);
    $textnumber = str_replace("lẻ không", "", $textnumber);
    $textnumber = str_replace("mươi không", "mươi", $textnumber);
    $textnumber = str_replace("một mươi", "mười", $textnumber);
    $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
    $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
    $textnumber = str_replace("mười năm", "mười lăm", $textnumber);
    
    return ucfirst($textnumber." đồng chẵn");
}

function is_decimal( $val )
{
    return is_numeric( $val ) && floor( $val ) != $val;
}
function getIP(){
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else 
    if(isset($_SERVER['REMOTE_ADDR'])) 
        $ip = $_SERVER['REMOTE_ADDR'];
    else 
        $ip = "UNKNOWN";
    return $ip;
}

function getTimePost($time)
{
    return date("d/m/Y H:i", strtotime($time));
}
function makeRandomTokenKey()
{
    $random_string = md5(microtime());

    return $random_string;
}
function makePasswordRandom()
{
    $code = quickRandom(6);

    return $code;
}
function quickRandom($length = 16)
{
    $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
}
function getAvatar($avatar)
{
    $link = \Config::get('constants.LINK_AVATAR');
    if(!empty($avatar))
    {
        return $link.$avatar;
    }
    else
    {
        return $link."avatar.png";
    }
}

function createdFolderAvatar()
{
    $dir = \Config::get('constants.DIR_AVATAR');
    $dir_final = public_path($dir);
    
    if (!file_exists($dir_final)) {
       mkdir($dir_final, 0777, true);
    }

    $folder = date("Y");
    if (!file_exists($dir_final.$folder)) {
       mkdir($dir_final.$folder, 0777, true);
    }
    $folder .= "/".date("m");
    if (!file_exists($dir_final.$folder)) {
       mkdir($dir_final.$folder, 0777, true);
    }
    return array("dir_final"=>$dir_final, "folder"=>$folder);
}

function createdFolderFileDownload()
{
    $dir = \Config::get('constants.DIR_FILE_EXPORT');
    $dir_final = public_path($dir);
    
    if (!file_exists($dir_final)) {
       mkdir($dir_final, 0777, true);
    }

    $folder = "tmp";
    if (!file_exists($dir_final.$folder)) {
       mkdir($dir_final.$folder, 0777, true);
    }
    return array("dir_final"=>$dir_final, "folder"=>$folder);
}

function getFileSize($byte)
{
    return round($byte / 1024 / 1024, 3);
}

function getTypeFile($extension)
{
    if($extension == "mp4")
    {
        return 1;
    }
    else if(in_array($extension, array("png", "jpg", "gif", "jpeg")))
    {
        return 0;
    }
    else
    {
        return 2;
    }
}

function customRequestCaptcha(){
    return new \ReCaptcha\RequestMethod\Post();
}

function stripAccents($stripAccents){
  return strtr($stripAccents,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function v2e($value){
    #---------------------------------SPECIAL   
    $value = str_replace("&quot;","", $value);  
    //$value = str_replace(".","", $value);
    $value = str_replace("=","", $value);
    $value = str_replace("+","", $value);
    $value = str_replace("!","", $value);
    $value = str_replace("@","", $value);
    $value = str_replace("#","", $value);
    $value = str_replace("$","", $value);
    $value = str_replace("%","", $value);   
    $value = str_replace("^","", $value);   
    $value = str_replace("&","", $value);   
    $value = str_replace("*","", $value);   
    $value = str_replace("(","", $value);   
    $value = str_replace(")","", $value);   
    $value = str_replace("`","", $value);   
    $value = str_replace("~","", $value);   
    $value = str_replace(",","", $value);
    $value = str_replace("/","", $value);   
    $value = str_replace("\\","", $value);  
    $value = str_replace('"',"", $value);   
    $value = str_replace("'","", $value);   
    $value = str_replace(":","", $value);   
    $value = str_replace(";","", $value);   
    $value = str_replace("|","", $value);   
    $value = str_replace("[","", $value);   
    $value = str_replace("]","", $value);   
    $value = str_replace("{","", $value);   
    $value = str_replace("}","", $value);   
    $value = str_replace("(","", $value);   
    $value = str_replace(")","", $value);       
    $value = str_replace("?","", $value);
    #---------------------------------a^

    $value = str_replace("â", "a", $value); 
    $value = str_replace("ấ", "a", $value);
    $value = str_replace("ầ", "a", $value);
    $value = str_replace("ẩ", "a", $value);
    $value = str_replace("ẫ", "a", $value);
    $value = str_replace("ậ", "a", $value);
    #---------------------------------A^

    $value = str_replace("Â", "a", $value); 
    $value = str_replace("Ấ", "a", $value);
    $value = str_replace("Ầ", "a", $value);
    $value = str_replace("Ẩ", "a", $value);
    $value = str_replace("Ẫ", "a", $value);
    $value = str_replace("Ậ", "a", $value);
    #---------------------------------a

    $value = str_replace("á", "a", $value);
    $value = str_replace("à", "a", $value);
    $value = str_replace("ả", "a", $value);
    $value = str_replace("ã", "a", $value);
    $value = str_replace("ạ", "a", $value);
    #---------------------------------A

    $value = str_replace("Á", "a", $value);
    $value = str_replace("À", "a", $value);
    $value = str_replace("Ả", "a", $value);
    $value = str_replace("Ã", "a", $value);
    $value = str_replace("Ạ", "a", $value);
    #---------------------------------a(

    $value = str_replace("ă", "a", $value); 
    $value = str_replace("ắ", "a", $value);
    $value = str_replace("ằ","a", $value);
    $value = str_replace("ẳ", "a", $value);
    $value = str_replace("ẵ","a", $value);
    $value = str_replace("ặ", "a", $value);
    #---------------------------------A(

    $value = str_replace("Ă", "a", $value);
    $value = str_replace("Ắ", "a", $value);
    $value = str_replace("Ằ", "a", $value);
    $value = str_replace("Ẳ", "a", $value);
    $value = str_replace("Ẵ", "a", $value);
    $value = str_replace("Ặ", "a", $value);
    $value = str_replace("Ă", "a", $value);
    #---------------------------------e^

    $value = str_replace("ê", "e", $value); 
    $value = str_replace("ế", "e", $value);
    $value = str_replace("ề", "e", $value);
    $value = str_replace("ể", "e", $value);
    $value = str_replace("ễ", "e", $value);
    $value = str_replace("ệ", "e", $value);
    #---------------------------------E^

    $value = str_replace("Ê", "e", $value); 
    $value = str_replace("Ế", "e", $value);
    $value = str_replace("Ề", "e", $value);
    $value = str_replace("Ể", "e", $value);
    $value = str_replace("Ễ", "e", $value);
    $value = str_replace("Ệ", "e", $value);
    #---------------------------------e

    $value = str_replace("é","e", $value);
    $value = str_replace("è", "e", $value);
    $value = str_replace("ẻ", "e", $value);
    $value = str_replace("ẽ", "e", $value);
    $value = str_replace("ẹ", "e", $value);
    #---------------------------------E

    $value = str_replace("É", "e", $value);
    $value = str_replace("È", "e", $value);
    $value = str_replace("Ẻ", "e", $value);
    $value = str_replace("Ẽ", "e", $value);
    $value = str_replace("Ẹ", "e", $value);
    #---------------------------------i

    $value = str_replace("í", "i", $value);
    $value = str_replace("ì", "i", $value);
    $value = str_replace("ỉ", "i", $value);
    $value = str_replace("ĩ", "i", $value);
    $value = str_replace("ị", "i", $value);
    #---------------------------------I

    $value = str_replace("Í", "i", $value);
    $value = str_replace("Í", "i", $value);
    $value = str_replace("Ỉ", "i", $value);
    $value = str_replace("Ĩ", "i", $value);
    $value = str_replace("Ị", "i", $value);
    #---------------------------------o^

    $value = str_replace("ô", "o", $value); 
    $value = str_replace("ố", "o", $value);
    $value = str_replace("ồ", "o", $value);
    $value = str_replace("ổ", "o", $value);
    $value = str_replace("ỗ", "o", $value);
    $value = str_replace("ộ", "o", $value);
    #---------------------------------O^

    $value = str_replace("Ô", "o", $value); 
    $value = str_replace("Ố", "o", $value);
    $value = str_replace("Ồ", "o", $value);
    $value = str_replace("Ổ", "o", $value);
    $value = str_replace("Ỗ", "o", $value);
    $value = str_replace("Ộ", "o", $value);
    #---------------------------------o*

    $value = str_replace("ơ", "o", $value); 
    $value = str_replace("ớ", "o", $value);
    $value = str_replace("ờ", "o", $value);
    $value = str_replace("ở", "o", $value);
    $value = str_replace("ỡ", "o", $value);
    $value = str_replace("ợ", "o", $value);
    #---------------------------------O*

    $value = str_replace("Ơ", "o", $value); 
    $value = str_replace("Ớ", "o", $value);
    $value = str_replace("Ờ", "o", $value);
    $value = str_replace("Ở", "o", $value);
    $value = str_replace("Ỡ", "o", $value);
    $value = str_replace("Ợ", "o", $value);
    #---------------------------------u*

    $value = str_replace("ư", "u", $value); 
    $value = str_replace("ứ", "u", $value);
    $value = str_replace("ừ", "u", $value);
    $value = str_replace("ử", "u", $value);
    $value = str_replace("ữ", "u", $value);
    $value = str_replace("ự", "u", $value);
    #---------------------------------U*

    $value = str_replace("Ư", "u", $value); 
    $value = str_replace("Ứ", "u", $value);
    $value = str_replace("Ừ", "u", $value);
    $value = str_replace("Ử", "u", $value);
    $value = str_replace("Ữ", "u", $value);
    $value = str_replace("Ự", "u", $value);
    #---------------------------------y

    $value = str_replace("ý", "y", $value);
    $value = str_replace("ỳ", "y", $value);
    $value = str_replace("ỷ", "y", $value);
    $value = str_replace("ỹ", "y", $value);
    $value = str_replace("ỵ", "y", $value);
    #---------------------------------Y

    $value = str_replace("Ý", "y", $value);
    $value = str_replace("Ỳ", "y", $value);
    $value = str_replace("Ỷ", "y", $value);
    $value = str_replace("Ỹ", "y", $value);
    $value = str_replace("Ỵ", "y", $value);
    #---------------------------------DD

    $value = str_replace("Đ", "d", $value);     
    $value = str_replace("đ", "d", $value);
    #---------------------------------o

    $value = str_replace("ó", "o", $value);
    $value = str_replace("ò", "o", $value);
    $value = str_replace("ỏ", "o", $value);
    $value = str_replace("õ", "o", $value);
    $value = str_replace("ọ", "o", $value);
    #---------------------------------O

    $value = str_replace("Ó", "o", $value);
    $value = str_replace("Ò", "o", $value);
    $value = str_replace("Ỏ", "o", $value);
    $value = str_replace("Õ", "o", $value);
    $value = str_replace("Ọ", "o", $value);
    #---------------------------------u

    $value = str_replace("ú", "u", $value);
    $value = str_replace("ù", "u", $value);
    $value = str_replace("ủ", "u", $value);
    $value = str_replace("ũ", "u", $value);
    $value = str_replace("ụ", "u", $value);
    #---------------------------------U

    $value = str_replace("Ú", "u", $value);
    $value = str_replace("Ù", "u", $value);
    $value = str_replace("Ủ", "u", $value);
    $value = str_replace("Ũ", "u", $value);
    $value = str_replace("Ụ", "u", $value);
    #---------------------------------

    return $value;
}

function v2eQuery($query)
{
    $query = v2e($query);
    $query = str_replace(" ", "+", $query);

    return $query;
}

function getSEODescription($link)
{
    $content = "Chứng nhận bất động sản sạch là một trong những chức năng chính của dự án Bất Động Sản Sạch.";

    return $content;
}

function getSEOKeyword($link)
{
    $content = "batdongsan, dat sach, nha sach, giay to sach, legalkit, chứng nhận bdss, chung nhan bdss";

    return $content;
}

function struuid($entropy)
{
    $s=uniqid("",$entropy);
    $num= hexdec(str_replace(".","",(string)$s));
    $index = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base= strlen($index);
    $out = '';
        for($t = floor(log10($num) / log10($base)); $t >= 0; $t--) {
            $a = floor($num / pow($base,$t));
            $out = $out.substr($index,$a,1);
            $num = $num-($a*pow($base,$t));
        }
    return $out;
}

function getIDLogin($id)
{
    return "BDSS".d6($id);
}

function d6($id)
{
    if($id < 10)
    {
        return "00000".$id;
    }
    else if($id < 100)
    {
        return "0000".$id;
    }
    else if($id < 1000)
    {
        return "000".$id;
    }
    else if($id < 10000)
    {
        return "00".$id;
    }
    else if($id < 100000)
    {
        return "0".$id;
    }
    else
    {
        return $id;   
    }
}

function getPhoneNumber($phone)
{
    $phone = explode("\n", $phone);
    $phone = $phone[0];
    $phone = explode("/", $phone);
    $phone = trim($phone[0]);
    $phone = str_replace(" ", "", $phone);
    $phone = str_replace(".", "", $phone);
    $phone = str_replace("(+84)", "", $phone);
    $phone = str_replace("+84", "", $phone);
    if(strlen($phone) == 10)
    {
        return $phone;
    }
    else if(strlen($phone) == 9)
    {
        if($phone[0] == 0)
        {
            return "";
        }
        else
        {
            $phone = "0".$phone;

            return $phone;
        }
    }
    else  if(strlen($phone) > 10 && $phone[0] > 0)
    {
        $phone = "0".$phone;

        return $phone;
    }

    return "";
}

//Vietnamese-mobile-carrier

$GLOBALS["carriers_number"] = [
    '096' => 'Viettel',
    '097' => 'Viettel',
    '098' => 'Viettel',
    '032' => 'Viettel',
    '033' => 'Viettel',
    '034' => 'Viettel',
    '035' => 'Viettel',
    '036' => 'Viettel',
    '037' => 'Viettel',
    '038' => 'Viettel',
    '039' => 'Viettel',
    '086' => 'Viettel',

    '089' => 'Mobifone',
    '090' => 'Mobifone',
    '093' => 'Mobifone',
    '070' => 'Mobifone',
    '071' => 'Mobifone',
    '072' => 'Mobifone',
    '076' => 'Mobifone',
    '078' => 'Mobifone',

    '091' => 'Vinaphone',
    '094' => 'Vinaphone',
    '083' => 'Vinaphone',
    '084' => 'Vinaphone',
    '085' => 'Vinaphone',
    '087' => 'Vinaphone',
    '088' => 'Vinaphone',
    '081' => 'Vinaphone',
    '082' => 'Vinaphone',

    '099' => 'Gmobile',
    '059' => 'Gmobile',

    '092' => 'Vietnamobile',
    '056' => 'Vietnamobile',
    '058' => 'Vietnamobile',

    '095'  => 'SFone'
];
/**
 * Check if a string is started with another string
 *
 * @param string $needle The string being searched for.
 * @param string $haystack The string being searched
 * @return bool true if $haystack is started with $needle
 */
function start_with($needle, $haystack) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

/**
 * Detect carrier name by phone number
 *
 * @param string $number The input phone number
 * @return bool Name of the carrier, false if not found
 */
function getCarrier ($number) {
    $number = str_replace(array('-', '.', ' '), '', $number);

    // $number is not a phone number
    if (!preg_match('/^0[0-9]{9}$/', $number)) return false;
    
    // Store all start number in an array to search
    $start_numbers = array_keys($GLOBALS["carriers_number"]);

    foreach ($start_numbers as $start_number) {
        // if $start number found in $number then return value of $carriers_number array as carrier name
        if (start_with($start_number, $number)) {
            return $GLOBALS["carriers_number"][$start_number];
        }
    }

    // if not found, return false
    return false;
}

function getMessagErrorWithCode($code)
{
    $message = \Config::get('constants.MESSAGE_RESPONSE_SMS');
    if($code >= 0 && $code < count($message))
    {
        return $message[$code];
    }

    return $message[1];
}
?>