<?php
namespace app\index\controller;
use think\db;
use PHPExcel;
use think\Controller;
use think\Request;

class Test extends Controller
{
    protected $money_data;
    protected $business_data;
    public function __initialize()
    {


    }



    public function index()
    {
//       if(empty(input('dh'))||empty(input('zh'))||empty(input('pw'))||empty(input('num'))){
//            $this->error('请填写完整的数据');
//       }else{




        $post = array(
            'user_identification' => '13818220572',

            'password' => '111111',
            'auto_login' => 'true'
        );

        $url = "http://www.tuochetong.com/ws-truck/user/login"; //登录地址， 和原网站一致
        $num=input('num');//想获取的信息数目
        $s_time=input('s_time');//开始时间 格式:2017-03-01
        $e_time=input('e_time');//结束时间
        $business_id=input('$business_id');
        $_SESSION['business_id']=$business_id;

        $cookie = dirname(__FILE__).'/cookie_ydma.txt'; //设置cookie保存的路径
        $url2 = "http://ys.cttms.com/report/incomeStatement.action"; //登录后要获取信息的地址

        $this->login_post($url,$cookie,$post); //调用模拟登录
        exit;
        //$page=ceil($num/5);


        //dump($page);exit;
       /* for ($x=1; $x<=$page; $x++) {
            $content =$this->get_content($url2, $cookie,$x,$s_time,$e_time); //登录后，调用get_content()函数获取登录后指定的页面信息



            file_put_contents(dirname(__FILE__).'/save'.$x.'.html', $content);


            $success=$this->html($x);

            unlink (dirname(__FILE__).'/save'.$x.'.html');
        }*/

     $url3 = "http://ys.cttms.com/report/incomeStatement.action";  //财务应付

        $contents =$this->get_content_new($url3, $cookie,$s_time,$e_time);

        file_put_contents(dirname(__FILE__).'/caiwu.html', $contents);



        $url4 = "http://ys.cttms.com/report/incomeStatement.action";  //财务应收
        $contents =$this->get_content_new($url4, $cookie,$s_time,$e_time);
        file_put_contents(dirname(__FILE__).'/caiwu_pay.html', $contents);
        $success=$this->html1();
        unlink (dirname(__FILE__).'/caiwu.html');
        unlink (dirname(__FILE__).'/caiwu_pay.html');

        $business_data=$this->business_data;
        $money=$this->money_data;
        dump($money);exit;
        //合并数组 $business_data $money
        $new_data=array();
        foreach ($business_data as $k=>$v){
            foreach ($money as $k1=>$v1){

               if($v['提单号']==rtrim($v1['提单号'])){
                   $new_data[]=array_merge($v,$v1);
               }

            }

        }


         //将数组转化为json 存入数据库
            foreach($new_data as $k=>$v){
                 $data[]=array('content'=>json_encode($v),
                                'business_id'=>$business_id

                 );
            }

            $rus=db('business')->insertAll($data);
            if($rus){
                echo 'it`s OK';
            }

//       }
    }


    function login_post($url, $cookie, $post){
        $ch = curl_init(); //初始化curl模块
        curl_setopt($ch, CURLOPT_URL, $url); //登录提交的地址
        curl_setopt($ch, CURLOPT_HEADER,0); //是否显示头信息
        // 追踪内部跳转
        curl_setopt($ch, CURLOPT_MAXREDIRS, 100);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0); //是否自动显示返回的信息
        $header = [
            'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Encoding:gzip, deflate',
            'Accept-Language:zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
            'Host:'. 'www.tuochetong.com', //必填
            'X-Requested-With:XMLHttpRequest', // 设置ajax请求头
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); //设置cookie信息保存在指定的文件夹中
        curl_setopt($ch, CURLOPT_POST, 1); //以POST方式提交
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要执行的信息

        $a=curl_exec($ch); //执行CURL


