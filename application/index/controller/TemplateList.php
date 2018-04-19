<?php
namespace app\index\controller;


use think\Controller;

/*
 * 模板
 * */

class TemplateList  extends Controller
{
    //MAERSK 模板
    public function MAERSK($new_str)
    {

       foreach ($new_str as $k=>$v){
           if(strlen($v['word'])>3){
               $new_str_screen[]['word']=$v['word'];
           }
       }
       //dump($new_str_screen);exit;


        if ($new_str_screen) {
            foreach ($new_str_screen as $k => $v) {
                if ($v['word'] == '提单号：') {
                    $key = $k + 2;

                } else {
                    if (strstr($v['word'], '提单') || strstr($v['word'], '提单号') || strstr($v['word'], '单号：')) {
                        $key = $k + 2;


                    }
                }
                if ($v['word'] == '返还地点：') {
                    $key2 = $k + 1;
                } else {
                    if (strstr($v['word'], '返还地点') || strstr($v['word'], '返还地') || strstr($v['word'], '还地点：') || strstr($v['word'], '返还：')) {
                        $key2 = $k + 1;

                    }
                }
                if ($v['word'] == '提箱地点：') {
                    $key1 = $k + 1;





                } else {
                    if (strstr($v['word'], '提箱地点') || strstr($v['word'], '提箱地') || strstr($v['word'], '箱地点：') ) {
                        $key1 = $k + 1;

                    }
                }
                if ($v['word'] == '提箱人：') {
                    $key3 = $k + 1;
                } else {

                    if (strstr($v['word'], '提箱人') || strstr($v['word'], '箱人')) {
                        $key3 = $k + 1;

                    }
                }
                if ($v['word'] == '尺寸箱型：') {
                    $key4 = $k + 1;
                } else {

                    if (strstr($v['word'], '尺寸箱型') || strstr($v['word'], '箱型')|| strstr($v['word'], '尺寸箱')|| strstr($v['word'], '寸箱型')) {
                        $key4 = $k + 1;

                    }
                }
            }
        }

        //提单号的结果筛选

        if ($key) {
            //剔除汉字 标点 和长度小于6位的字符串
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key]['word']) && strlen($new_str_screen[$key]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key]['word'])) {
                echo "提单号:" . $new_str_screen[$key]['word'].'<br>';
            } else {
                //没找到 上一位查找
                if (!preg_match('/[\\x{4e00}-\\x{9fa5}]&&[[:punct:]]/u', $new_str_screen[$key - 1]['word']) && strlen($new_str_screen[$key]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key - 1]['word'])) {
                    echo "提单号:" . $new_str_screen[$key - 1]['word'].'<br>';
                } else {
                    //没找到 下一位查找
                    if (!preg_match('/[\\x{4e00}-\\x{9fa5}]&&[[:punct:]]/u', $new_str_screen[$key + 1]['word']) && strlen($new_str_screen[$key]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key + 1]['word'])) {
                        echo "提单号:" . $new_str_screen[$key + 1]['word'].'<br>';
                    } else {
                        echo '没有找到';
                    }
                }
            }
        } else {
            echo '没有找到';
        }

        if ($key1) {
            //长度小于6位的字符串
            if (strlen($new_str_screen[$key1]['word']) > 6) {
                echo "提箱地点:" . $new_str_screen[$key1]['word'].'<br>';
            } else {

                echo '没有找到';
            }
        } else {
            echo '没有找到';
        }
        if ($key2) {
            //长度小于6位的字符串
            if (strlen($new_str_screen[$key2]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key2]['word'])) {
                echo "返还地点:" . $new_str_screen[$key2]['word'].'<br>';
            } else {
                echo '没有找到';
            }
        } else {
            echo '没有找到';
        }

        if ($key3) {
            //长度小于6位的字符串
            if (strlen($new_str_screen[$key3]['word']) > 6) {
                echo "提箱人:" . $new_str_screen[$key3]['word'].'<br>';
            } else {
                echo '没有找到';
            }
        } else {
            echo '没有找到';
        }

       // dump(preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key4]['word']));exit;
        if ($key4) {
            //长度小于6位的字符串
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key4]['word'])&&strlen($new_str_screen[$key4]['word']) > 4) {
                echo "尺寸箱型:" . $new_str_screen[$key4]['word'].'<br>';
            } else {
                echo '尺寸箱型没有找到';
            }
        } else {
            echo '尺寸箱型没有找到';
        }
    }


}