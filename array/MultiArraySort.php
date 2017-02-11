<?php
/**
 * @file MultiArraySort.php
 * @author lurenzhong@xiaomi.com
 * @brief 多维数组排序(按照某个key进行排序,通过usort()内置函数实现)
 */

$multiArr = [
    ['id' => 3, 'name' => '张飞'],
    ['id' => 1, 'name' => '李四'],
    ['id' => 2, 'name' => '王五'],
    ['id' => 4, 'name' => '关羽'],
];

/** 1.按照id进行排序 **/
function cmpId($a, $b)
{
    $aId = $a['id'];
    $bId = $b['id'];

    return ($aId == $bId) ? 0 : ($aId < $bId ? -1 : 1);
}

usort($multiArr, 'cmpId');
print_r($multiArr);

/** 2.按照name排序 **/
function cmpName($a, $b)
{
    $aName = $a['name'];
    $bName = $b['name'];

    return strcmp($aName, $bName);
}

//usort($multiArr, 'cmpName');
//print_r($multiArr);