        //echo $ch;
    }
    /*
    上例中声明的函数login_post()，需要提供一个url地址，一个保存cookie文
    件，以及post的数据（用户名和密码等信息），注意php自带的http_build_query()
    函数可以将数组转换成相连接的字符串，如果通过该函数登录成功后，我们要获取
    登录成功个页面信息。声明函数的代码如下所示：
    */
    function get_content($url, $cookie,$page,$s_time,$e_time){

        //最大条目数量为200


        $post = array(
            'pager.pageSize' => '5',
            'pager.currentPage' => $page,
            'search.beginTime' =>$s_time,
            'search.endTime' =>$e_time

        );


        $ch = curl_init(); //初始化curl模块
        curl_setopt($ch, CURLOPT_URL, $url); //登录提交的地址
        curl_setopt($ch, CURLOPT_HEADER, 0); //是否显示头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //是否自动显示返回的信息
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);//设置cookie信息保存在指定的文件夹中
        curl_setopt($ch, CURLOPT_POST, 1); //以POST方式提交
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要执行的信息

        $rs = curl_exec($ch); //执行curl转去页面内容
        curl_close($ch);
        return $rs; //返回字符串



    }

    function get_content_new($url, $cookie,$s_time,$e_time){


        $post = array(

            'search.beginTime' =>$s_time,
            'search.endTime' =>$e_time,

        );




        $ch = curl_init(); //初始化curl模块
        curl_setopt($ch, CURLOPT_URL, $url); //登录提交的地址
        curl_setopt($ch, CURLOPT_HEADER, 0); //是否显示头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //是否自动显示返回的信息
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);//设置cookie信息保存在指定的文件夹中
        curl_setopt($ch, CURLOPT_POST, 1); //以POST方式提交
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要执行的信息

        $rs = curl_exec($ch); //执行curl转去页面内容
        curl_close($ch);


        return $rs; //返回字符串



    }



    /*
    get_content()中用curlopt_cookiefile可以读取到登录保存的cookie信
    息 最后讲页面内容返回.我们的目的是获取到模拟登录后的信息，也就是
    只有正常登录成功后菜能获取的有用的信息，下面举例代码
    */







    public  function html($x){
        require_once("simple_html_dom.php");
        $htmls = file_get_html(dirname(__FILE__).'/save'.$x.'.html');
        $html = $htmls->find('#table')[0]->find('tr');
        if($html){
            $new_data=array();
            $new_data_value=array();
            $new_data_name=array();
            $new_data_count=array();
            foreach($html as $k1=>$e1) {
                foreach ($e1->find('td') as  $e) {
                    $new_data[$k1][]= $e->innertext;
                }

                foreach ($e1->find('td input') as $e) {
                    $new_data_value[$k1][] = $e->value;
                    $new_data_name[$k1][] = $e->name;
                }

                //键值合并
                if(!empty($new_data_name)||!empty($new_data_value)){
                    foreach ($new_data_name as $k2=>$v2) {
                        foreach ($new_data_value as $k3=>$v3) {
                            if($k3==$k2){
                                foreach ($v2 as $k4=>$v4) {
                                    foreach ($v3 as $k5=>$v5) {
                                        if($k4==$k5){
                                            $new_data_count[$k1][$v4] =$v5;
                                        }
                                    }
                                }

                            }

                        }

                    }
                }

            }

        }






        $html = $htmls->find('#table thead th');
        foreach($html as $k2=>$e2) {
            $new_data_key[] = $e2->innertext;
        }


        $marge_data=array();
        foreach($new_data as $k=>$v){
            foreach($v as $k1=>$v1){
                foreach($new_data_key as $k2=>$v2) {

                    if($k1==$k2){
                        $marge_data[$k][$v2]=$v1;
                    }

                }
            }

        }



        //合并数组

      $arrs=array();
            foreach($new_data_count as $k1=>$v1) {

                    foreach($marge_data as $k=>$v){
                        if ($k==$k1) {
                        $arr[] = array_merge($v1, $v);

                        foreach($arr as $k2=>$v2){
                            foreach($v2 as $k3=>$v3) {

                                if (strlen($v3)<= 100) {
                                    $arrs[$k2][$k3] = $v3;
                                }

                            }

                        }
                }
            }
        }




        foreach($arrs as $k=>$v){
            $this->business_data[]= $v;

        }




    }



    public  function html1(){


        require_once  ("simple_html_dom.php");
        //应收
        $html = file_get_html(dirname(__FILE__).'/caiwu.html');

        foreach($html->find('#table tr') as $k1=>$e) {
            foreach ($e->find('td') as $e1) {
                $new_data[$k1][] = $e1->innertext;
            }
        }

        $html = $html->find('#table thead th');
        foreach($html as $k2=>$e2) {
            $new_data_key[] = $e2->innertext;
        }


        $marge_data=array();
        foreach($new_data as $k=>$v){
            foreach($v as $k1=>$v1){
                foreach($new_data_key as $k2=>$v2) {

                    if($k1==$k2){
                        $marge_data[$k][$v2]=$v1;

                    }

                }
            }

        }

        //应付
        $html = file_get_html(dirname(__FILE__).'/caiwu_pay.html');

        foreach($html->find('#table tr') as $k1=>$e) {
            foreach ($e->find('td') as $e1) {
                $new_data_pay[$k1][] = $e1->innertext;
            }
        }

        $html = $html->find('#table thead th');
        foreach($html as $k2=>$e2) {
            $new_data_key_pay[] = $e2->innertext;
        }


        $marge_data_pay=array();
        foreach($new_data_pay as $k=>$v){
            foreach($v as $k1=>$v1){
                foreach($new_data_key_pay as $k2=>$v2) {

                    if($k1==$k2){
                        $marge_data_pay[$k][$v2]=$v1;

                    }

                }
            }

        }

        foreach($marge_data as $k=>$v){
            $marge_data[$k]['应收小计']=$v['小计'];
        }



        //将应付应收合并
        $array_merge=array();
        foreach($marge_data as $k=>$v){
            foreach($marge_data_pay as $k1=>$v1){
                if($k==$k1){
                    $array_merge[$k]=array_merge($v,$v1);
                }

            }
        }

      foreach($array_merge as $k=>$v){
            $this->money_data[]= $v;

        }

    }




    //财务表导出
    public function sqltoxls(){
        //导入PhpExcel
        $list=db('business')->field('content')->where('business_id',$_SESSION['business_id'])->group('content')->select();

        if(empty($list)){
            echo '先请插入数据';exit;
        }
        \think\Loader::import('.PHPExcel');//引入类文件
        $objPHPExcel = new \PHPExcel();
        $key = 65;
        //将json转数组
        $list_new=array();
        foreach($list as $k=>$v){
           $list_new[]=json_decode( $v['content'],true);

        };
       // dump($list_new);exit;

        foreach($list_new[0] as $k=>$v){
            if($key<91){
                $letter= chr($key);
            }elseif ($key>=91&&$key<117){
                $letter=  "A".chr($key-26);
            }elseif ($key>=117&&$key<143){
                $letter=  "B".chr($key-52);
            }elseif ($key>=143){
                $letter=  "C".chr($key-78);
            }
            $key++;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($letter.'1', $k);
        }
        $keys = 1;
        foreach($list_new as $key=>$value) {
            $key = 65;
            $keys++;
            foreach ($value as $k => $v) {
                if ($key < 91) {
                    $letter = chr($key);
                } elseif ($key >= 91 && $key < 117) {
                    $letter = "A" . chr($key - 26);
                } elseif ($key >= 117 && $key < 143) {
                    $letter = "B" . chr($key - 52);
                } elseif ($key >= 143) {
                    $letter = "C" . chr($key - 78);
                }
                $key++;
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($letter.$keys, $v);
            }
        }

        $objPHPExcel->getActiveSheet()->setTitle('信息页');

        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=" . '信息表'.'-'.time() . ".xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        \think\Loader::import('.PHPExcel.IOFactory.PHPExcel_IOFactory');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }


    public function view(){

        return $this->fetch('index');
    }


    public function importDatabase(){

        $log_grab=db('log_grab')->group('bill_of_loading_num')->select();
        $log_grab_money=db('log_grab_money')->group('bill_of_loading_num')->select();
        if(!$log_grab||!$log_grab_money){
            $this->SystemError('暂无数据'); exit;
        }
        foreach($log_grab as $key=>$vo){
            $list[] = array_merge($vo,$log_grab_money[$key]);
        }


    }




    public function getname()
    {
        //$use=M('');

        $db=db('business')->getDbFields();

        $arr = $db[0] ? $db[0] : '';

        foreach($arr as $key => $value)
        {
            $arrKey[] =  $key;

        }
    }





}
