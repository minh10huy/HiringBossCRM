<?php
/*********************************************************************************
 * This file is part of KReporter. KReporter is an enhancement developed
 * by Christian Knoll. All rights are (c) 2012 by Christian Knoll
 *
 * This Version of the KReporter is licensed software and may only be used in
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * witten consent of Christian Knoll
 *
 * You can contact Christian Knoll at info@kreporter.org
 *
 ********************************************************************************/
require_once('modules/KReports/json/JSON.php');

//determinate sugar version
//because sugar version could contain chars we need to strip of first char


function getImageUrl($file) {
    return ((int)substr($GLOBALS['sugar_version'], 0,1) < 6) ? getImagePath($file) : SugarThemeRegistry::current()->getImageUrl($file,false); 
}
function getImage($file) {
    return "<img src='".(((int)substr($GLOBALS['sugar_version'], 0,1) < 6) ? getImagePath($file).".gif" : SugarThemeRegistry::current()->getImageUrl($file.".gif",false))."' />";
}

/*
* Function to generate a random String we need for the joins
* GUIDs would be too long and not fit the purpose
*/
if(!function_exists("randomstring")){ 
    function randomstring(){
        $len = 10;
        $base='abcdefghjkmnpqrstwxyz';
        $max=strlen($base)-1;
        $returnstring = '';
        mt_srand((double)microtime()*1000000);
        while (strlen($returnstring)<$len+1)
            $returnstring.=$base{mt_rand(0,$max)};

        return $returnstring;

    }
}

if(!function_exists("json_decode_kinamu")){ 
    function json_decode_kinamu($json)
    { 
        if(function_exists('json_decode'))
            return json_decode($json, true);

        // bugfix 2010-8-23: problem with json in AJAX call
        if($json != '')
        {
            // Author: walidator.info 2009
            $comment = false;
            $out = '$x=';

            for ($i=0; $i<strlen($json); $i++)
            {
                if (!$comment)
                {
                    if ($json[$i] == '{' or $json[$i] == '[')        $out .= ' array(';
                    else if ($json[$i] == '}' or $json[$i] == ']')    $out .= ')';
                        else if ($json[$i] == ':')    $out .= '=>';
                            else                         $out .= $json[$i];           
                }
                else $out .= $json[$i];
                if ($json[$i] == '"')    $comment = !$comment;
            }
            eval($out . ';');
            return $x;
        }
        else 
        {
            return array();
        }
    }  
}

if(!function_exists("jarray_encode_kinamu")){ 
    function jarray_encode_kinamu($inArray)
    {
        if(!is_array($inArray))
            return '';

        // so we have an array
        foreach($inArray as $thisKey => $thisValue)
        {
            $resArray[] = "['" . $thisKey . "','" . $thisValue . "']"; 
        }
        return htmlentities('[' . implode(',', $resArray) . ']', ENT_QUOTES);
    }
}
if(!function_exists("json_encode_kinamu")){ 
    function json_encode_kinamu($input)
    {
        if(function_exists('json_encode'))
            return json_encode($input);
        else 
        {
            $json = new Services_JSON();
            return $json->encode($input);
        }
    }
}


