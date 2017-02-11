<?php
/**
 * @file MultiSortMultiArr.php
 * @author lurenzhong@xiaomi.com
 * @brief 多维数组排序(通过array_multisort()内置函数实现,该函数类似order by功能)
 */

$multiArr = [
    ['id' => 3, 'name' => '张飞'],
    ['id' => 1, 'name' => '李四'],
    ['id' => 2, 'name' => '王五'],
    ['id' => 4, 'name' => '关羽'],
];

/** 按照id排序 **/
$idArr = [];
foreach($multiArr as $val){
    $idArr[] = $val['id'];
}

//以第一个数组$idArr的排序为准,后面的数组只对相同的元素做调整
array_multisort($idArr, SORT_ASC, SORT_NUMERIC, $multiArr);
//print_r($idArr);
print_r($multiArr);
