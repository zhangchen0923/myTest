<?php
namespace app\index\controller;


use think\Controller;

/*
 * 托书模块
 * */

class TemplateBook  extends Controller
{


    public function XFT($new_str){
        foreach ($new_str as $k=>$v){
            if(strlen($v['word'])>3){
                $new_str_screen[]['word']=$v['word'];
            }
        }
      // dump($new_str_screen);exit;
        $key=array();
        if ($new_str_screen) {
            foreach ($new_str_screen as $k => $v) {
                if ($v['word'] == '提单号：') {
                        $key['billOfLading'] = $k + 1;

                } else {
                    if (strstr($v['word'], '提单') || strstr($v['word'], '提单号') || strstr($v['word'], '单号：')) {
                        $key['billOfLading'] = $k + 1;


                    }
                }

                if ($v['word'] == '箱型箱量：') {
                    $key['boxVolume'] = $k + 1;

                } else {
                    if (strstr($v['word'], '箱型箱量') || strstr($v['word'], '箱型箱') || strstr($v['word'], '型箱量')) {
                        $key['boxVolume'] = $k + 1;

                    }
                }

                if ($v['word'] == '地址：') {
                    $key['address'] = $k + 1;

                } else {
                    if (strstr($v['word'], '地址') || strstr($v['word'], '地') || strstr($v['word'], '址')) {
                        $key['address'] = $k + 1;

                    }
                }
                if ($v['word'] == '装箱时间：') {
                    $key['time'] = $k + 1;

                } else {
                    if (strstr($v['word'], '装箱时间') || strstr($v['word'], '装箱时') || strstr($v['word'], '箱时间')) {
                        $key['time'] = $k + 1;

                    }
                }
                if ($v['word'] == '船期：') {
                    $key['sailingDay'] = $k + 1;

                } else {
                    if (strstr($v['word'], '船期') ) {
                        $key['sailingDay'] = $k + 1;

                    }
                }
                if ($v['word'] == '船名航次') {
                    $key['vesselVoyage'] = $k + 1;

                } else {
                    if (strstr($v['word'], '船名航次') || strstr($v['word'], '船名') || strstr($v['word'], '船名航')|| strstr($v['word'], '航次')) {
                        $key['vesselVoyage'] = $k +1;

                    }
                }

            }
        }







        if ($key['billOfLading']) {
            //剔除汉字 标点 和长度小于6位的字符串
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['billOfLading']]['word']) && strlen($new_str_screen[$key['billOfLading']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['billOfLading']]['word'])) {
               //echo "提单号:" . $new_str_screen[$key['billOfLading']]['word'].'<br>';
                $data['billOfLading']=$new_str_screen[$key['billOfLading']]['word'];
            } else {
           //echo '没有找到';
            }
        }


        if ($key['boxVolume']) {

            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['boxVolume']]['word']) && strlen($new_str_screen[$key['boxVolume']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['boxVolume']]['word'])) {
                //echo "箱型箱量:" . $new_str_screen[$key['boxVolume']]['word'].'<br>';
                $data['boxVolume']=$new_str_screen[$key['boxVolume']]['word'];
            } else {
               // echo '没有找到';
            }
        }
        if ($key['address']) {

            if (strlen($new_str_screen[$key['address']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['address']]['word'])) {
               // echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';
                $data['packingAdress']=$new_str_screen[$key['address']]['word'];
            } else {
                //echo '没有找到';
            }
        }

        if ($key['time']) {
            $new_str_screen[$key['time']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['time']]['word']);
            if (strlen($new_str_screen[$key['time']]['word']) > 6) {
                $new_str_screen[$key['time']]['word']= substr_replace($new_str_screen[$key['time']]['word'], ' ', 10,0);
                //echo "做箱时间:" . $new_str_screen[$key['time']]['word'].'<br>';
                $data['packingTime']=$new_str_screen[$key['time']]['word'];
            } else {
               // echo '没有找到';
            }
        }

        if ($key['sailingDay']) {
            $new_str_screen[$key['sailingDay']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['sailingDay']]['word']);
            if (strlen($new_str_screen[$key['sailingDay']]['word']) > 6) {
                $data['sailingDay']=$new_str_screen[$key['sailingDay']]['word'];
               // echo "船期:" . $new_str_screen[$key['sailingDay']]['word'].'<br>';
            } else {
               // echo '没有找到';
            }
        }

        if ($key['vesselVoyage']) {

            if (strlen($new_str_screen[$key['vesselVoyage']]['word']) > 6) {
                $data['vesselVoyage']=$new_str_screen[$key['vesselVoyage']]['word'];
               // echo "船名/航次:" . $new_str_screen[$key['vesselVoyage']]['word'].'<br>';
            } else {
               // echo '没有找到';
            }
        }

        $json=json_encode($data);
        return $json;
    }

    public function HKGJ($new_str){
        foreach ($new_str as $k=>$v){
            if(strlen($v['word'])>3){
                $new_str_screen[]['word']=$v['word'];
            }
        }

        $key=array();

        if ($new_str_screen) {
            foreach ($new_str_screen as $k => $v) {
                if ($v['word'] == '提单号：') {
                    $key['billOfLading'] = $k;

                } else {
                    if (strstr($v['word'], '提单') || strstr($v['word'], '提单号') || strstr($v['word'], '单号：')) {
                        $key['billOfLading'] = $k;


                    }
                }

                if ($v['word'] == '箱型数量：') {
                    $key['boxVolume'] = $k + 1;

                } else {
                    if (strstr($v['word'], '箱型数量') || strstr($v['word'], '箱型数') || strstr($v['word'], '型数量')) {
                        $key['boxVolume'] = $k + 1;

                    }
                }

                if ($v['word'] == '地址：') {
                    $key['address'] = $k + 1;


                } else {
                    if (strstr($v['word'], '地址') || strstr($v['word'], '址')) {

                        if(strlen($v['word'])<8){
                            $key['address'] = $k + 1;
                        }


                    }
                }

                if ($v['word'] == '请贵司于：') {
                    $key['time'] = $k + 1;

                } else {
                    if (strstr($v['word'], '请贵司于') || strstr($v['word'], '贵司于')) {
                        $key['time'] = $k + 1;

                    }
                }
                if ($v['word'] == '开航日期') {
                    $key['sailingDay'] = $k + 1;

                } else {
                    if (strstr($v['word'], '开航日期')||strstr($v['word'], '开航日')||strstr($v['word'], '航日期') ) {
                        $key['sailingDay'] = $k + 1;

                    }
                }
                if ($v['word'] == '船名/航次：') {
                    $key['vesselVoyage'] = $k + 1;

                } else {
                    if (strstr($v['word'], '船名/航次') || strstr($v['word'], '船名') || strstr($v['word'], '船名/航')|| strstr($v['word'], '航次')) {
                        $key['vesselVoyage'] = $k ;

                    }
                }


                }

        }


        if (!empty($key['billOfLading'])) {
            //剔除汉字 标点 和长度小于6位的字符串

            $new_str_screen[$key['billOfLading']]['word']=preg_replace("/[\\x{4e00}-\\x{9fa5}[:punct:]]/u",'',$new_str_screen[$key['billOfLading']]['word']);
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['billOfLading']]['word']) && strlen($new_str_screen[$key['billOfLading']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['billOfLading']]['word'])) {
                // echo "提单号:" . $new_str_screen[$key['billOfLading']]['word'].'<br>';
                $data['billOfLading']=$new_str_screen[$key['billOfLading']]['word'];
            } else {
                // echo '没有找到';
            }
        }



        if (!empty($key['boxVolume'])) {
                $new_str_screen[$key['boxVolume']]['word']=preg_replace('/([[:punct:]])+/U','', $new_str_screen[$key['boxVolume']]['word']);
                if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['boxVolume']]['word']) && strlen($new_str_screen[$key['boxVolume']]['word']) > 4 ) {

                    $data['boxVolume']=$new_str_screen[$key['boxVolume']]['word'];
                } else {
                    // echo '没有找到';
                }
            }



        if (!empty($key['time'])) {
            if (strlen($new_str_screen[$key['address']]['word']) > 6 && $new_str_screen[$key['address']]['word']) {
                 //echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';
                $data['packingAdress']=$new_str_screen[$key['address']]['word'];
            } else {
                //echo '没有找到';
            }
        }

        if (!empty($key['time'])) {
            $new_str_screen[$key['time']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['time']]['word']);
            if (strlen($new_str_screen[$key['time']]['word']) > 6) {
                $new_str_screen[$key['time']]['word']= substr_replace($new_str_screen[$key['time']]['word'], ' ', 10,0);
                //echo "做箱时间:" . $new_str_screen[$key['time']]['word'].'<br>';
                $data['packingTime']=$new_str_screen[$key['time']]['word'];
            } else {
                // echo '没有找到';
            }
        }


         if (!empty($key['sailingDay'])) {
            $new_str_screen[$key['sailingDay']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['sailingDay']]['word']);
            if (strlen($new_str_screen[$key['sailingDay']]['word']) > 6) {
                $data['sailingDay']=$new_str_screen[$key['sailingDay']]['word'];
               // echo "船期:" . $new_str_screen[$key['sailingDay']]['word'].'<br>';
            } else {
                // echo '没有找到';
            }
        }

        if (!empty($key['vesselVoyage'])) {
            $new_str_screen[$key['vesselVoyage']]['word']=preg_replace("/[\\x{4e00}-\\x{9fa5}[:punct:]]/u",'',$new_str_screen[$key['vesselVoyage']]['word']);
            if (strlen($new_str_screen[$key['vesselVoyage']]['word']) > 6) {
                $data['vesselVoyage']=$new_str_screen[$key['vesselVoyage']]['word'];
                // echo "船名/航次:" . $new_str_screen[$key['vesselVoyage']]['word'].'<br>';
            } else {
                // echo '没有找到';
            }
        }
        //dump($new_str_screen[$key['boxVolume']]['word']);exit;

        $json=json_encode($data);
        return $json;

    }

    public function JSZC($new_str){
        foreach ($new_str as $k=>$v){
            if(strlen($v['word'])>3){
                $new_str_screen[]['word']=$v['word'];
            }
        }

        $key=array();

        if ($new_str_screen) {
            foreach ($new_str_screen as $k => $v) {
                if ($v['word'] == '关单号：') {
                    $key['billOfLading'] = $k;

                } else {
                    if (strstr($v['word'], '关单号') || strstr($v['word'], '单号') || strstr($v['word'], '关单')) {
                        $key['billOfLading'] = $k;


                    }
                }

                if ($v['word'] == 'ETD：') {
                    $key['boxVolume'] = $k;

                } else {
                    if (strstr($v['word'], 'ETD')) {
                        $key['boxVolume'] = $k;

                    }
                }

                if ($v['word'] == '地址：') {
                    $key['address'] = $k + 1;


                } else {
                    if (strstr($v['word'], '地址') || strstr($v['word'], '址')) {

                        if(strlen($v['word'])<8){
                            $key['address'] = $k + 1;
                        }


                    }
                }

                if ($v['word'] == '请贵司于：') {
                    $key['time'] = $k + 1;

                } else {
                    if (strstr($v['word'], '请贵司于') || strstr($v['word'], '贵司于')) {
                        $key['time'] = $k + 1;

                    }
                }
                if ($v['word'] == '开航日期') {
                    $key['sailingDay'] = $k + 1;

                } else {
                    if (strstr($v['word'], '开航日期')||strstr($v['word'], '开航日')||strstr($v['word'], '航日期') ) {
                        $key['sailingDay'] = $k + 1;

                    }
                }
                if ($v['word'] == '船名/航次：') {
                    $key['vesselVoyage'] = $k + 1;

                } else {
                    if (strstr($v['word'], '船名/航次') || strstr($v['word'], '船名') || strstr($v['word'], '船名/航')|| strstr($v['word'], '航次')) {
                        $key['vesselVoyage'] = $k ;

                    }
                }


            }

        }


        if (!empty($key['billOfLading'])) {
            //剔除汉字 标点 和长度小于6位的字符串

            $new_str_screen[$key['billOfLading']]['word']=preg_replace("/[\\x{4e00}-\\x{9fa5}[:punct:]]/u",'',$new_str_screen[$key['billOfLading']]['word']);
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['billOfLading']]['word']) && strlen($new_str_screen[$key['billOfLading']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['billOfLading']]['word'])) {
                // echo "提单号:" . $new_str_screen[$key['billOfLading']]['word'].'<br>';
                $data['billOfLading']=$new_str_screen[$key['billOfLading']]['word'];
            } else {
                // echo '没有找到';
            }
        }



        if (!empty($key['boxVolume'])) {
            $new_str_screen[$key['boxVolume']]['word']=preg_replace('/([[:punct:]])+/U','', $new_str_screen[$key['boxVolume']]['word']);
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['boxVolume']]['word']) && strlen($new_str_screen[$key['boxVolume']]['word']) > 4 ) {

                $data['boxVolume']=$new_str_screen[$key['boxVolume']]['word'];
            } else {
                // echo '没有找到';
            }
        }



        if (!empty($key['time'])) {
            if (strlen($new_str_screen[$key['address']]['word']) > 6 && $new_str_screen[$key['address']]['word']) {
                //echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';
                $data['packingAdress']=$new_str_screen[$key['address']]['word'];
            } else {
                //echo '没有找到';
            }
        }

        if (!empty($key['time'])) {
            $new_str_screen[$key['time']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['time']]['word']);
            if (strlen($new_str_screen[$key['time']]['word']) > 6) {
                $new_str_screen[$key['time']]['word']= substr_replace($new_str_screen[$key['time']]['word'], ' ', 10,0);
                //echo "做箱时间:" . $new_str_screen[$key['time']]['word'].'<br>';
                $data['packingTime']=$new_str_screen[$key['time']]['word'];
            } else {
                // echo '没有找到';
            }
        }


        if (!empty($key['sailingDay'])) {
            $new_str_screen[$key['sailingDay']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['sailingDay']]['word']);
            if (strlen($new_str_screen[$key['sailingDay']]['word']) > 6) {
                $data['sailingDay']=$new_str_screen[$key['sailingDay']]['word'];
                // echo "船期:" . $new_str_screen[$key['sailingDay']]['word'].'<br>';
            } else {
                // echo '没有找到';
            }
        }

        if (!empty($key['vesselVoyage'])) {
            $new_str_screen[$key['vesselVoyage']]['word']=preg_replace("/[\\x{4e00}-\\x{9fa5}[:punct:]]/u",'',$new_str_screen[$key['vesselVoyage']]['word']);
            if (strlen($new_str_screen[$key['vesselVoyage']]['word']) > 6) {
                $data['vesselVoyage']=$new_str_screen[$key['vesselVoyage']]['word'];
                // echo "船名/航次:" . $new_str_screen[$key['vesselVoyage']]['word'].'<br>';
            } else {
                // echo '没有找到';
            }
        }
        $json=json_encode($data);
        return $json;
    }

    public function JSTLGJ($new_str){
        foreach ($new_str as $k=>$v){
            if(strlen($v['word'])>3){
                $new_str_screen[]['word']=$v['word'];
            }
        }

        $key=array();

        if ($new_str_screen) {
            foreach ($new_str_screen as $k => $v) {
                if ($v['word'] == '关单号：') {
                    $key['billOfLading'] = $k;

                } else {
                    if (strstr($v['word'], '关单号') || strstr($v['word'], '单号') || strstr($v['word'], '关单')) {
                        $key['billOfLading'][] = $k;


                    }
                }

                if ($v['word'] == '箱型箱量：') {
                    $key['boxVolume'] = $k;

                } else {
                    if (strstr($v['word'], '箱型箱量：') || strstr($v['word'], '箱型箱量') || strstr($v['word'], '型箱量')) {
                        $key['boxVolume'] = $k;


                    }

                }

                if ($v['word'] == '做箱地点：') {
                    $key['address'] = $k;


                } else {
                    if (strstr($v['word'], '做箱地点:') || strstr($v['word'], '做箱地点')|| strstr($v['word'], '做箱地')) {

                        if(strlen($v['word'])>8){
                            $key['address'] = $k;
                        }


                    }
                }

                if ($v['word'] == '做箱时间：') {
                    $key['packingTime'] = $k ;

                } else {
                    if (strstr($v['word'], '做箱时间') || strstr($v['word'], '做箱时 ')) {
                        $key['packingTime'] = $k ;

                    }
                }
             if ($v['word'] == '开航日期') {
                    $key['sailingDay'] = $k ;

                } else {
                    if (strstr($v['word'], '开航日期')||strstr($v['word'], '开航日')||strstr($v['word'], '航日') ) {
                        $key['sailingDay'] = $k ;

                    }
                }
                if ($v['word'] == '船名/航次：') {
                    $key['vesselVoyage'] = $k ;

                } else {
                    if (strstr($v['word'], '船名/航次') || strstr($v['word'], '船名') || strstr($v['word'], '船名/航')|| strstr($v['word'], '航次')) {
                        $key['vesselVoyage'] = $k ;

                    }
                }


            }

        }


        if (!empty($key['billOfLading'])) {
            //剔除汉字 标点 和长度小于6位的字符串
            foreach ($key['billOfLading'] as $k=>$v){

            $new_str_screen[$v]['word']=preg_replace("/[\\x{4e00}-\\x{9fa5}[:punct:]]/u",'',$new_str_screen[$v]['word']);
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$v]['word']) && strlen($new_str_screen[$v]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$v]['word'])) {
                // echo "提单号:" . $new_str_screen[$key['billOfLading']]['word'].'<br>';
                $data['billOfLading'][]=$new_str_screen[$v]['word'];
            } else {
                // echo '没有找到';
            }
        }
        }



        if (!empty($key['boxVolume'])) {
            $new_str_screen[$key['boxVolume']]['word']=preg_replace("/[\\x{4e00}-\\x{9fa5}[:punct:]]/u",'', $new_str_screen[$key['boxVolume']]['word']);
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['boxVolume']]['word']) && strlen($new_str_screen[$key['boxVolume']]['word']) > 4 ) {

                $data['boxVolume']=$new_str_screen[$key['boxVolume']]['word'];
            } else {
                // echo '没有找到';
            }
        }



        if (!empty($key['address'])) {

            if (strlen($new_str_screen[$key['address']]['word']) > 6 ) {
                if(strstr($new_str_screen[$key['address']]['word'], '：')){
                    $str = explode("：", $new_str_screen[$key['address']]['word']);

                    if(!empty($str[1])){
                        $data['packingAdress']=$str[1];
                    }

                }
                //echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';

            } else {
                //echo '没有找到';
            }
        }

        if (!empty($key['packingTime'])) {


            if (strlen($new_str_screen[$key['packingTime']]['word']) > 6 ) {
                if(strstr($new_str_screen[$key['packingTime']]['word'], '：')){
                    $str = explode("：", $new_str_screen[$key['packingTime']]['word']);

                    if(!empty($str[1])){
                        $data['packingTime']=$str[1];
                        $data['packingTime']=preg_replace("/[a-zA-Z[:punct:]]/u",'1', $data['packingTime']);
                    }

                }
                //echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';

            } else {
                //echo '没有找到';
            }
        }


        if (!empty($key['sailingDay'])) {
            if(strstr($new_str_screen[$key['sailingDay']]['word'], '：')){
                $str = explode("：", $new_str_screen[$key['sailingDay']]['word']);

                if(!empty($str[1])){
                    $data['sailingDay']=$str[1];
                    $data['sailingDay']=preg_replace("/[a-zA-Z[:punct:]]/u",'', $data['sailingDay']);
                }

            }
            //echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';

        } else {
            //echo '没有找到';


        }


        if (!empty($key['vesselVoyage'])) {

            if (strlen($new_str_screen[$key['vesselVoyage']]['word']) > 6 ) {
                if(strstr($new_str_screen[$key['vesselVoyage']]['word'], '：')){
                    $str = explode("：", $new_str_screen[$key['vesselVoyage']]['word']);

                    if(!empty($str[1])){
                        $data['vesselVoyage']=$str[1];
                    }

                }
                //echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';

            } else {
                //echo '没有找到';
            }


        }


        $json=json_encode($data);

        return $json;

    }



    public function AJHCGJ($new_str){
        foreach ($new_str as $k=>$v){
            if(strlen($v['word'])>3){
                $new_str_screen[]['word']=$v['word'];
            }
        }

        $key=array();
        if ($new_str_screen) {
            foreach ($new_str_screen as $k => $v) {
                if ($v['word'] == '提单号：') {
                    $key['billOfLading'] = $k + 1;

                } else {
                    if (strstr($v['word'], '提单') || strstr($v['word'], '提单号') || strstr($v['word'], '单号：')) {
                        $key['billOfLading'] = $k + 1;


                    }else{
                       $billOfLading='null';
                    }
                }

                if ($v['word'] == '箱型箱量：') {
                    $key['boxVolume'] = $k + 1;

                } else {
                    if (strstr($v['word'], '箱型箱量') || strstr($v['word'], '箱型箱') || strstr($v['word'], '型箱量')) {
                        $key['boxVolume'] = $k + 1;

                    }
                }

                if ($v['word'] == '地址：') {
                    $key['address'] = $k + 1;

                } else {
                    if (strstr($v['word'], '地址') || strstr($v['word'], '地') || strstr($v['word'], '址')) {
                        $key['address'] = $k + 1;

                    }
                }
                if ($v['word'] == '装箱时间：') {
                    $key['time'] = $k + 1;

                } else {
                    if (strstr($v['word'], '装箱时间') || strstr($v['word'], '装箱时') || strstr($v['word'], '箱时间')) {
                        $key['time'] = $k + 1;

                    }
                }
                if ($v['word'] == '船期：') {
                    $key['sailingDay'] = $k + 1;

                } else {
                    if (strstr($v['word'], '船期') ) {
                        $key['sailingDay'] = $k + 1;

                    }
                }
                if ($v['word'] == '船名航次') {
                    $key['vesselVoyage'] = $k + 1;

                } else {
                    if (strstr($v['word'], '船名航次') || strstr($v['word'], '船名') || strstr($v['word'], '船名航')|| strstr($v['word'], '航次')) {
                        $key['vesselVoyage'] = $k +1;

                    }
                }


            }
        }
        if($billOfLading=='null'){
            if(!empty($key['vesselVoyage'])){
                $key['billOfLading'] =$key['vesselVoyage'] +1;
            }

        }






        if (!empty($key['billOfLading'])) {
            //剔除汉字 标点 和长度小于6位的字符串
            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['billOfLading']]['word']) && strlen($new_str_screen[$key['billOfLading']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['billOfLading']]['word'])) {
                //echo "提单号:" . $new_str_screen[$key['billOfLading']]['word'].'<br>';

                $data['billOfLading']=$new_str_screen[$key['billOfLading']]['word'];
            } else {
                echo '没有找到';
            }
        }


        if (!empty($key['boxVolume'])) {

            if (!preg_match('/[\\x{4e00}-\\x{9fa5}]/u', $new_str_screen[$key['boxVolume']]['word']) && strlen($new_str_screen[$key['boxVolume']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['boxVolume']]['word'])) {
                //echo "箱型箱量:" . $new_str_screen[$key['boxVolume']]['word'].'<br>';
                $data['boxVolume']=$new_str_screen[$key['boxVolume']]['word'];
            } else {
                // echo '没有找到';
            }
        }
        if (!empty($key['address'])) {

            if (strlen($new_str_screen[$key['address']]['word']) > 6 && !preg_match('/([[:punct:]])+/U', $new_str_screen[$key['address']]['word'])) {
                // echo "地址:" . $new_str_screen[$key['address']]['word'].'<br>';
                $data['packingAdress']=$new_str_screen[$key['address']]['word'];
            } else {
                //echo '没有找到';
            }
        }

        if (!empty($key['time'])) {
            $new_str_screen[$key['time']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['time']]['word']);
            if (strlen($new_str_screen[$key['time']]['word']) > 6) {
                $new_str_screen[$key['time']]['word']= substr_replace($new_str_screen[$key['time']]['word'], ' ', 10,0);
                //echo "做箱时间:" . $new_str_screen[$key['time']]['word'].'<br>';
                $data['packingTime']=$new_str_screen[$key['time']]['word'];
            } else {
                // echo '没有找到';
            }
        }

        if (!empty($key['sailingDay'])) {
            $new_str_screen[$key['sailingDay']]['word']=preg_replace("/[a-zA-Z]/",'',$new_str_screen[$key['sailingDay']]['word']);
            if (strlen($new_str_screen[$key['sailingDay']]['word']) > 6) {
                $data['sailingDay']=$new_str_screen[$key['sailingDay']]['word'];
                // echo "船期:" . $new_str_screen[$key['sailingDay']]['word'].'<br>';
            } else {
                // echo '没有找到';
            }
        }

        if (!empty($key['vesselVoyage'])) {

            if (strlen($new_str_screen[$key['vesselVoyage']]['word']) > 6) {
                $data['vesselVoyage']=$new_str_screen[$key['vesselVoyage']]['word'];
                // echo "船名/航次:" . $new_str_screen[$key['vesselVoyage']]['word'].'<br>';
            } else {
                // echo '没有找到';
            }
        }

        $json=json_encode($data);
        return $json;
    }

    public function OTHER($new_str){
        foreach ($new_str as $k=>$v){
            if(strlen($v['word'])>3){
                $new_str_screen[]['word']=$v['word'];
            }
        }

        $key=array();



        $data['billOfLading']=$new_str_screen[5]['word'];
        $data['boxVolume']=$new_str_screen[6]['word'];
        $data['vesselVoyage']=$new_str_screen[0]['word'].'/'.$new_str_screen[1]['word'];

        $json=json_encode($data);

        return $json;

    }

}