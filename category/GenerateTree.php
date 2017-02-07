<?php
/**
 * @file GenerateTree.php
 * @author lurenzhong@xiaomi.com
 * @brief php无限级分类
 */

$cateItems = [
    ['id' => 1, 'pid' => 0, 'name' => '北京市'],
    ['id' => 2, 'pid' => 0, 'name' => '苏州市'],
    ['id' => 3, 'pid' => 1, 'name' => '海淀区'],
    ['id' => 4, 'pid' => 1, 'name' => '朝阳区'],
    ['id' => 5, 'pid' => 3, 'name' => '毛纺路'],
    ['id' => 6, 'pid' => 2, 'name' => '苏州园区'],
];


/**
 * 非递归方式实现
 */
function generateTree($cateItems, $id)
{
    foreach($cateItems as $item){
        $cateItems[$item['pid']]['son'][$item['id']] = &$cateItems[$item['id']];  //记住这段代码
    }
    
    return isset($cateItems[0]['son']) ? $cateItems[0]['son'] : array(); 
}

//$tree = generateTree($cateItems, 0);
//print_r($tree);


/**
 * 递归方式实现(递归调用查找$id子级分类的函数)
 */
function findSubCate($cateItems, $id)
{
    $tree = [];

    foreach($cateItems as $item){
        if( $item['pid'] == $id ){
            $item['son'] = findSubCate($cateItems, $item['id']); //递归查找子级分类
            $tree[] = $item; //把每次递归结果赋值给$tree
        }
        
    }

    return $tree;
}

$tree = findSubCate($cateItems, 0);
print_r($tree);


