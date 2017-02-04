<?php
/**
 * @file relativePath.php
 * @author lurenzhong@xiaomi.com
 * @brief 计算两个文件的相对路径
 */


/**
 * @param string $path1 文件路径1
 * @param string $path2 文件路径2
 */
function relativePath($path1, $path2)
{
    $arr1 = explode('/', $path1);
    $arr2 = explode('/', $path2);
    unset($arr1[0], $arr2[0]);
    //重建索引
    $arr1 = array_values($arr1);
    $arr2 = array_values($arr2);

    //获取两个路径的共同部分
    $intersectPath = array_intersect_assoc($arr1, $arr2);

    //确定共同路径的真实深度(必须是连续的才是共同路径)
    $depth = 0;
    for($i=0; $i<count($intersectPath); $i++){
        if( !isset($intersectPath[$i]) ){
            break;
        }
        $depth++;
    }

    //计算从$path2到$path1的前缀，通过前缀返回到共同路径上
   $prefix = array_fill(0, count($arr2)-$depth-1, '..');

   //前缀拼接上$path1中除去共同路径的部分
   $relativePathArr = array_merge($prefix, array_slice($arr1, $depth, -1) );
   $relativePath = implode('/', $relativePathArr);

   return $relativePath;
}

//测试计算相对路径函数
$path1 = '/usr/local/var/log/redis.log';
$path2 = '/usr/local/etc/nginx.conf';
$relativePath = relativePath($path1, $path2);
echo $relativePath. "\n"; //输出结果: ../var/log

