<?php
/**
 * @file strReverse.php
 * @author lurenzhong@xiaomi.com
 * @brief 字符串反转 - 支持中文、英文和中英混合字符串
 */

function strReverse($str)
{
    if( !is_string($str) || !mb_check_encoding($str, 'utf-8') ){
        echo '你输入的不是utf-8类型的字符串!'. "\n";
    }

    $strLen = mb_strlen($str, 'utf8');

    $arr = [];
    for($i=0; $i<$strLen; $i++){
       $arr[] = mb_substr($str, $i, 1, 'utf-8');
    }
    krsort($arr);

    $revStr = implode('', $arr);

    return $revStr;
}

/** 测试 */
$strA = '蚂蜂窝';
$revStr = strReverse($strA);
echo $revStr. "\n";

$strB = 'MFW';
$revStr = strReverse($strB);
echo $revStr. "\n";

$strC = '蚂蜂窝MFW';
$revStr = strReverse($strC);
echo $revStr. "\n";