if(!function_exists("code2utf")){ 
    function code2utf($number)
    {
        if ($number < 0)
            return FALSE;

        if ($number < 128)
            return chr($number);

        // Removing / Replacing Windows Illegals Characters
        if ($number < 160)
        {
            if ($number==128) $number=8364;
            elseif ($number==129) $number=160; // (Rayo:) #129 using no relevant sign, thus, mapped to the saved-space #160
            elseif ($number==130) $number=8218;
            elseif ($number==131) $number=402;
            elseif ($number==132) $number=8222;
            elseif ($number==133) $number=8230;
            elseif ($number==134) $number=8224;
            elseif ($number==135) $number=8225;
            elseif ($number==136) $number=710;
            elseif ($number==137) $number=8240;
            elseif ($number==138) $number=352;
            elseif ($number==139) $number=8249;
            elseif ($number==140) $number=338;
            elseif ($number==141) $number=160; // (Rayo:) #129 using no relevant sign, thus, mapped to the saved-space #160
            elseif ($number==142) $number=381;
            elseif ($number==143) $number=160; // (Rayo:) #129 using no relevant sign, thus, mapped to the saved-space #160
            elseif ($number==144) $number=160; // (Rayo:) #129 using no relevant sign, thus, mapped to the saved-space #160
            elseif ($number==145) $number=8216;
            elseif ($number==146) $number=8217;
            elseif ($number==147) $number=8220;
            elseif ($number==148) $number=8221;
            elseif ($number==149) $number=8226;
            elseif ($number==150) $number=8211;
            elseif ($number==151) $number=8212;
            elseif ($number==152) $number=732;
            elseif ($number==153) $number=8482;
            elseif ($number==154) $number=353;
            elseif ($number==155) $number=8250;
            elseif ($number==156) $number=339;
            elseif ($number==157) $number=160; // (Rayo:) #129 using no relevant sign, thus, mapped to the saved-space #160
            elseif ($number==158) $number=382;
            elseif ($number==159) $number=376;
        } //if

        if ($number < 2048)
            return chr(($number >> 6) + 192) . chr(($number & 63) + 128);
        if ($number < 65536)
            return chr(($number >> 12) + 224) . chr((($number >> 6) & 63) + 128) . chr(($number & 63) + 128);
        if ($number < 2097152)
            return chr(($number >> 18) + 240) . chr((($number >> 12) & 63) + 128) . chr((($number >> 6) & 63) + 128) . chr(($number & 63) + 128);


        return FALSE;
    } //code2utf()
}

// since this was moved with 5.5.1
if(!function_exists('html_entity_decode_utf8'))
{
    function html_entity_decode_utf8($string)
    {
        static $trans_tbl;
        // replace numeric entities
        $string = preg_replace('~&#x([0-9a-f]+);~ei', 'code2utf(hexdec("\\1"))', $string);
        $string = preg_replace('~&#([0-9]+);~e', 'code2utf(\\1)', $string);
        // replace literal entities
        if (!isset($trans_tbl))
        {
            $trans_tbl = array();
            foreach (get_html_translation_table(HTML_ENTITIES) as $val=>$key)
                $trans_tbl[$key] = utf8_encode($val);
        }
        return strtr($string, $trans_tbl);
    }
}

function calculate_trendline($values, $offset = true)
{
    // get the total
    $sumX = 0; $sumY = 0;
    foreach($values as $datapointX => $datapointY)    
    {
        $sumY += $datapointY;
        $sumX += $datapointX;
    }

    // get the averages
    $avgX = $sumX / count($values);
    $avgY = $sumY / count($values);

    // get the alpha
    $sumNalpha = 0; $sumZalpha = 0;
    foreach($values as $datapointX => $datapointY)    
    {
        $sumNalpha += ($datapointX - $avgX)*($datapointY - $avgY);
        $sumZalpha += ($datapointX - $avgX) * ($datapointX - $avgX);
    }

    // calculate the alpha value
    $alpha = $sumZalpha > 0 ? $sumNalpha / $sumZalpha : 0;

    $startValue = $avgY - (((count($values) / 2) + 1) * $alpha); 
    $endValue = $avgY + (((count($values) / 2) + 1) * $alpha); 

    return array(
    'start' => round($startValue, 0), 
    'end' => round($endValue, 0)
    );
}
function multisort($array, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL){
    // sort by ?
    foreach ($array as $pos =>  $val)
        $tmp_array[$pos] = $val[$sort_by];
    asort($tmp_array);

    // display however you want
    foreach ($tmp_array as $pos =>  $val){
        $return_array[$pos][$sort_by] = $array[$pos][$sort_by];
        $return_array[$pos][$key1] = $array[$pos][$key1];
        if (isset($key2)){
            $return_array[$pos][$key2] = $array[$pos][$key2];
        }
        if (isset($key3)){
            $return_array[$pos][$key3] = $array[$pos][$key3];
        }
        if (isset($key4)){
            $return_array[$pos][$key4] = $array[$pos][$key4];
        }
        if (isset($key5)){
            $return_array[$pos][$key5] = $array[$pos][$key5];
        }
        if (isset($key6)){
            $return_array[$pos][$key6] = $array[$pos][$key6];
        }
    }
    return $return_array;
}

function sortFieldArrayBySequence($first, $second)
{
    return $first['sequence'] - $second['sequence'];
}

function getLastDayOfMonth($month, $year) {
    return date('Y-m-d',strtotime('-1 second',strtotime('+1 month',strtotime($month.'/01/'.$year.' 00:00:00'))));
}