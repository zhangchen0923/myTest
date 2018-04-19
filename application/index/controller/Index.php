<?php
namespace app\index\controller;
use think\Controller;



class Index  extends Controller
{
    function makeBook()
    {
        $TemplateBook=new TemplateBook();
//        $url="http://img.320xx.com/public/file_book/11.jpg";
//        $mode=$this->aliOrc($url);
//        /*//$mode="HTTP/1.1 200 OK Server: Tengine Date: Tue, 17 Apr 2018 10:00:25 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 2642 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: ACA0BFC1-2DA6-407A-BA0B-73ED11F5AE92 Vary: Accept-Encoding {\"sid\":\"8c3b00c09916208326cb25976800fea6fa48a852201030853277eb07af03775551c4eb4c\",\"prism_version\":\"1.0.6\",\"prism_wnum\":22,\"prism_wordsInfo\":[{\"word\":\"江苏众诚\",\"pos\":[{\"x\":321,\"y\":107},{\"x\":587,\"y\":107},{\"x\":587,\"y\":152},{\"x\":321,\"y\":152}]},{\"word\":\"国际物流有\",\"pos\":[{\"x\":602,\"y\":107},{\"x\":955,\"y\":107},{\"x\":955,\"y\":153},{\"x\":602,\"y\":153}]},{\"word\":\"限公司\",\"pos\":[{\"x\":975,\"y\":108},{\"x\":1159,\"y\":108},{\"x\":1159,\"y\":150},{\"x\":975,\"y\":150}]},{\"word\":\"JiangsuuniwilLogisticsCo.Ltd.\",\"pos\":[{\"x\":366,\"y\":152},{\"x\":943,\"y\":152},{\"x\":943,\"y\":199},{\"x\":366,\"y\":199}]},{\"word\":\"Uniwil\",\"pos\":[{\"x\":211,\"y\":270},{\"x\":312,\"y\":270},{\"x\":312,\"y\":291},{\"x\":211,\"y\":291}]},{\"word\":\"TEL：(0512)62858087\",\"pos\":[{\"x\":229,\"y\":301},{\"x\":483,\"y\":301},{\"x\":483,\"y\":328},{\"x\":229,\"y\":328}]},{\"word\":\"FAX：(0512)62858880\",\"pos\":[{\"x\":730,\"y\":301},{\"x\":980,\"y\":301},{\"x\":980,\"y\":328},{\"x\":730,\"y\":328}]},{\"word\":\"To：老王\",\"pos\":[{\"x\":226,\"y\":408},{\"x\":371,\"y\":408},{\"x\":371,\"y\":440},{\"x\":226,\"y\":440}]},{\"word\":\"From：众诚/顾颖\",\"pos\":[{\"x\":223,\"y\":445},{\"x\":464,\"y\":445},{\"x\":464,\"y\":478},{\"x\":223,\"y\":478}]},{\"word\":\"各单\",\"pos\":[{\"x\":211,\"y\":590},{\"x\":559,\"y\":590},{\"x\":559,\"y\":689},{\"x\":211,\"y\":689}]},{\"word\":\"目的港：SAVANNAH\",\"pos\":[{\"x\":232,\"y\":603},{\"x\":529,\"y\":603},{\"x\":529,\"y\":635},{\"x\":232,\"y\":635}]},{\"word\":\"中转代码：见设备单\",\"pos\":[{\"x\":227,\"y\":643},{\"x\":543,\"y\":643},{\"x\":543,\"y\":673},{\"x\":227,\"y\":673}]},{\"word\":\"船名：EVERLUCID/0844-033E\",\"pos\":[{\"x\":223,\"y\":681},{\"x\":708,\"y\":681},{\"x\":708,\"y\":714},{\"x\":223,\"y\":714}]},{\"word\":\"ETD：4-162*40HQ\",\"pos\":[{\"x\":222,\"y\":717},{\"x\":593,\"y\":717},{\"x\":593,\"y\":757},{\"x\":222,\"y\":757}]},{\"word\":\"关单号：APLU063883039\",\"pos\":[{\"x\":226,\"y\":766},{\"x\":589,\"y\":766},{\"x\":589,\"y\":790},{\"x\":226,\"y\":790}]},{\"word\":\"港区：洋3\",\"pos\":[{\"x\":223,\"y\":838},{\"x\":418,\"y\":838},{\"x\":418,\"y\":872},{\"x\":223,\"y\":872}]},{\"word\":\"安排于4-13周5上午8：00到厂做箱\",\"pos\":[{\"x\":231,\"y\":919},{\"x\":642,\"y\":915},{\"x\":642,\"y\":950},{\"x\":232,\"y\":955}]},{\"word\":\"地址：苏州吴中经济开发区河东工业园尹中南路1688号，\",\"pos\":[{\"x\":222,\"y\":954},{\"x\":1115,\"y\":950},{\"x\":1115,\"y\":993},{\"x\":222,\"y\":997}]},{\"word\":\"亚东工业(苏州)有限公司\",\"pos\":[{\"x\":228,\"y\":991},{\"x\":658,\"y\":996},{\"x\":658,\"y\":1034},{\"x\":227,\"y\":1029}]},{\"word\":\"曹平，0512-65951888-6108\",\"pos\":[{\"x\":227,\"y\":1036},{\"x\":638,\"y\":1036},{\"x\":638,\"y\":1065},{\"x\":227,\"y\":1065}]},{\"word\":\"l\",\"pos\":[{\"x\":475,\"y\":2006},{\"x\":485,\"y\":2006},{\"x\":485,\"y\":2022},{\"x\":475,\"y\":2022}]},{\"word\":\"UNIWILL\",\"pos\":[{\"x\":701,\"y\":2005},{\"x\":800,\"y\":2005},{\"x\":800,\"y\":2022},{\"x\":701,\"y\":2022}]}]}";
//        // $url="http://img.320xx.com/public/file_book/13.jpg";;exit;*/
//        echo $mode;exit;
//        $mode="HTTP/1.1 200 OK Server: Tengine Date: Wed, 18 Apr 2018 12:25:18 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 1759 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: 124A24F9-AB5B-4855-BFB9-1FA93736F6BB Vary: Accept-Encoding {\"sid\":\"34f395708ab167564d5d24c1d003d5e96f7ba78bc95e1dfd22cfd82c3f6a9cc19879c6be\",\"prism_version\":\"1.0.6\",\"prism_wnum\":15,\"prism_wordsInfo\":[{\"word\":\"XINDAYANGZHOU\",\"pos\":[{\"x\":75,\"y\":230},{\"x\":337,\"y\":230},{\"x\":337,\"y\":256},{\"x\":75,\"y\":256}]},{\"word\":\"V.031N\",\"pos\":[{\"x\":152,\"y\":260},{\"x\":260,\"y\":260},{\"x\":260,\"y\":282},{\"x\":152,\"y\":282}]},{\"word\":\"SHANGHAI\",\"pos\":[{\"x\":438,\"y\":245},{\"x\":589,\"y\":245},{\"x\":589,\"y\":268},{\"x\":438,\"y\":268}]},{\"word\":\"CAPRR\",\"pos\":[{\"x\":644,\"y\":246},{\"x\":740,\"y\":246},{\"x\":740,\"y\":264},{\"x\":644,\"y\":264}]},{\"word\":\"NASHVILLEyTN\",\"pos\":[{\"x\":793,\"y\":245},{\"x\":967,\"y\":245},{\"x\":967,\"y\":268},{\"x\":793,\"y\":268}]},{\"word\":\"COSU6168987450\",\"pos\":[{\"x\":425,\"y\":510},{\"x\":603,\"y\":510},{\"x\":603,\"y\":529},{\"x\":425,\"y\":529}]},{\"word\":\"40HC\",\"pos\":[{\"x\":172,\"y\":659},{\"x\":246,\"y\":659},{\"x\":246,\"y\":682},{\"x\":172,\"y\":682}]},{\"word\":\"市南湖佳美金属，走锡\",\"pos\":[{\"x\":31,\"y\":773},{\"x\":380,\"y\":757},{\"x\":381,\"y\":796},{\"x\":33,\"y\":812}]},{\"word\":\"袁小姐/13915638030\",\"pos\":[{\"x\":119,\"y\":807},{\"x\":341,\"y\":814},{\"x\":340,\"y\":843},{\"x\":118,\"y\":837}]},{\"word\":\"进港2018-01-2523：\",\"pos\":[{\"x\":1021,\"y\":806},{\"x\":1195,\"y\":806},{\"x\":1195,\"y\":829},{\"x\":1021,\"y\":829}]},{\"word\":\"港2018-01-29-22：00\",\"pos\":[{\"x\":1195,\"y\":814},{\"x\":1386,\"y\":821},{\"x\":1385,\"y\":846},{\"x\":1194,\"y\":839}]},{\"word\":\"2018-01-26号\",\"pos\":[{\"x\":71,\"y\":896},{\"x\":268,\"y\":896},{\"x\":268,\"y\":924},{\"x\":71,\"y\":924}]},{\"word\":\"8点\",\"pos\":[{\"x\":283,\"y\":895},{\"x\":340,\"y\":895},{\"x\":340,\"y\":923},{\"x\":283,\"y\":923}]},{\"word\":\"—一提王量一\",\"pos\":[{\"x\":1021,\"y\":891},{\"x\":1452,\"y\":891},{\"x\":1452,\"y\":928},{\"x\":1021,\"y\":928}]},{\"word\":\"箱号发：13167039356(同步微信)\",\"pos\":[{\"x\":1128,\"y\":953},{\"x\":1408,\"y\":953},{\"x\":1408,\"y\":972},{\"x\":1128,\"y\":972}]}]}";
        $mode='HTTP/1.1 200 OK Server: Tengine Date: Thu, 19 Apr 2018 02:04:49 GMT Content-Type: application/json; charset=UTF-8 Content-Length: 4889 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: 61E4E726-CE00-482A-A9E9-9D2798CAA395 Vary: Accept-Encoding {"sid":"7076008aaf0cba89c85feedc5f307bd527b8ebaa185b53887fc6e7b17294d7e546a4f0a5","prism_version":"1.0.6","prism_wnum":44,"prism_wordsInfo":[{"word":"安吉海川国际物流有限公司","pos":[{"x":489,"y":188},{"x":957,"y":188},{"x":957,"y":225},{"x":489,"y":225}]},{"word":"做箱通知","pos":[{"x":641,"y":265},{"x":804,"y":265},{"x":804,"y":305},{"x":641,"y":305}]},{"word":"我司编号：","pos":[{"x":819,"y":365},{"x":924,"y":365},{"x":924,"y":388},{"x":819,"y":388}]},{"word":"HCJ-HL20180112","pos":[{"x":1051,"y":366},{"x":1261,"y":366},{"x":1261,"y":391},{"x":1051,"y":391}]},{"word":"车队：","pos":[{"x":138,"y":448},{"x":193,"y":448},{"x":193,"y":470},{"x":138,"y":470}]},{"word":"工厂合同号","pos":[{"x":816,"y":448},{"x":932,"y":448},{"x":932,"y":470},{"x":816,"y":470}]},{"word":"SHL17880-7","pos":[{"x":1098,"y":449},{"x":1228,"y":449},{"x":1228,"y":468},{"x":1098,"y":468}]},{"word":"船名航次","pos":[{"x":139,"y":640},{"x":228,"y":640},{"x":228,"y":667},{"x":139,"y":667}]},{"word":"SEOULEXPRESSV.058S","pos":[{"x":370,"y":637},{"x":681,"y":637},{"x":681,"y":662},{"x":370,"y":662}]},{"word":"EGLV142800406330","pos":[{"x":1033,"y":637},{"x":1290,"y":637},{"x":1290,"y":662},{"x":1033,"y":662}]},{"word":"船期：","pos":[{"x":138,"y":722},{"x":193,"y":722},{"x":193,"y":742},{"x":138,"y":742}]},{"word":"4/11/2018","pos":[{"x":453,"y":718},{"x":598,"y":718},{"x":598,"y":745},{"x":453,"y":745}]},{"word":"箱型箱量","pos":[{"x":809,"y":670},{"x":917,"y":670},{"x":917,"y":744},{"x":809,"y":744}]},{"word":"2*40HQ","pos":[{"x":1108,"y":721},{"x":1207,"y":721},{"x":1207,"y":741},{"x":1108,"y":741}]},{"word":"运港：","pos":[{"x":150,"y":807},{"x":218,"y":807},{"x":218,"y":833},{"x":150,"y":833}]},{"word":"上海","pos":[{"x":493,"y":799},{"x":552,"y":799},{"x":552,"y":823},{"x":493,"y":823}]},{"word":"目的港：","pos":[{"x":818,"y":805},{"x":894,"y":805},{"x":894,"y":823},{"x":818,"y":823}]},{"word":"SYDNEY","pos":[{"x":1104,"y":803},{"x":1212,"y":803},{"x":1212,"y":828},{"x":1104,"y":828}]},{"word":"中转港代码","pos":[{"x":175,"y":888},{"x":292,"y":888},{"x":292,"y":915},{"x":175,"y":915}]},{"word":"件数","pos":[{"x":453,"y":887},{"x":502,"y":887},{"x":502,"y":906},{"x":453,"y":906}]},{"word":"毛重","pos":[{"x":793,"y":887},{"x":841,"y":887},{"x":841,"y":906},{"x":793,"y":906}]},{"word":"体积","pos":[{"x":1116,"y":882},{"x":1195,"y":882},{"x":1195,"y":911},{"x":1116,"y":911}]},{"word":"见设备单","pos":[{"x":185,"y":989},{"x":280,"y":989},{"x":280,"y":1012},{"x":185,"y":1012}]},{"word":"114/5496.2/67.44","pos":[{"x":340,"y":972},{"x":583,"y":972},{"x":583,"y":1003},{"x":340,"y":1003}]},{"word":"113/5437.2/66.71","pos":[{"x":705,"y":1001},{"x":948,"y":1001},{"x":948,"y":1032},{"x":705,"y":1032}]},{"word":"截信息时间","pos":[{"x":176,"y":1173},{"x":289,"y":1173},{"x":289,"y":1195},{"x":176,"y":1195}]},{"word":"988下午14点装箱日","pos":[{"x":333,"y":1159},{"x":636,"y":1159},{"x":636,"y":1205},{"x":333,"y":1205}]},{"word":"04月08日下午14点","pos":[{"x":336,"y":1164},{"x":523,"y":1164},{"x":523,"y":1185},{"x":336,"y":1185}]},{"word":"前截VGM","pos":[{"x":336,"y":1186},{"x":421,"y":1187},{"x":420,"y":1204},{"x":336,"y":1203}]},{"word":"4/8/2018","pos":[{"x":647,"y":1171},{"x":790,"y":1171},{"x":790,"y":1202},{"x":647,"y":1202}]},{"word":"港区","pos":[{"x":880,"y":1171},{"x":943,"y":1171},{"x":943,"y":1202},{"x":880,"y":1202}]},{"word":"外1","pos":[{"x":1133,"y":1172},{"x":1183,"y":1172},{"x":1183,"y":1201},{"x":1133,"y":1201}]},{"word":"备注","pos":[{"x":209,"y":1313},{"x":263,"y":1313},{"x":263,"y":1338},{"x":209,"y":1338}]},{"word":"工厂：","pos":[{"x":138,"y":1420},{"x":193,"y":1420},{"x":193,"y":1439},{"x":138,"y":1439}]},{"word":"浙江恒林椅业股份有限公司","pos":[{"x":589,"y":1414},{"x":952,"y":1414},{"x":952,"y":1447},{"x":589,"y":1447}]},{"word":"装箱地省业份限公司","pos":[{"x":503,"y":1557},{"x":1038,"y":1557},{"x":1038,"y":1603},{"x":503,"y":1603}]},{"word":"装箱地址：","pos":[{"x":504,"y":1555},{"x":642,"y":1555},{"x":642,"y":1583},{"x":504,"y":1583}]},{"word":"浙江省","pos":[{"x":582,"y":1595},{"x":660,"y":1595},{"x":660,"y":1615},{"x":582,"y":1615}]},{"word":"备注","pos":[{"x":138,"y":1620},{"x":188,"y":1620},{"x":188,"y":1648},{"x":138,"y":1648}]},{"word":"0572-5227393沙发","pos":[{"x":632,"y":1614},{"x":904,"y":1614},{"x":904,"y":1639},{"x":632,"y":1639}]},{"word":"仓库联系","pos":[{"x":139,"y":1704},{"x":228,"y":1704},{"x":228,"y":1729},{"x":139,"y":1729}]},{"word":"仓库电话","pos":[{"x":430,"y":1703},{"x":535,"y":1703},{"x":535,"y":1722},{"x":430,"y":1722}]},{"word":"电话：17705727898","pos":[{"x":138,"y":1913},{"x":355,"y":1913},{"x":355,"y":1939},{"x":138,"y":1939}]},{"word":"海川经办人：小贾","pos":[{"x":963,"y":1914},{"x":1157,"y":1914},{"x":1157,"y":1938},{"x":963,"y":1938}]}]}';
        //$mode="HTTP/1.1 200 OK Server: Tengine Date: Wed, 18 Apr 2018 02:05:50 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 4180 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: 3F2C56CE-FB69-4DAC-9C56-0D3F44EAB648 Vary: Accept-Encoding {\"sid\":\"54db17ff3d406a282ab297a8d112891674fd96f6f22170df0fa59093905aa0e8cd86a1ea\",\"prism_version\":\"1.0.6\",\"prism_wnum\":35,\"prism_wordsInfo\":[{\"word\":\"江苏天禄国际货运代理有限公司\",\"pos\":[{\"x\":333,\"y\":74},{\"x\":1175,\"y\":74},{\"x\":1175,\"y\":133},{\"x\":333,\"y\":133}]},{\"word\":\"JIANGSUTIROINTERNATIONALFREIGHTFORWARDINGCO.LTD\",\"pos\":[{\"x\":211,\"y\":151},{\"x\":1313,\"y\":151},{\"x\":1313,\"y\":184},{\"x\":211,\"y\":184}]},{\"word\":\"江苏省南通市崇川区工农路29号天虹大厦6楼\",\"pos\":[{\"x\":451,\"y\":200},{\"x\":1064,\"y\":200},{\"x\":1064,\"y\":233},{\"x\":451,\"y\":233}]},{\"word\":\"TEL：13817741995\",\"pos\":[{\"x\":573,\"y\":239},{\"x\":827,\"y\":239},{\"x\":827,\"y\":269},{\"x\":573,\"y\":269}]},{\"word\":\"FAX：\",\"pos\":[{\"x\":878,\"y\":244},{\"x\":935,\"y\":244},{\"x\":935,\"y\":265},{\"x\":878,\"y\":265}]},{\"word\":\"做\",\"pos\":[{\"x\":556,\"y\":413},{\"x\":611,\"y\":413},{\"x\":611,\"y\":464},{\"x\":556,\"y\":464}]},{\"word\":\"箱\",\"pos\":[{\"x\":658,\"y\":411},{\"x\":733,\"y\":411},{\"x\":733,\"y\":469},{\"x\":658,\"y\":469}]},{\"word\":\"通\",\"pos\":[{\"x\":777,\"y\":414},{\"x\":834,\"y\":414},{\"x\":834,\"y\":462},{\"x\":777,\"y\":462}]},{\"word\":\"知\",\"pos\":[{\"x\":887,\"y\":413},{\"x\":951,\"y\":413},{\"x\":951,\"y\":468},{\"x\":887,\"y\":468}]},{\"word\":\"T0：恒小\",\"pos\":[{\"x\":58,\"y\":545},{\"x\":222,\"y\":545},{\"x\":222,\"y\":576},{\"x\":58,\"y\":576}]},{\"word\":\"FM：邢春燕\",\"pos\":[{\"x\":729,\"y\":544},{\"x\":894,\"y\":544},{\"x\":894,\"y\":577},{\"x\":729,\"y\":577}]},{\"word\":\"应急电话：18012441995\",\"pos\":[{\"x\":725,\"y\":602},{\"x\":1073,\"y\":606},{\"x\":1072,\"y\":643},{\"x\":724,\"y\":638}]},{\"word\":\"进仓编号：TSTL18040105\",\"pos\":[{\"x\":62,\"y\":664},{\"x\":414,\"y\":664},{\"x\":414,\"y\":697},{\"x\":62,\"y\":697}]},{\"word\":\"通知日期：2018年04月12旧15：47\",\"pos\":[{\"x\":725,\"y\":664},{\"x\":1193,\"y\":664},{\"x\":1193,\"y\":697},{\"x\":725,\"y\":697}]},{\"word\":\"箱型箱量：1X40\u0027HQ\",\"pos\":[{\"x\":63,\"y\":740},{\"x\":334,\"y\":740},{\"x\":334,\"y\":770},{\"x\":63,\"y\":770}]},{\"word\":\"品\",\"pos\":[{\"x\":734,\"y\":740},{\"x\":765,\"y\":740},{\"x\":765,\"y\":773},{\"x\":734,\"y\":773}]},{\"word\":\"名：\",\"pos\":[{\"x\":817,\"y\":739},{\"x\":869,\"y\":739},{\"x\":869,\"y\":771},{\"x\":817,\"y\":771}]},{\"word\":\"启运港：SHANGHAL\",\"pos\":[{\"x\":67,\"y\":802},{\"x\":352,\"y\":810},{\"x\":351,\"y\":846},{\"x\":66,\"y\":837}]},{\"word\":\"目的地：MOBILE\",\"pos\":[{\"x\":733,\"y\":809},{\"x\":994,\"y\":809},{\"x\":994,\"y\":842},{\"x\":733,\"y\":842}]},{\"word\":\"客户编号：\",\"pos\":[{\"x\":62,\"y\":875},{\"x\":207,\"y\":875},{\"x\":207,\"y\":908},{\"x\":62,\"y\":908}]},{\"word\":\"卸货港：MOBILE\",\"pos\":[{\"x\":730,\"y\":881},{\"x\":992,\"y\":876},{\"x\":993,\"y\":907},{\"x\":730,\"y\":911}]},{\"word\":\"委托件数：866CTNS\",\"pos\":[{\"x\":62,\"y\":939},{\"x\":335,\"y\":944},{\"x\":335,\"y\":979},{\"x\":61,\"y\":974}]},{\"word\":\"委托毛重：19000.00KGS\",\"pos\":[{\"x\":729,\"y\":941},{\"x\":1068,\"y\":941},{\"x\":1068,\"y\":974},{\"x\":729,\"y\":974}]},{\"word\":\"委托体积：68.000CBM\",\"pos\":[{\"x\":62,\"y\":1016},{\"x\":364,\"y\":1016},{\"x\":364,\"y\":1049},{\"x\":62,\"y\":1049}]},{\"word\":\"开航日：2018年04月19日L\",\"pos\":[{\"x\":730,\"y\":1017},{\"x\":1109,\"y\":1017},{\"x\":1109,\"y\":1044},{\"x\":730,\"y\":1044}]},{\"word\":\"船名航次：CONTIBASELV.OPGOPE\",\"pos\":[{\"x\":58,\"y\":1082},{\"x\":526,\"y\":1082},{\"x\":526,\"y\":1115},{\"x\":58,\"y\":1115}]},{\"word\":\"提\",\"pos\":[{\"x\":731,\"y\":1082},{\"x\":763,\"y\":1082},{\"x\":763,\"y\":1110},{\"x\":731,\"y\":1110}]},{\"word\":\"单号：APLU104387542\",\"pos\":[{\"x\":766,\"y\":1082},{\"x\":1102,\"y\":1082},{\"x\":1102,\"y\":1115},{\"x\":766,\"y\":1115}]},{\"word\":\"船公司：\",\"pos\":[{\"x\":63,\"y\":1154},{\"x\":197,\"y\":1154},{\"x\":197,\"y\":1180},{\"x\":63,\"y\":1180}]},{\"word\":\"船务代理：\",\"pos\":[{\"x\":729,\"y\":1152},{\"x\":870,\"y\":1152},{\"x\":870,\"y\":1186},{\"x\":729,\"y\":1186}]},{\"word\":\"做箱时间：2018年04月16日\",\"pos\":[{\"x\":107,\"y\":1268},{\"x\":488,\"y\":1268},{\"x\":488,\"y\":1301},{\"x\":107,\"y\":1301}]},{\"word\":\"做箱地点：常州市孟河镇环镇北路228号\",\"pos\":[{\"x\":107,\"y\":1334},{\"x\":654,\"y\":1341},{\"x\":654,\"y\":1377},{\"x\":107,\"y\":1370}]},{\"word\":\"联系人及电话：小蒸/13961407538\",\"pos\":[{\"x\":103,\"y\":1409},{\"x\":588,\"y\":1409},{\"x\":588,\"y\":1442},{\"x\":103,\"y\":1442}]},{\"word\":\"请安排驾驶员及车辆做箱，谢谢配合!\",\"pos\":[{\"x\":107,\"y\":1484},{\"x\":617,\"y\":1484},{\"x\":617,\"y\":1517},{\"x\":107,\"y\":1517}]},{\"word\":\"16日做箱\",\"pos\":[{\"x\":110,\"y\":1547},{\"x\":308,\"y\":1547},{\"x\":308,\"y\":1593},{\"x\":110,\"y\":1593}]}]}";
        if ($mode) {
            //分割截取字符串
            $str = explode("Vary: Accept-Encoding", $mode);
        }
        if ($str[2]) {
            //josn 转数组
            $str = json_decode($str[2], true);
            $new_str = $str['prism_wordsInfo'];
        }


        $str = '';
        foreach ($new_str as $k => $v) {
            $str .= $v['word'];
        }
       // dump($new_str);exit;//
        if (strstr($str, '浙江雪伏特国际货运代理有限公司')) {

            //雪伏特

            $json=$TemplateBook->XFT($new_str);

            echo $json;
        } elseif(strstr($str, '浙江湖州华凯国际货运代理有限公司')){
            //华凯国际
            $json=$TemplateBook->HKGJ($new_str);
            echo $json;
        }elseif(strstr($str, '江苏众诚国际物流有限公司')){
            //江苏众诚
            $json=$TemplateBook->JSZC($new_str);
            echo $json;
        }elseif(strstr($str, '江苏天禄国际货运代理有限公司')){
            //天禄国际
            $json=$TemplateBook->JSTLGJ($new_str);
            echo $json;
        }elseif(strstr($str, '安吉海川国际物流有限公司')){
            //天禄国际
            $json=$TemplateBook->AJHCGJ($new_str);
            echo $json;
        }else {
            $json=$TemplateBook->OTHER($new_str);
            echo $json;
        }
    }


    //图片上传 view and 存服务器
    public function upload(){
        if (request()->isPost()){
           //dump($_FILES);
            $file = request()->file('myfile');

            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $data['url']=$info->getSaveName();
                    $image=db('image')->insertGetId($data);

                    if($image){
                        $this->makeBook($image);
                    }

                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }

            }

        }else{
            return $this->fetch('index');
        }
    }

    function aliOrc($url)
    {
        $host = "https://ocrapi-document.taobao.com";
        $path = "/ocrservice/document";
        $method = "POST";
        $appcode = "e8557f772fff472c81b38f91a93c2ce1";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        //根据API的要求，定义相对应的Content-Type
        array_push($headers, "Content-Type" . ":" . "application/json; charset=UTF-8");
        $bodys = json_encode(array('url' => $url, 'prob' => false));
        $url = $host . $path;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("\$" . $host, "https://")) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);
        return curl_exec($curl);
    }

}