<?php
namespace app\index\controller;

class pdf
{
    public function index1()
    {
        $srcfilename = 'E:/aa.doc';
        $destfilename = 'E:/aa.pdf';
        if (!file_exists($srcfilename)) {
            return;
        }
        $word = new \COM("word.application") or die("Can't start Word!");
        $word->Visible = 0;
        $word->Documents->Open($srcfilename, false, false, false, "1", "1", true);
        $word->ActiveDocument->final = false;
        $word->ActiveDocument->Saved = true;
        $word->ActiveDocument->ExportAsFixedFormat(
            $destfilename,
            17,
            // wdExportFormatPDF
            false,
            // open file after export
            0,
            // wdExportOptimizeForPrint
            3,
            // wdExportFromTo
            1,
            // begin page
            5000,
            // end page
            7,
            // wdExportDocumentWithMarkup
            true,
            // IncludeDocProps
            true,
            // KeepIRM
            1
        );
        $word->ActiveDocument->Close();
        $word->Quit();
    }

    public function index2()
    {
        $doc_file = "file:///E:/aa.doc";
        $output_file = 'file:///E:/bb.pdf';
        $this->word2pdf($doc_file, $output_file);
    }
    function MakePropertyValue($name, $value, $osm)
    {
        $oStruct = $osm->Bridge_GetStruct("com.sun.star.beans.PropertyValue");
        $oStruct->Name = $name;
        $oStruct->Value = $value;
        return $oStruct;
    }
    function word2pdf($doc_url, $output_url)
    {
        //Invoke the OpenOffice.org service manager
        $osm = new COM("com.sun.star.ServiceManager") or die("Please be sure that OpenOffice.org is installed.\n");
        //Set the application to remain hidden to avoid flashing the document onscreen
        $args = array($this->MakePropertyValue("Hidden", true, $osm));
        //Launch the desktop
        $top = $osm->createInstance("com.sun.star.frame.Desktop");
        //Load the .doc file, and pass in the "Hidden" property from above
        $oWriterDoc = $top->loadComponentFromURL($doc_url, "_blank", 0, $args);
        //Set up the arguments for the PDF output
        $export_args = array($this->MakePropertyValue("FilterName", "writer_pdf_Export", $osm));
        //Write out the PDF
        $oWriterDoc->storeToURL($output_url, $export_args);
        $oWriterDoc->close(true);
        function diff()
        {


            //$mode='HTTP/1.1 200 OK Server: Tengine Date: Thu, 12 Apr 2018 05:29:05 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 4148 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: 3E48A3C9-A1EA-4F5D-B13B-BAA0B4FC5B12 Vary: Accept-Encoding {"sid":"39057904ee8079eba8d6d7172730a223e0e0296ddeb84e8af028a82cab99fa6b5b7d355f","prism_version":"1.0.6","prism_wnum":37,"prism_wordsInfo":[{"word":"兴","pos":[{"x":385,"y":42},{"x":442,"y":42},{"x":442,"y":81},{"x":385,"y":81}]},{"word":"MAERSK","pos":[{"x":454,"y":24},{"x":644,"y":24},{"x":644,"y":55},{"x":454,"y":55}]},{"word":"LINE","pos":[{"x":456,"y":59},{"x":543,"y":59},{"x":543,"y":81},{"x":456,"y":81}]},{"word":"出口提箱打印通知单","pos":[{"x":412,"y":101},{"x":611,"y":101},{"x":611,"y":119},{"x":412,"y":119}]},{"word":"马士基(中国)有限公司上海分公司","pos":[{"x":346,"y":132},{"x":675,"y":132},{"x":675,"y":152},{"x":346,"y":152}]},{"word":"通知单编号：","pos":[{"x":102,"y":178},{"x":216,"y":178},{"x":216,"y":199},{"x":102,"y":199}]},{"word":"00115795198818","pos":[{"x":398,"y":193},{"x":533,"y":193},{"x":533,"y":205},{"x":398,"y":205}]},{"word":"提箱人：","pos":[{"x":104,"y":220},{"x":172,"y":220},{"x":172,"y":238},{"x":104,"y":238}]},{"word":"DC上海东灿物流有限公司021-56443301","pos":[{"x":259,"y":218},{"x":620,"y":218},{"x":620,"y":242},{"x":259,"y":242}]},{"word":"提单","pos":[{"x":104,"y":239},{"x":177,"y":246},{"x":173,"y":282},{"x":101,"y":275}]},{"word":"船名航次：","pos":[{"x":102,"y":273},{"x":191,"y":271},{"x":192,"y":292},{"x":103,"y":294}]},{"word":"586348264","pos":[{"x":259,"y":248},{"x":351,"y":248},{"x":351,"y":263},{"x":259,"y":263}]},{"word":"MSCLEANNEV.FH806W","pos":[{"x":258,"y":276},{"x":473,"y":276},{"x":473,"y":292},{"x":258,"y":292}]},{"word":"尺小箱型：","pos":[{"x":530,"y":246},{"x":672,"y":246},{"x":672,"y":262},{"x":530,"y":262}]},{"word":"40HIGH","pos":[{"x":712,"y":248},{"x":791,"y":248},{"x":791,"y":265},{"x":712,"y":265}]},{"word":"|提运空箱","pos":[{"x":705,"y":270},{"x":793,"y":270},{"x":793,"y":293},{"x":705,"y":293}]},{"word":"提箱地点：","pos":[{"x":103,"y":299},{"x":255,"y":299},{"x":255,"y":318},{"x":103,"y":318}]},{"word":"宜隆堆场广祥路18号/38117292.","pos":[{"x":260,"y":296},{"x":551,"y":298},{"x":550,"y":315},{"x":259,"y":313}]},{"word":"返还地点：","pos":[{"x":103,"y":323},{"x":193,"y":323},{"x":193,"y":345},{"x":103,"y":345}]},{"word":"洋山一号码","pos":[{"x":253,"y":323},{"x":364,"y":323},{"x":364,"y":336},{"x":253,"y":336}]},{"word":"-号码头","pos":[{"x":314,"y":325},{"x":380,"y":325},{"x":380,"y":343},{"x":314,"y":343}]},{"word":"经营八","pos":[{"x":568,"y":324},{"x":706,"y":330},{"x":705,"y":349},{"x":567,"y":343}]},{"word":"以","pos":[{"x":665,"y":307},{"x":768,"y":341},{"x":762,"y":361},{"x":658,"y":327}]},{"word":"MAEU","pos":[{"x":713,"y":327},{"x":771,"y":327},{"x":771,"y":343},{"x":713,"y":343}]},{"word":"联系电话：_38117203：38117218工LE有","pos":[{"x":104,"y":353},{"x":608,"y":353},{"x":608,"y":379},{"x":104,"y":379}]},{"word":"有效日期：","pos":[{"x":545,"y":351},{"x":709,"y":351},{"x":710,"y":368},{"x":546,"y":368}]},{"word":"效日期女2018-02-030946","pos":[{"x":608,"y":343},{"x":866,"y":350},{"x":865,"y":379},{"x":607,"y":372}]},{"word":"备注：","pos":[{"x":105,"y":377},{"x":154,"y":377},{"x":154,"y":398},{"x":105,"y":398}]},{"word":"中转港：GBFXT","pos":[{"x":259,"y":379},{"x":390,"y":379},{"x":390,"y":397},{"x":259,"y":397}]},{"word":"本通知单上的船名","pos":[{"x":259,"y":399},{"x":425,"y":399},{"x":425,"y":417},{"x":259,"y":417}]},{"word":"/车队进港请以实际提箱","pos":[{"x":697,"y":399},{"x":912,"y":399},{"x":912,"y":424},{"x":697,"y":424}]},{"word":"时发放的设备交接单","pos":[{"x":258,"y":423},{"x":438,"y":423},{"x":439,"y":442},{"x":259,"y":442}]},{"word":"供上海地区使用用","pos":[{"x":513,"y":425},{"x":628,"y":422},{"x":629,"y":438},{"x":514,"y":441}]},{"word":"编号：1/1","pos":[{"x":259,"y":448},{"x":327,"y":448},{"x":327,"y":463},{"x":259,"y":463}]},{"word":"1号：","pos":[{"x":275,"y":453},{"x":300,"y":453},{"x":300,"y":466},{"x":275,"y":466}]},{"word":"：11/","pos":[{"x":295,"y":446},{"x":321,"y":446},{"x":321,"y":468},{"x":295,"y":468}]},{"word":"飞有7","pos":[{"x":468,"y":473},{"x":670,"y":473},{"x":670,"y":515},{"x":468,"y":515}]}]}';
            //$mode=$this->aliOrc();
            ///
            $mode = 'HTTP/1.1 200 OK Server: Tengine Date: Thu, 12 Apr 2018 03:34:44 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 4046 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: 59CBFBEC-5E0C-482B-8125-9043217A5FA5 Vary: Accept-Encoding {"sid":"040f9b71cea92340250f39333db5ffb903ad30cf7d0727ba4a326240f3c7b46d3249d107","prism_version":"1.0.6","prism_wnum":36,"prism_wordsInfo":[{"word":"兴","pos":[{"x":385,"y":42},{"x":442,"y":42},{"x":442,"y":81},{"x":385,"y":81}]},{"word":"MAERSK","pos":[{"x":454,"y":24},{"x":644,"y":24},{"x":644,"y":55},{"x":454,"y":55}]},{"word":"LINE","pos":[{"x":456,"y":59},{"x":543,"y":59},{"x":543,"y":81},{"x":456,"y":81}]},{"word":"出口提箱打印通知单","pos":[{"x":412,"y":101},{"x":611,"y":101},{"x":611,"y":119},{"x":412,"y":119}]},{"word":"马士基(中国)有限公司上海分公司","pos":[{"x":348,"y":131},{"x":676,"y":131},{"x":676,"y":153},{"x":348,"y":153}]},{"word":"r","pos":[{"x":775,"y":162},{"x":912,"y":162},{"x":912,"y":173},{"x":775,"y":173}]},{"word":"通知单编号：","pos":[{"x":102,"y":178},{"x":216,"y":178},{"x":216,"y":199},{"x":102,"y":199}]},{"word":"00994795427O47","pos":[{"x":398,"y":193},{"x":533,"y":193},{"x":533,"y":205},{"x":398,"y":205}]},{"word":"提箱人：D","pos":[{"x":102,"y":216},{"x":269,"y":216},{"x":269,"y":245},{"x":102,"y":245}]},{"word":"DC上海东灿物流有限公司021-56443301","pos":[{"x":259,"y":219},{"x":621,"y":219},{"x":621,"y":237},{"x":259,"y":237}]},{"word":"提单号：","pos":[{"x":104,"y":239},{"x":176,"y":246},{"x":173,"y":282},{"x":100,"y":275}]},{"word":"船名航次：","pos":[{"x":102,"y":273},{"x":191,"y":271},{"x":192,"y":292},{"x":103,"y":294}]},{"word":"579202219","pos":[{"x":259,"y":248},{"x":351,"y":248},{"x":351,"y":263},{"x":259,"y":263}]},{"word":"MSCLEANNEV.FH806W","pos":[{"x":260,"y":275},{"x":474,"y":277},{"x":473,"y":292},{"x":259,"y":290}]},{"word":"箱型：","pos":[{"x":491,"y":246},{"x":681,"y":246},{"x":681,"y":262},{"x":491,"y":262}]},{"word":"40DRY","pos":[{"x":719,"y":248},{"x":791,"y":248},{"x":791,"y":265},{"x":719,"y":265}]},{"word":"提运空箱","pos":[{"x":710,"y":270},{"x":799,"y":270},{"x":799,"y":292},{"x":710,"y":292}]},{"word":"提箱地点：","pos":[{"x":105,"y":299},{"x":192,"y":299},{"x":192,"y":317},{"x":105,"y":317}]},{"word":"怡丰堆场莱阳路2700号","pos":[{"x":259,"y":299},{"x":473,"y":297},{"x":474,"y":314},{"x":260,"y":316}]},{"word":"返还地点：","pos":[{"x":103,"y":322},{"x":264,"y":322},{"x":264,"y":347},{"x":103,"y":347}]},{"word":"洋山一号码头","pos":[{"x":259,"y":320},{"x":381,"y":327},{"x":380,"y":343},{"x":258,"y":335}]},{"word":"成专经营入MAEU二","pos":[{"x":443,"y":321},{"x":916,"y":321},{"x":916,"y":347},{"x":443,"y":347}]},{"word":"放箱专用营","pos":[{"x":486,"y":307},{"x":639,"y":313},{"x":638,"y":341},{"x":485,"y":335}]},{"word":"联系电话：","pos":[{"x":105,"y":352},{"x":198,"y":352},{"x":198,"y":373},{"x":105,"y":373}]},{"word":"13701971149：506778送1","pos":[{"x":260,"y":347},{"x":487,"y":347},{"x":487,"y":367},{"x":260,"y":367}]},{"word":"有效日期","pos":[{"x":596,"y":351},{"x":708,"y":349},{"x":709,"y":366},{"x":597,"y":368}]},{"word":"2018-02-0310：14","pos":[{"x":707,"y":353},{"x":869,"y":353},{"x":869,"y":372},{"x":707,"y":372}]},{"word":"备注：","pos":[{"x":105,"y":377},{"x":154,"y":377},{"x":154,"y":398},{"x":105,"y":398}]},{"word":"中转港：GBFXT","pos":[{"x":255,"y":379},{"x":400,"y":379},{"x":400,"y":398},{"x":255,"y":398}]},{"word":"本通知单上的船名","pos":[{"x":260,"y":400},{"x":419,"y":400},{"x":419,"y":419},{"x":260,"y":419}]},{"word":"中转港信息仅供","pos":[{"x":501,"y":401},{"x":631,"y":401},{"x":630,"y":420},{"x":500,"y":420}]},{"word":"I车队进港请以实际提箱","pos":[{"x":699,"y":399},{"x":912,"y":399},{"x":912,"y":424},{"x":699,"y":424}]},{"word":"时发放的设备交接单","pos":[{"x":259,"y":423},{"x":440,"y":423},{"x":441,"y":442},{"x":260,"y":442}]},{"word":"供上海地区使用","pos":[{"x":515,"y":425},{"x":630,"y":422},{"x":631,"y":438},{"x":516,"y":441}]},{"word":")航达有7","pos":[{"x":468,"y":473},{"x":669,"y":473},{"x":669,"y":499},{"x":468,"y":499}]},{"word":"运有限","pos":[{"x":530,"y":474},{"x":627,"y":474},{"x":627,"y":497},{"x":530,"y":497}]}]}';

            //$mode='HTTP/1.1 200 OK Server: Tengine Date: Thu, 12 Apr 2018 05:36:40 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 4147 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: 53D2E0FA-90C1-4A8A-BB06-6AFD763A7635 Vary: Accept-Encoding {"sid":"a44bc0d851928f15608dbb975a927414a07bc63cfba065e6463a8d06e41691d7d8ba5920","prism_version":"1.0.6","prism_wnum":37,"prism_wordsInfo":[{"word":"兴","pos":[{"x":385,"y":42},{"x":442,"y":42},{"x":442,"y":81},{"x":385,"y":81}]},{"word":"MAERSK","pos":[{"x":454,"y":24},{"x":644,"y":24},{"x":644,"y":55},{"x":454,"y":55}]},{"word":"LINE","pos":[{"x":456,"y":59},{"x":543,"y":59},{"x":543,"y":81},{"x":456,"y":81}]},{"word":"回i回","pos":[{"x":775,"y":41},{"x":912,"y":41},{"x":912,"y":88},{"x":775,"y":88}]},{"word":"出口提箱打印通知单","pos":[{"x":415,"y":101},{"x":611,"y":101},{"x":611,"y":119},{"x":415,"y":119}]},{"word":"马士基(中国)有限公司上海分公司","pos":[{"x":349,"y":131},{"x":675,"y":134},{"x":675,"y":155},{"x":349,"y":151}]},{"word":"通知单编号：","pos":[{"x":102,"y":178},{"x":216,"y":178},{"x":216,"y":199},{"x":102,"y":199}]},{"word":"00370795198806","pos":[{"x":398,"y":193},{"x":533,"y":193},{"x":533,"y":205},{"x":398,"y":205}]},{"word":"提箱人：","pos":[{"x":101,"y":218},{"x":262,"y":215},{"x":263,"y":239},{"x":102,"y":242}]},{"word":"DC上海东灿物流有限公司021-56443301","pos":[{"x":259,"y":219},{"x":621,"y":219},{"x":621,"y":237},{"x":259,"y":237}]},{"word":"提单号：","pos":[{"x":104,"y":239},{"x":177,"y":246},{"x":173,"y":282},{"x":101,"y":275}]},{"word":"船名航次：","pos":[{"x":102,"y":273},{"x":191,"y":271},{"x":192,"y":292},{"x":103,"y":294}]},{"word":"586348261","pos":[{"x":259,"y":248},{"x":358,"y":248},{"x":358,"y":262},{"x":259,"y":262}]},{"word":"MSCLEANNEV.FH806W","pos":[{"x":258,"y":276},{"x":473,"y":276},{"x":473,"y":292},{"x":258,"y":292}]},{"word":"c尺小箱型：","pos":[{"x":530,"y":246},{"x":672,"y":246},{"x":672,"y":262},{"x":530,"y":262}]},{"word":"二场","pos":[{"x":561,"y":272},{"x":676,"y":272},{"x":676,"y":293},{"x":561,"y":293}]},{"word":"40HIGH","pos":[{"x":712,"y":248},{"x":791,"y":248},{"x":791,"y":265},{"x":712,"y":265}]},{"word":"|提运空箱","pos":[{"x":705,"y":270},{"x":793,"y":270},{"x":793,"y":293},{"x":705,"y":293}]},{"word":"提箱地点：","pos":[{"x":103,"y":299},{"x":255,"y":299},{"x":255,"y":318},{"x":103,"y":318}]},{"word":"宜隆堆场广祥路18号/38117292.","pos":[{"x":260,"y":296},{"x":551,"y":298},{"x":550,"y":315},{"x":259,"y":313}]},{"word":"返还地点：洋山","pos":[{"x":103,"y":322},{"x":297,"y":322},{"x":297,"y":347},{"x":103,"y":347}]},{"word":"洋山一号码","pos":[{"x":253,"y":327},{"x":363,"y":327},{"x":363,"y":336},{"x":253,"y":336}]},{"word":"-号码头","pos":[{"x":314,"y":325},{"x":380,"y":325},{"x":380,"y":343},{"x":314,"y":343}]},{"word":"/相经营心MAEU","pos":[{"x":456,"y":323},{"x":774,"y":323},{"x":774,"y":348},{"x":456,"y":348}]},{"word":"以","pos":[{"x":665,"y":307},{"x":768,"y":341},{"x":762,"y":361},{"x":658,"y":327}]},{"word":"联系电话二38117203338117218!1-","pos":[{"x":103,"y":344},{"x":609,"y":355},{"x":608,"y":382},{"x":103,"y":371}]},{"word":"有效日期：","pos":[{"x":545,"y":351},{"x":709,"y":351},{"x":710,"y":368},{"x":546,"y":368}]},{"word":"效日期2018-02-030947","pos":[{"x":608,"y":343},{"x":868,"y":350},{"x":868,"y":379},{"x":607,"y":372}]},{"word":"备注：","pos":[{"x":105,"y":377},{"x":154,"y":377},{"x":154,"y":398},{"x":105,"y":398}]},{"word":"中转港：GBFXT","pos":[{"x":259,"y":379},{"x":390,"y":379},{"x":390,"y":397},{"x":259,"y":397}]},{"word":"本通知单上的船名","pos":[{"x":259,"y":399},{"x":425,"y":399},{"x":425,"y":417},{"x":259,"y":417}]},{"word":"/车队进港请以实际提箱","pos":[{"x":697,"y":399},{"x":912,"y":399},{"x":912,"y":424},{"x":697,"y":424}]},{"word":"时发放的设备交接单","pos":[{"x":258,"y":423},{"x":438,"y":423},{"x":439,"y":442},{"x":259,"y":442}]},{"word":"供上海地区使用","pos":[{"x":513,"y":425},{"x":628,"y":422},{"x":629,"y":438},{"x":514,"y":441}]},{"word":"编号：1/1","pos":[{"x":259,"y":448},{"x":327,"y":448},{"x":327,"y":463},{"x":259,"y":463}]},{"word":"1号：","pos":[{"x":275,"y":453},{"x":300,"y":453},{"x":300,"y":466},{"x":275,"y":466}]},{"word":"飞有","pos":[{"x":468,"y":473},{"x":670,"y":473},{"x":670,"y":515},{"x":468,"y":515}]}]}';
            //$mode='HTTP/1.1 200 OK Server: Tengine Date: Thu, 12 Apr 2018 08:06:13 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 2824 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: 2E801305-4634-479F-BE24-E3FD0883A2C0 Vary: Accept-Encoding {"sid":"382466d0ffe689cd4e283918a9a03d4007a84d62dbe839d685c6537c96a99b84bbaad8c0","prism_version":"1.0.6","prism_wnum":24,"prism_wordsInfo":[{"word":"MSC(中国)有限公司上海分公司","pos":[{"x":305,"y":76},{"x":487,"y":76},{"x":487,"y":89},{"x":305,"y":89}]},{"word":"设各交接单换领地址：","pos":[{"x":162,"y":98},{"x":275,"y":98},{"x":275,"y":111},{"x":162,"y":111}]},{"word":"通知单编号：","pos":[{"x":183,"y":154},{"x":251,"y":154},{"x":251,"y":166},{"x":183,"y":166}]},{"word":"100970163","pos":[{"x":411,"y":169},{"x":634,"y":169},{"x":634,"y":199},{"x":411,"y":199}]},{"word":"提箱人：","pos":[{"x":194,"y":209},{"x":243,"y":209},{"x":243,"y":223},{"x":194,"y":223}]},{"word":"上海高运国际物流有限公司","pos":[{"x":396,"y":208},{"x":549,"y":208},{"x":549,"y":222},{"x":396,"y":222}]},{"word":"提单号：","pos":[{"x":193,"y":231},{"x":244,"y":231},{"x":244,"y":245},{"x":193,"y":245}]},{"word":"177VZHZHS466581尺寸箱型：","pos":[{"x":299,"y":232},{"x":497,"y":232},{"x":497,"y":245},{"x":299,"y":245}]},{"word":"20\u0027GP","pos":[{"x":557,"y":233},{"x":600,"y":233},{"x":600,"y":245},{"x":557,"y":245}]},{"word":"船名航次：","pos":[{"x":189,"y":256},{"x":250,"y":256},{"x":250,"y":268},{"x":189,"y":268}]},{"word":"MSCIRENE/FT809W","pos":[{"x":400,"y":257},{"x":541,"y":257},{"x":541,"y":268},{"x":400,"y":268}]},{"word":"提箱地点：","pos":[{"x":188,"y":278},{"x":248,"y":278},{"x":248,"y":291},{"x":188,"y":291}]},{"word":"洋山冠东码头","pos":[{"x":429,"y":278},{"x":510,"y":278},{"x":510,"y":291},{"x":429,"y":291}]},{"word":"返还地点：","pos":[{"x":189,"y":301},{"x":250,"y":301},{"x":250,"y":314},{"x":189,"y":314}]},{"word":"洋山一号码头营运人：","pos":[{"x":321,"y":297},{"x":514,"y":297},{"x":514,"y":316},{"x":321,"y":316}]},{"word":"MSC","pos":[{"x":560,"y":301},{"x":597,"y":301},{"x":597,"y":313},{"x":560,"y":313}]},{"word":"联系电话：","pos":[{"x":189,"y":323},{"x":243,"y":323},{"x":243,"y":336},{"x":189,"y":336}]},{"word":"有效日期：2018-03-0409：40：00","pos":[{"x":433,"y":323},{"x":647,"y":323},{"x":647,"y":338},{"x":433,"y":338}]},{"word":"提箱预约号20GP：1809806640GP：74203321","pos":[{"x":338,"y":348},{"x":601,"y":348},{"x":601,"y":360},{"x":338,"y":360}]},{"word":"各注：","pos":[{"x":203,"y":369},{"x":236,"y":369},{"x":236,"y":382},{"x":203,"y":382}]},{"word":"40HC：3826045545HC：97257511","pos":[{"x":364,"y":370},{"x":576,"y":370},{"x":576,"y":383},{"x":364,"y":383}]},{"word":"箱标识：","pos":[{"x":194,"y":415},{"x":242,"y":415},{"x":242,"y":426},{"x":194,"y":426}]},{"word":"客户通知栏：","pos":[{"x":186,"y":436},{"x":256,"y":436},{"x":256,"y":450},{"x":186,"y":450}]},{"word":"58485053","pos":[{"x":436,"y":439},{"x":505,"y":439},{"x":505,"y":449},{"x":436,"y":449}]}]}';
            //$mode="HTTP/1.1 200 OK Server: Tengine Date: Thu, 12 Apr 2018 07:59:13 GMT Content-Type: application/json;charset=UTF-8 Content-Length: 2929 Connection: keep-alive Vary: Accept-Encoding Access-Control-Allow-Origin: * Access-Control-Allow-Methods: GET,POST,PUT,DELETE,HEAD,OPTIONS,PATCH Access-Control-Allow-Headers: X-Requested-With,X-Sequence,X-Ca-Key,X-Ca-Secret,X-Ca-Version,X-Ca-Timestamp,X-Ca-Nonce,X-Ca-API-Key,X-Ca-Stage,X-Ca-Client-DeviceId,X-Ca-Client-AppId,X-Ca-Signature,X-Ca-Signature-Headers,X-Ca-Signature-Method,X-Forwarded-For,X-Ca-Date,X-Ca-Request-Mode,Authorization,Content-Type,Accept,Accept-Ranges,Cache-Control,Range,Content-MD5 Access-Control-Max-Age: 172800 X-Ca-Request-Id: E4C2A609-D5EA-440A-849B-8EF03FEE95BA Vary: Accept-Encoding {\"sid\":\"f63c2c5bf115e48acc73a59ca1cfd276d2a193bfc3302c8dda955abf91b5eee9b665e46f\",\"prism_version\":\"1.0.6\",\"prism_wnum\":25,\"prism_wordsInfo\":[{\"word\":\"MSC(中国)有限公司上海分公司\",\"pos\":[{\"x\":389,\"y\":96},{\"x\":615,\"y\":96},{\"x\":615,\"y\":113},{\"x\":389,\"y\":113}]},{\"word\":\"设备交接单换领地址：\",\"pos\":[{\"x\":203,\"y\":125},{\"x\":345,\"y\":125},{\"x\":345,\"y\":139},{\"x\":203,\"y\":139}]},{\"word\":\"口口\",\"pos\":[{\"x\":393,\"y\":151},{\"x\":493,\"y\":151},{\"x\":493,\"y\":179},{\"x\":393,\"y\":179}]},{\"word\":\"通知单编号：\",\"pos\":[{\"x\":232,\"y\":194},{\"x\":316,\"y\":194},{\"x\":316,\"y\":212},{\"x\":232,\"y\":212}]},{\"word\":\"100969696\",\"pos\":[{\"x\":520,\"y\":214},{\"x\":797,\"y\":214},{\"x\":797,\"y\":249},{\"x\":520,\"y\":249}]},{\"word\":\"是箱人\",\"pos\":[{\"x\":256,\"y\":268},{\"x\":288,\"y\":268},{\"x\":288,\"y\":277},{\"x\":256,\"y\":277}]},{\"word\":\"上海高运国际物流有限公司\",\"pos\":[{\"x\":497,\"y\":264},{\"x\":695,\"y\":264},{\"x\":695,\"y\":281},{\"x\":497,\"y\":281}]},{\"word\":\"提单号：177FSJSJS00226上尺寸箱型：20GP\",\"pos\":[{\"x\":184,\"y\":289},{\"x\":813,\"y\":289},{\"x\":813,\"y\":313},{\"x\":184,\"y\":313}]},{\"word\":\"20\u0027GP\",\"pos\":[{\"x\":705,\"y\":295},{\"x\":752,\"y\":295},{\"x\":752,\"y\":308},{\"x\":705,\"y\":308}]},{\"word\":\"船名航次：\",\"pos\":[{\"x\":235,\"y\":322},{\"x\":311,\"y\":322},{\"x\":311,\"y\":339},{\"x\":235,\"y\":339}]},{\"word\":\"MSCCLARA/FH810W\",\"pos\":[{\"x\":506,\"y\":323},{\"x\":687,\"y\":323},{\"x\":687,\"y\":339},{\"x\":506,\"y\":339}]},{\"word\":\"提箱地点：\",\"pos\":[{\"x\":243,\"y\":350},{\"x\":311,\"y\":350},{\"x\":311,\"y\":367},{\"x\":243,\"y\":367}]},{\"word\":\"洋山冠东码头\",\"pos\":[{\"x\":547,\"y\":351},{\"x\":639,\"y\":351},{\"x\":639,\"y\":365},{\"x\":547,\"y\":365}]},{\"word\":\"返还地点：\",\"pos\":[{\"x\":237,\"y\":377},{\"x\":309,\"y\":377},{\"x\":309,\"y\":395},{\"x\":237,\"y\":395}]},{\"word\":\"洋山一号码头营运人：\",\"pos\":[{\"x\":395,\"y\":380},{\"x\":604,\"y\":380},{\"x\":604,\"y\":397},{\"x\":395,\"y\":397}]},{\"word\":\"MSC\",\"pos\":[{\"x\":703,\"y\":382},{\"x\":752,\"y\":382},{\"x\":752,\"y\":396},{\"x\":703,\"y\":396}]},{\"word\":\"联系电话：\",\"pos\":[{\"x\":240,\"y\":408},{\"x\":308,\"y\":408},{\"x\":308,\"y\":423},{\"x\":240,\"y\":423}]},{\"word\":\"有效日期：\",\"pos\":[{\"x\":546,\"y\":409},{\"x\":613,\"y\":409},{\"x\":613,\"y\":422},{\"x\":546,\"y\":422}]},{\"word\":\"2018-03-0314：38：00\",\"pos\":[{\"x\":645,\"y\":411},{\"x\":811,\"y\":411},{\"x\":811,\"y\":423},{\"x\":645,\"y\":423}]},{\"word\":\"提箱预约号20GP：1809806640GP：74203321\",\"pos\":[{\"x\":428,\"y\":439},{\"x\":758,\"y\":439},{\"x\":758,\"y\":453},{\"x\":428,\"y\":453}]},{\"word\":\"各注：\",\"pos\":[{\"x\":257,\"y\":465},{\"x\":293,\"y\":465},{\"x\":293,\"y\":479},{\"x\":257,\"y\":479}]},{\"word\":\"40HC：3826045545HC：97257511\",\"pos\":[{\"x\":464,\"y\":468},{\"x\":721,\"y\":468},{\"x\":721,\"y\":480},{\"x\":464,\"y\":480}]},{\"word\":\"箱标识：\",\"pos\":[{\"x\":248,\"y\":522},{\"x\":300,\"y\":522},{\"x\":300,\"y\":536},{\"x\":248,\"y\":536}]},{\"word\":\"客户通知栏：\",\"pos\":[{\"x\":232,\"y\":551},{\"x\":315,\"y\":551},{\"x\":315,\"y\":565},{\"x\":232,\"y\":565}]},{\"word\":\"36588096\",\"pos\":[{\"x\":554,\"y\":558},{\"x\":633,\"y\":558},{\"x\":633,\"y\":567},{\"x\":554,\"y\":567}]}]}";
            if ($mode) {
                //分割截取字符串
                $str = explode(" Vary: Accept-Encoding", $mode);
            }

            if ($str[2]) {
                //josn 转数组
                $str = json_decode($str[2], true);
                $new_str = $str['prism_wordsInfo'];

            }
            //dump($new_str);exit;
            $str = '';
            foreach ($new_str as $k => $v) {
                $str .= $v['word'];
            }


            if (strstr($str, 'MAERSK') || strstr($str, '马士基(中国)有限公司')) {
                $this->MAERSK($new_str);
            } else {
                echo "未找到模板";
            }


        }

    }


