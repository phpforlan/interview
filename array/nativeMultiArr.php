<?php
/**
 * @file nativeMultiArr.php
 * @author lurenzhong@xiaomi.com
 * @brief 不使用内置函数，对二维数组进行排序
 */

$multiArr = [
    ['id' => 3, 'name' => '张飞'],
    ['id' => 1, 'name' => '李四'],
    ['id' => 2, 'name' => '王五'],
    ['id' => 4, 'name' => '关羽'],
];

/**
 * @param array $multiArr 待排序的二维数组
 * @param string $keyName 按照该键进行排序
 * @param string $sortType 升序或降序
 */
function multiSort($multiArr, $keyName, $sortType)
{
    //取出$keyName的所有值
    $keyArr = [];
    foreach($multiArr as $key => $itemArr){
        $keyArr[$key] = $itemArr[$keyName];
    }

    //按照指定类型排序
    if($sortType == 'asc'){
        asort($keyArr);
    }else{
        arsort($keyArr);
    }

    //根据$keyArr的排序结果，对原数组进行调整
    $result = [];
    foreach($keyArr as $key=>$val){
        $result[$key] = $multiArr[$key];
    }

    return $result;
}

/** 按照键id进行排序 **/
$sortArr = multiSort($multiArr, 'id', 'asc');
print_r($sortArr);

