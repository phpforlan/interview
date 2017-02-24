<?php
/**
 * @file CalcScore.php
 * @author lurenzhong@xiaomi.com
 * @brief 一个多选题，全对得6分，漏选得2分，错选得0分，写一个通用函数。
 */

/**
 * @param array $optionArr 题目选项数组
 * @param array $standardArr 标准答案数组
 * @param array $answerArr 用户选择的答案数组
 */
function calcScore($optionArr, $standardArr, $answerArr)
{
    if( empty($optionArr) || empty($standardArr) || empty($answerArr) ){
        throw new Exception('请传入非空参数！', 10001);
    }

    $answerLen = count($answerArr); //用户答案长度
    $standardLen = count($standardArr); //标准答案长度

    if( $answerLen < $standardLen ){
        if( empty( array_diff($answerArr, $standardArr) ) ){ //漏选
            return 2;
        }else{ //错选
            return 0;
        }
    }elseif( $answerLen == $standardLen ){
        if( empty( array_diff($answerArr, $standardArr) ) ){ //全对
            return 6;
        }else{
            return 0; //错选
        }
    }else{
        return 0; //错选
    }

}

$optionArr = ['A', 'B', 'C', 'D', 'E']; //选项
$standardArr = ['A', 'C', 'E']; //标准答案

/** 测试参数为空的情况 */
//calcScore([], $standardArr, ['A']);


/** 测试用户全对的情况 */
$answerArr = ['A', 'C', 'E'];
$score = calcScore($optionArr, $standardArr, $answerArr);
echo '全对得: '. $score. " 分\n";

/** 测试用户漏选的情况 */
$answerArr = ['C', 'E'];
$score = calcScore($optionArr, $standardArr, $answerArr);
echo '漏选得: '. $score. " 分\n";

/** 测试用户多选的情况 */
$answerArr = ['A', 'C', 'E','D'];
$score = calcScore($optionArr, $standardArr, $answerArr);
echo '多选得: '. $score. " 分\n";

/** 测试用户错选的情况 */
$answerArr = ['D'];
$score = calcScore($optionArr, $standardArr, $answerArr);
echo '错选得: '. $score. " 分\n";