    //MAERSK 模板
    public function MAERSK($new_str){


        if($new_str){
            foreach ($new_str as $k =>$v){
                if($v['word']=='提单号：'){
                    $key=$k+2;
                }else{
                    if(strstr($v['word'],'提单')||strstr($v['word'],'提单号')||strstr($v['word'],'单号：')){
                        $key=$k+2;break;
                    }
                }
            }
        }

        //提单号的结果筛选
        if($key){
            //剔除汉字 标点 和长度小于6位的字符串
            if(!preg_match('/[\x{4e00}-\x{9fa5}]/u',$new_str[$key]['word'])&&strlen($new_str[$key]['word'])>6&&!preg_match('/([[:punct:]])+/U',$new_str[$key]['word'])){
                echo "提单号:".$new_str[$key]['word'];
            }else{
                //没找到 上一位查找

                if(!preg_match('/[\x{4e00}-\x{9fa5}]&&[[:punct:]]/u',$new_str[$key-1]['word'])&&strlen($new_str[$key]['word'])>6&&!preg_match('/([[:punct:]])+/U',$new_str[$key-1]['word'])){
                    echo "提单号:".$new_str[$key-1]['word'];
                }else{
                    //没找到 下一位查找

                    if(!preg_match('/[\x{4e00}-\x{9fa5}]&&[[:punct:]]/u',$new_str[$key+1]['word'])&&strlen($new_str[$key]['word'])>6&&!preg_match('/([[:punct:]])+/U',$new_str[$key+1]['word'])){
                        echo "提单号:".$new_str[$key+1]['word'];
                    }else{
                        echo '没有找到';
                    }
                }
            }
        }else{
            echo '没有找到';
        }

    }
}
