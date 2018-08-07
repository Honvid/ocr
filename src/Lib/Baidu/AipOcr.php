<?php

namespace Honvid\Lib\Baidu;

/*
* Copyright (c) 2017 Baidu.com, Inc. All Rights Reserved
*
* Licensed under the Apache License, Version 2.0 (the "License"); you may not
* use this file except in compliance with the License. You may obtain a copy of
* the License at
*
* Http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
* WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
* License for the specific language governing permissions and limitations under
* the License.
*/


class AipOcr extends AipBase
{

    /**
     * 通用文字识别 general_basic api url
     *
     * @var string
     */
    private $generalBasicUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/general_basic';

    /**
     * 通用文字识别（高精度版） accurate_basic api url
     *
     * @var string
     */
    private $accurateBasicUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/accurate_basic';

    /**
     * 通用文字识别（含位置信息版） general api url
     *
     * @var string
     */
    private $generalUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/general';

    /**
     * 通用文字识别（含位置高精度版） accurate api url
     *
     * @var string
     */
    private $accurateUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/accurate';

    /**
     * 通用文字识别（含生僻字版） general_enhanced api url
     *
     * @var string
     */
    private $generalEnhancedUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/general_enhanced';

    /**
     * 网络图片文字识别 web_image api url
     *
     * @var string
     */
    private $webImageUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/webimage';

    /**
     * 身份证识别 idcard api url
     *
     * @var string
     */
    private $idcardUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/idcard';

    /**
     * 银行卡识别 bankcard api url
     *
     * @var string
     */
    private $bankcardUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/bankcard';

    /**
     * 驾驶证识别 driving_license api url
     *
     * @var string
     */
    private $drivingLicenseUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/driving_license';

    /**
     * 行驶证识别 vehicle_license api url
     *
     * @var string
     */
    private $vehicleLicenseUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/vehicle_license';

    /**
     * 车牌识别 license_plate api url
     *
     * @var string
     */
    private $licensePlateUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/license_plate';

    /**
     * 营业执照识别 business_license api url
     *
     * @var string
     */
    private $businessLicenseUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/business_license';

    /**
     * 通用票据识别 receipt api url
     *
     * @var string
     */
    private $receiptUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/receipt';

    /**
     * 表格文字识别同步接口 form api url
     *
     * @var string
     */
    private $formUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/form';

    /**
     * 表格文字识别 table_recognize api url
     *
     * @var string
     */
    private $tableRecognizeUrl = 'https://aip.baidubce.com/rest/2.0/solution/v1/form_ocr/request';

    /**
     * 表格识别结果 table_result_get api url
     *
     * @var string
     */
    private $tableResultGetUrl = 'https://aip.baidubce.com/rest/2.0/solution/v1/form_ocr/get_request_result';

    /**
     * 增值税发票识别 vat_invoice api url
     *
     * @var string
     */
    private $vatInvoiceUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/vat_invoice';

    /**
     * 二维码识别 qrcode api url
     *
     * @var string
     */
    private $qrcodeUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/qrcode';

    /**
     * 数字识别 numbers api url
     *
     * @var string
     */
    private $numbersUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/numbers';

    /**
     * 彩票识别 lottery api url
     *
     * @var string
     */
    private $lotteryUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/lottery';

    /**
     * 护照识别 passport api url
     *
     * @var string
     */
    private $passportUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/passport';

    /**
     * 名片识别 business_card api url
     *
     * @var string
     */
    private $businessCardUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/business_card';

    /**
     * 手写文字识别 handwriting api url
     *
     * @var string
     */
    private $handwritingUrl = 'https://aip.baidubce.com/rest/2.0/ocr/v1/handwriting';

    /**
     * 自定义模板文字识别 custom api url
     *
     * @var string
     */
    private $customUrl = 'https://aip.baidubce.com/rest/2.0/solution/v1/iocr/recognise';


    /**
     * 通用文字识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        language_type 识别语言类型，默认为CHN_ENG。可选值包括：<br>- CHN_ENG：中英文混合；<br>- ENG：英文；<br>-
     *                        POR：葡萄牙语；<br>- FRE：法语；<br>- GER：德语；<br>- ITA：意大利语；<br>- SPA：西班牙语；<br>- RUS：俄语；<br>-
     *                        JAP：日语；<br>- KOR：韩语； detect_direction
     *                        是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>- true：检测朝向；<br>-
     *                        false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语） probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function basicGeneral($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->generalBasicUrl, $data);
    }

    /**
     * 通用文字识别接口
     *
     * @param string $url     -
     *                        图片完整URL，URL长度不超过1024字节，URL对应的图片base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式，当image字段存在时url字段失效
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        language_type 识别语言类型，默认为CHN_ENG。可选值包括：<br>- CHN_ENG：中英文混合；<br>- ENG：英文；<br>-
     *                        POR：葡萄牙语；<br>- FRE：法语；<br>- GER：德语；<br>- ITA：意大利语；<br>- SPA：西班牙语；<br>- RUS：俄语；<br>-
     *                        JAP：日语；<br>- KOR：韩语； detect_direction
     *                        是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>- true：检测朝向；<br>-
     *                        false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语） probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function basicGeneralUrl($url, $options = [])
    {

        $data = [];

        $data['url'] = $url;

        $data = array_merge($data, $options);

        return $this->request($this->generalBasicUrl, $data);
    }

    /**
     * 通用文字识别（高精度版）接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。 probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function basicAccurate($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->accurateBasicUrl, $data);
    }

    /**
     * 通用文字识别（含位置信息版）接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        recognize_granularity 是否定位单字符位置，big：不定位单字符位置，默认值；small：定位单字符位置
     *                        language_type 识别语言类型，默认为CHN_ENG。可选值包括：<br>- CHN_ENG：中英文混合；<br>- ENG：英文；<br>-
     *                        POR：葡萄牙语；<br>- FRE：法语；<br>- GER：德语；<br>- ITA：意大利语；<br>- SPA：西班牙语；<br>- RUS：俄语；<br>-
     *                        JAP：日语；<br>- KOR：韩语； detect_direction
     *                        是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>- true：检测朝向；<br>-
     *                        false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语） vertexes_location
     *                        是否返回文字外接多边形顶点位置，不支持单字位置。默认为false probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function general($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->generalUrl, $data);
    }

    /**
     * 通用文字识别（含位置信息版）接口
     *
     * @param string $url     -
     *                        图片完整URL，URL长度不超过1024字节，URL对应的图片base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式，当image字段存在时url字段失效
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        recognize_granularity 是否定位单字符位置，big：不定位单字符位置，默认值；small：定位单字符位置
     *                        language_type 识别语言类型，默认为CHN_ENG。可选值包括：<br>- CHN_ENG：中英文混合；<br>- ENG：英文；<br>-
     *                        POR：葡萄牙语；<br>- FRE：法语；<br>- GER：德语；<br>- ITA：意大利语；<br>- SPA：西班牙语；<br>- RUS：俄语；<br>-
     *                        JAP：日语；<br>- KOR：韩语； detect_direction
     *                        是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>- true：检测朝向；<br>-
     *                        false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语） vertexes_location
     *                        是否返回文字外接多边形顶点位置，不支持单字位置。默认为false probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function generalUrl($url, $options = [])
    {

        $data = [];

        $data['url'] = $url;

        $data = array_merge($data, $options);

        return $this->request($this->generalUrl, $data);
    }

    /**
     * 通用文字识别（含位置高精度版）接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        recognize_granularity 是否定位单字符位置，big：不定位单字符位置，默认值；small：定位单字符位置
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。 vertexes_location 是否返回文字外接多边形顶点位置，不支持单字位置。默认为false
     *                        probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function accurate($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->accurateUrl, $data);
    }

    /**
     * 通用文字识别（含生僻字版）接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        language_type 识别语言类型，默认为CHN_ENG。可选值包括：<br>- CHN_ENG：中英文混合；<br>- ENG：英文；<br>-
     *                        POR：葡萄牙语；<br>- FRE：法语；<br>- GER：德语；<br>- ITA：意大利语；<br>- SPA：西班牙语；<br>- RUS：俄语；<br>-
     *                        JAP：日语；<br>- KOR：韩语； detect_direction
     *                        是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>- true：检测朝向；<br>-
     *                        false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语） probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function enhancedGeneral($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->generalEnhancedUrl, $data);
    }

    /**
     * 通用文字识别（含生僻字版）接口
     *
     * @param string $url     -
     *                        图片完整URL，URL长度不超过1024字节，URL对应的图片base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式，当image字段存在时url字段失效
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        language_type 识别语言类型，默认为CHN_ENG。可选值包括：<br>- CHN_ENG：中英文混合；<br>- ENG：英文；<br>-
     *                        POR：葡萄牙语；<br>- FRE：法语；<br>- GER：德语；<br>- ITA：意大利语；<br>- SPA：西班牙语；<br>- RUS：俄语；<br>-
     *                        JAP：日语；<br>- KOR：韩语； detect_direction
     *                        是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>- true：检测朝向；<br>-
     *                        false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语） probability 是否返回识别结果中每一行的置信度
     * @return array
     */
    public function enhancedGeneralUrl($url, $options = [])
    {

        $data = [];

        $data['url'] = $url;

        $data = array_merge($data, $options);

        return $this->request($this->generalEnhancedUrl, $data);
    }

    /**
     * 网络图片文字识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语）
     * @return array
     */
    public function webImage($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->webImageUrl, $data);
    }

    /**
     * 网络图片文字识别接口
     *
     * @param string $url     -
     *                        图片完整URL，URL长度不超过1024字节，URL对应的图片base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式，当image字段存在时url字段失效
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。 detect_language 是否检测语言，默认不检测。当前支持（中文、英语、日语、韩语）
     * @return array
     */
    public function webImageUrl($url, $options = [])
    {

        $data = [];

        $data['url'] = $url;

        $data = array_merge($data, $options);

        return $this->request($this->webImageUrl, $data);
    }

    /**
     * 身份证识别接口
     *
     * @param string $image      - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param string $idCardSide - front：身份证含照片的一面；back：身份证带国徽的一面
     * @param array  $options    - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                           detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                           true：检测朝向；<br>- false：不检测朝向。 detect_risk
     *                           是否开启身份证风险类型(身份证复印件、临时身份证、身份证翻拍、修改过的身份证)功能，默认不开启，即：false。可选值:true-开启；false-不开启
     * @return array
     */
    public function idcard($image, $idCardSide, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);
        $data['id_card_side'] = $idCardSide;

        $data = array_merge($data, $options);

        return $this->request($this->idcardUrl, $data);
    }

    /**
     * 银行卡识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function bankcard($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->bankcardUrl, $data);
    }

    /**
     * 驾驶证识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。
     * @return array
     */
    public function drivingLicense($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->drivingLicenseUrl, $data);
    }

    /**
     * 行驶证识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。 accuracy normal 使用快速服务，1200ms左右时延；缺省或其它值使用高精度服务，1600ms左右时延
     * @return array
     */
    public function vehicleLicense($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->vehicleLicenseUrl, $data);
    }

    /**
     * 车牌识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        multi_detect 是否检测多张车牌，默认为false，当置为true的时候可以对一张图片内的多张车牌进行识别
     * @return array
     */
    public function licensePlate($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->licensePlateUrl, $data);
    }

    /**
     * 营业执照识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function businessLicense($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->businessLicenseUrl, $data);
    }

    /**
     * 通用票据识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        recognize_granularity 是否定位单字符位置，big：不定位单字符位置，默认值；small：定位单字符位置
     *                        probability 是否返回识别结果中每一行的置信度
     *                        accuracy normal 使用快速服务，1200ms左右时延；缺省或其它值使用高精度服务，1600ms左右时延
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。
     * @return array
     */
    public function receipt($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->receiptUrl, $data);
    }

    /**
     * 表格文字识别同步接口接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function form($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->formUrl, $data);
    }

    /**
     * 表格文字识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function tableRecognitionAsync($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->tableRecognizeUrl, $data);
    }

    /**
     * 表格识别结果接口
     *
     * @param string $requestId - 发送表格文字识别请求时返回的request id
     * @param array  $options   - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                          result_type 期望获取结果的类型，取值为“excel”时返回xls文件的地址，取值为“json”时返回json格式的字符串,默认为”excel”
     * @return array
     */
    public function getTableRecognitionResult($requestId, $options = [])
    {

        $data = [];

        $data['request_id'] = $requestId;

        $data = array_merge($data, $options);

        return $this->request($this->tableResultGetUrl, $data);
    }

    /**
     * 增值税发票识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function vatInvoice($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->vatInvoiceUrl, $data);
    }

    /**
     * 二维码识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function qrcode($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->qrcodeUrl, $data);
    }

    /**
     * 数字识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        recognize_granularity 是否定位单字符位置，big：不定位单字符位置，默认值；small：定位单字符位置
     *                        detect_direction 是否检测图像朝向，默认不检测，即：false。朝向是指输入图像是正常方向、逆时针旋转90/180/270度。可选值包括:<br>-
     *                        true：检测朝向；<br>- false：不检测朝向。
     * @return array
     */
    public function numbers($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->numbersUrl, $data);
    }

    /**
     * 彩票识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        recognize_granularity 是否定位单字符位置，big：不定位单字符位置，默认值；small：定位单字符位置
     * @return array
     */
    public function lottery($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->lotteryUrl, $data);
    }

    /**
     * 护照识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function passport($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->passportUrl, $data);
    }

    /**
     * 名片识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function businessCard($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->businessCardUrl, $data);
    }

    /**
     * 手写文字识别接口
     *
     * @param string $image   - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array  $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *                        recognize_granularity 是否定位单字符位置，big：不定位单字符位置，默认值；small：定位单字符位置
     * @return array
     */
    public function handwriting($image, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->handwritingUrl, $data);
    }

    /**
     * 自定义模板文字识别接口
     *
     * @param string $image        - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param string $templateSign - 您在自定义文字识别平台制作的模板的ID
     * @param array  $options      - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function custom($image, $templateSign, $options = [])
    {

        $data = [];

        $data['image'] = base64_encode($image);
        $data['templateSign'] = $templateSign;

        $data = array_merge($data, $options);

        return $this->request($this->customUrl, $data);
    }

    /**
     * 同步请求
     *
     * @param  string $image  图像读取
     * @param         options 接口可选参数
     * @return array
     */
    public function tableRecognition($image, $options = [], $timeout = 10000)
    {
        $result = $this->tableRecognitionAsync($image);
        if (isset($result['error_code'])) {
            return $result;
        }
        $requestId = $result['result'][0]['request_id'];
        $count = ceil($timeout / 1000);
        for ($i = 0; $i < $count; $i++) {
            $result = $this->getTableRecognitionResult($requestId, $options);
            // 完成
            if ($result['result']['ret_code'] == 3) {
                break;
            }
            sleep(1);
        }

        return $result;
    }


    /**
     * 人脸检测 detect api url
     * @var string
     */
    private $detectUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/detect';

    /**
     * 人脸搜索 search api url
     * @var string
     */
    private $searchUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/search';

    /**
     * 人脸注册 user_add api url
     * @var string
     */
    private $userAddUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/add';

    /**
     * 人脸更新 user_update api url
     * @var string
     */
    private $userUpdateUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/update';

    /**
     * 人脸删除 face_delete api url
     * @var string
     */
    private $faceDeleteUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/face/delete';

    /**
     * 用户信息查询 user_get api url
     * @var string
     */
    private $userGetUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/get';

    /**
     * 获取用户人脸列表 face_getlist api url
     * @var string
     */
    private $faceGetlistUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/face/getlist';

    /**
     * 获取用户列表 group_getusers api url
     * @var string
     */
    private $groupGetusersUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/getusers';

    /**
     * 复制用户 user_copy api url
     * @var string
     */
    private $userCopyUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/copy';

    /**
     * 删除用户 user_delete api url
     * @var string
     */
    private $userDeleteUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/delete';

    /**
     * 创建用户组 group_add api url
     * @var string
     */
    private $groupAddUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/add';

    /**
     * 删除用户组 group_delete api url
     * @var string
     */
    private $groupDeleteUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/delete';

    /**
     * 组列表查询 group_getlist api url
     * @var string
     */
    private $groupGetlistUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/getlist';

    /**
     * 身份验证 person_verify api url
     * @var string
     */
    private $personVerifyUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/person/verify';

    /**
     * 在线活体检测 faceverify api url
     * @var string
     */
    private $faceverifyUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/faceverify';

    /**
     * 语音校验码接口 video_sessioncode api url
     * @var string
     */
    private $videoSessioncodeUrl = 'https://aip.baidubce.com/rest/2.0/face/v1/faceliveness/sessioncode';

    /**
     * 视频活体检测接口 video_faceliveness api url
     * @var string
     */
    private $videoFacelivenessUrl = 'https://aip.baidubce.com/rest/2.0/face/v1/faceliveness/verify';



    /**
     * 人脸检测接口
     *
     * @param string $image - 图片信息(**总数据大小应小于10M**)，图片上传方式根据image_type来判断
     * @param string $imageType - 图片类型 **BASE64**:图片的base64值，base64编码后的图片数据，需urlencode，编码后的图片大小不超过2M；**URL**:图片的 URL地址( 可能由于网络等原因导致下载图片时间过长)**；FACE_TOKEN**: 人脸图片的唯一标识，调用人脸检测接口时，会为每个人脸图片赋予一个唯一的FACE_TOKEN，同一张图片多次检测得到的FACE_TOKEN是同一个
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   face_field 包括age,beauty,expression,faceshape,gender,glasses,landmark,race,qualities信息，逗号分隔，默认只返回人脸框、概率和旋转角度
     *   max_face_num 最多处理人脸的数目，默认值为1，仅检测图片中面积最大的那个人脸；**最大值10**，检测图片中面积最大的几张人脸。
     *   face_type 人脸的类型 **LIVE**表示生活照：通常为手机、相机拍摄的人像图片、或从网络获取的人像图片等**IDCARD**表示身份证芯片照：二代身份证内置芯片中的人像照片 **WATERMARK**表示带水印证件照：一般为带水印的小图，如公安网小图 **CERT**表示证件照片：如拍摄的身份证、工卡、护照、学生证等证件图片 默认**LIVE**
     * @return array
     */
    public function detect($image, $imageType, $options=array()){

        $data = array();

        $data['image'] = $image;
        $data['image_type'] = $imageType;

        $data = array_merge($data, $options);

        return $this->request($this->detectUrl, $data);
    }

    /**
     * 人脸搜索接口
     *
     * @param string $image - 图片信息(**总数据大小应小于10M**)，图片上传方式根据image_type来判断
     * @param string $imageType - 图片类型 **BASE64**:图片的base64值，base64编码后的图片数据，需urlencode，编码后的图片大小不超过2M；**URL**:图片的 URL地址( 可能由于网络等原因导致下载图片时间过长)**；FACE_TOKEN**: 人脸图片的唯一标识，调用人脸检测接口时，会为每个人脸图片赋予一个唯一的FACE_TOKEN，同一张图片多次检测得到的FACE_TOKEN是同一个
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   group_id_list 从指定的group中进行查找 用逗号分隔，**上限20个**
     *   quality_control 图片质量控制  **NONE**: 不进行控制 **LOW**:较低的质量要求 **NORMAL**: 一般的质量要求 **HIGH**: 较高的质量要求 **默认 NONE**
     *   liveness_control 活体检测控制  **NONE**: 不进行控制 **LOW**:较低的活体要求(高通过率 低攻击拒绝率) **NORMAL**: 一般的活体要求(平衡的攻击拒绝率, 通过率) **HIGH**: 较高的活体要求(高攻击拒绝率 低通过率) **默认NONE**
     *   user_id 当需要对特定用户进行比对时，指定user_id进行比对。即人脸认证功能。
     *   max_user_num 查找后返回的用户数量。返回相似度最高的几个用户，默认为1，最多返回5个。
     * @return array
     */
    public function search($image, $imageType, $options=array()){

        $data = array();

        $data['image'] = $image;
        $data['image_type'] = $imageType;

        $data = array_merge($data, $options);

        return $this->request($this->searchUrl, $data);
    }

    /**
     * 人脸注册接口
     *
     * @param string $image - 图片信息(**总数据大小应小于10M**)，图片上传方式根据image_type来判断
     * @param string $imageType - 图片类型 **BASE64**:图片的base64值，base64编码后的图片数据，需urlencode，编码后的图片大小不超过2M；**URL**:图片的 URL地址( 可能由于网络等原因导致下载图片时间过长)**；FACE_TOKEN**: 人脸图片的唯一标识，调用人脸检测接口时，会为每个人脸图片赋予一个唯一的FACE_TOKEN，同一张图片多次检测得到的FACE_TOKEN是同一个
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param string $userId - 用户id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   user_info 用户资料，长度限制256B
     *   quality_control 图片质量控制  **NONE**: 不进行控制 **LOW**:较低的质量要求 **NORMAL**: 一般的质量要求 **HIGH**: 较高的质量要求 **默认 NONE**
     *   liveness_control 活体检测控制  **NONE**: 不进行控制 **LOW**:较低的活体要求(高通过率 低攻击拒绝率) **NORMAL**: 一般的活体要求(平衡的攻击拒绝率, 通过率) **HIGH**: 较高的活体要求(高攻击拒绝率 低通过率) **默认NONE**
     * @return array
     */
    public function addUser($image, $imageType, $groupId, $userId, $options=array()){

        $data = array();

        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['group_id'] = $groupId;
        $data['user_id'] = $userId;

        $data = array_merge($data, $options);

        return $this->request($this->userAddUrl, $data);
    }

    /**
     * 人脸更新接口
     *
     * @param string $image - 图片信息(**总数据大小应小于10M**)，图片上传方式根据image_type来判断
     * @param string $imageType - 图片类型 **BASE64**:图片的base64值，base64编码后的图片数据，需urlencode，编码后的图片大小不超过2M；**URL**:图片的 URL地址( 可能由于网络等原因导致下载图片时间过长)**；FACE_TOKEN**: 人脸图片的唯一标识，调用人脸检测接口时，会为每个人脸图片赋予一个唯一的FACE_TOKEN，同一张图片多次检测得到的FACE_TOKEN是同一个
     * @param string $groupId - 更新指定groupid下uid对应的信息
     * @param string $userId - 用户id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   user_info 用户资料，长度限制256B
     *   quality_control 图片质量控制  **NONE**: 不进行控制 **LOW**:较低的质量要求 **NORMAL**: 一般的质量要求 **HIGH**: 较高的质量要求 **默认 NONE**
     *   liveness_control 活体检测控制  **NONE**: 不进行控制 **LOW**:较低的活体要求(高通过率 低攻击拒绝率) **NORMAL**: 一般的活体要求(平衡的攻击拒绝率, 通过率) **HIGH**: 较高的活体要求(高攻击拒绝率 低通过率) **默认NONE**
     * @return array
     */
    public function updateUser($image, $imageType, $groupId, $userId, $options=array()){

        $data = array();

        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['group_id'] = $groupId;
        $data['user_id'] = $userId;

        $data = array_merge($data, $options);

        return $this->request($this->userUpdateUrl, $data);
    }

    /**
     * 人脸删除接口
     *
     * @param string $userId - 用户id（由数字、字母、下划线组成），长度限制128B
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param string $faceToken - 需要删除的人脸图片token，（由数字、字母、下划线组成）长度限制64B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function faceDelete($userId, $groupId, $faceToken, $options=array()){

        $data = array();

        $data['user_id'] = $userId;
        $data['group_id'] = $groupId;
        $data['face_token'] = $faceToken;

        $data = array_merge($data, $options);

        return $this->request($this->faceDeleteUrl, $data);
    }

    /**
     * 用户信息查询接口
     *
     * @param string $userId - 用户id（由数字、字母、下划线组成），长度限制128B
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function getUser($userId, $groupId, $options=array()){

        $data = array();

        $data['user_id'] = $userId;
        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);

        return $this->request($this->userGetUrl, $data);
    }

    /**
     * 获取用户人脸列表接口
     *
     * @param string $userId - 用户id（由数字、字母、下划线组成），长度限制128B
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function faceGetlist($userId, $groupId, $options=array()){

        $data = array();

        $data['user_id'] = $userId;
        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);

        return $this->request($this->faceGetlistUrl, $data);
    }

    /**
     * 获取用户列表接口
     *
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   start 默认值0，起始序号
     *   length 返回数量，默认值100，最大值1000
     * @return array
     */
    public function getGroupUsers($groupId, $options=array()){

        $data = array();

        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);

        return $this->request($this->groupGetusersUrl, $data);
    }

    /**
     * 复制用户接口
     *
     * @param string $userId - 用户id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   src_group_id 从指定组里复制信息
     *   dst_group_id 需要添加用户的组id
     * @return array
     */
    public function userCopy($userId, $options=array()){

        $data = array();

        $data['user_id'] = $userId;

        $data = array_merge($data, $options);

        return $this->request($this->userCopyUrl, $data);
    }

    /**
     * 删除用户接口
     *
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param string $userId - 用户id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function deleteUser($groupId, $userId, $options=array()){

        $data = array();

        $data['group_id'] = $groupId;
        $data['user_id'] = $userId;

        $data = array_merge($data, $options);

        return $this->request($this->userDeleteUrl, $data);
    }

    /**
     * 创建用户组接口
     *
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function groupAdd($groupId, $options=array()){

        $data = array();

        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);

        return $this->request($this->groupAddUrl, $data);
    }

    /**
     * 删除用户组接口
     *
     * @param string $groupId - 用户组id（由数字、字母、下划线组成），长度限制128B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function groupDelete($groupId, $options=array()){

        $data = array();

        $data['group_id'] = $groupId;

        $data = array_merge($data, $options);

        return $this->request($this->groupDeleteUrl, $data);
    }

    /**
     * 组列表查询接口
     *
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   start 默认值0，起始序号
     *   length 返回数量，默认值100，最大值1000
     * @return array
     */
    public function getGroupList($options=array()){

        $data = array();


        $data = array_merge($data, $options);

        return $this->request($this->groupGetlistUrl, $data);
    }

    /**
     * 身份验证接口
     *
     * @param string $image - 图片信息(**总数据大小应小于10M**)，图片上传方式根据image_type来判断
     * @param string $imageType - 图片类型 **BASE64**:图片的base64值，base64编码后的图片数据，需urlencode，编码后的图片大小不超过2M；**URL**:图片的 URL地址( 可能由于网络等原因导致下载图片时间过长)**；FACE_TOKEN**: 人脸图片的唯一标识，调用人脸检测接口时，会为每个人脸图片赋予一个唯一的FACE_TOKEN，同一张图片多次检测得到的FACE_TOKEN是同一个
     * @param string $idCardNumber - 身份证号（真实身份证号号码）
     * @param string $name - utf8，姓名（真实姓名，和身份证号匹配）
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   quality_control 图片质量控制  **NONE**: 不进行控制 **LOW**:较低的质量要求 **NORMAL**: 一般的质量要求 **HIGH**: 较高的质量要求 **默认 NONE**
     *   liveness_control 活体检测控制  **NONE**: 不进行控制 **LOW**:较低的活体要求(高通过率 低攻击拒绝率) **NORMAL**: 一般的活体要求(平衡的攻击拒绝率, 通过率) **HIGH**: 较高的活体要求(高攻击拒绝率 低通过率) **默认NONE**
     * @return array
     */
    public function personVerify($image, $imageType, $idCardNumber, $name, $options=array()){

        $data = array();

        $data['image'] = $image;
        $data['image_type'] = $imageType;
        $data['id_card_number'] = $idCardNumber;
        $data['name'] = $name;

        $data = array_merge($data, $options);

        return $this->request($this->personVerifyUrl, $data);
    }

    /**
     * 在线活体检测接口
     *
     * @param string $image - 图片信息(**总数据大小应小于10M**)，图片上传方式根据image_type来判断
     * @param string $imageType - 图片类型 **BASE64**:图片的base64值，base64编码后的图片数据，需urlencode，编码后的图片大小不超过2M；**URL**:图片的 URL地址( 可能由于网络等原因导致下载图片时间过长)**；FACE_TOKEN**: 人脸图片的唯一标识，调用人脸检测接口时，会为每个人脸图片赋予一个唯一的FACE_TOKEN，同一张图片多次检测得到的FACE_TOKEN是同一个
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   face_fields 如不选择此项，返回结果默认只有人脸框、概率和旋转角度。可选参数为qualities、faceliveness。qualities：图片质量相关判断；faceliveness：活体判断。如果两个参数都需要选择，请使用半角逗号分隔。
     * @return array
     */
    public function faceverify($image, $imageType, $options=array()){

        $data = array();

        $data['image'] = $image;
        $data['image_type'] = $imageType;

        $data = array_merge($data, $options);

        return $this->request($this->faceverifyUrl, $data);
    }

    /**
     * 语音校验码接口接口
     *
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   appid 百度云创建应用时的唯一标识ID
     * @return array
     */
    public function videoSessioncode($options=array()){

        $data = array();


        $data = array_merge($data, $options);

        return $this->request($this->videoSessioncodeUrl, $data);
    }

    /**
     * 视频活体检测接口接口
     *
     * @param string $sessionId - 语音校验码会话id，使用此接口的前提是已经调用了语音校验码接口
     * @param string $videoBase64 - base64编码后的视频数据（视频限制：最佳为上传5-15s的mp4文件。视频编码方式：h264编码；音频编码格式：aac，pcm均可。）
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function videoFaceliveness($sessionId, $videoBase64, $options=array()){

        $data = array();

        $data['session_id'] = $sessionId;
        $data['video_base64'] = $videoBase64;

        $data = array_merge($data, $options);

        return $this->request($this->videoFacelivenessUrl, $data);
    }

    /**
     * 人脸比对 match api url
     * @var string
     */
    private $matchUrl = 'https://aip.baidubce.com/rest/2.0/face/v3/match';

    /**
     * 人脸比对接口
     *
     * @param array $images
     * @return array
     */
    public function match($images){

        return $this->request($this->matchUrl, json_encode($images), array(
            'Content-Type' => 'application/json',
        ));
    }

    #### 黄反识别

    /**
     * antiporn api url
     * @var string
     */
    private $antiPornUrl = 'https://aip.baidubce.com/rest/2.0/antiporn/v1/detect';

    /**
     * antiporn gif api url
     * @var string
     */
    private $antiPornGifUrl = 'https://aip.baidubce.com/rest/2.0/antiporn/v1/detect_gif';

    /**
     * antiterror api url
     * @var string
     */
    private $antiTerrorUrl = 'https://aip.baidubce.com/rest/2.0/antiterror/v1/detect';

    /**
     * @var string
     */
    private $faceAuditUrl = 'https://aip.baidubce.com/rest/2.0/solution/v1/face_audit';

    /**
     * @var string
     */
    private $imageCensorCombUrl = 'https://aip.baidubce.com/api/v1/solution/direct/img_censor';

    /**
     * @var string
     */
    private $imageCensorUserDefinedUrl = 'https://aip.baidubce.com/rest/2.0/solution/v1/img_censor/user_defined';

    /**
     * @var string
     */
    private $antiSpamUrl = 'https://aip.baidubce.com/rest/2.0/antispam/v2/spam';

    /**
     * @param  string $image 图像读取
     * @return array
     */
    public function antiPorn($image){

        $data = array();
        $data['image'] = base64_encode($image);

        return $this->request($this->antiPornUrl, $data);
    }

    /**
     * @param $images 图像读取
     * @return mixed
     */
    public function multi_antiporn($images){

        $data = array();
        foreach($images as $image){
            $data[] = array(
                'image' => base64_encode($image),
            );
        }

        return $this->multi_request($this->antiPornUrl, $data);
    }

    /**
     * @param  string $image 图像读取
     * @return array
     */
    public function antiPornGif($image){

        $data = array();
        $data['image'] = base64_encode($image);

        return $this->request($this->antiPornGifUrl, $data);
    }

    /**
     * @param  string $image 图像读取
     * @return array
     */
    public function antiTerror($image){

        $data = array();
        $data['image'] = base64_encode($image);

        return $this->request($this->antiTerrorUrl, $data);
    }

    /**
     * @param        $images 图像读取
     * @param string $configId
     * @return mixed
     */
    public function faceAudit($images, $configId=''){

        // 非数组则处理为数组
        if(!is_array($images)){
            $images = array(
                $images,
            );
        }

        $data = array(
            'configId' => $configId,
        );

        $isUrl = substr(trim($images[0]), 0, 4) === 'http';
        if(!$isUrl){
            $arr = array();

            foreach($images as $image){
                $arr[] = base64_encode($image);
            }
            $data['images'] = implode(',', $arr);
        }else{
            $urls = array();

            foreach($images as $url){
                $urls[] = urlencode($url);
            }

            $data['imgUrls'] = implode(',', $urls);
        }

        return $this->request($this->faceAuditUrl, $data);
    }

    /**
     * @param        $image
     * @param string $scenes
     * @param array  $options
     * @return mixed
     */
    public function imageCensorComb($image, $scenes='antiporn', $options=array()){

        $scenes = !is_array($scenes) ? explode(',', $scenes) : $scenes;

        $data = array(
            'scenes' => $scenes,
        );

        $isUrl = substr(trim($image), 0, 4) === 'http';
        if(!$isUrl){
            $data['image'] = base64_encode($image);
        }else{
            $data['imgUrl'] = $image;
        }

        $data = array_merge($data, $options);

        return $this->request($this->imageCensorCombUrl, json_encode($data), array(
            'Content-Type' => 'application/json',
        ));
    }

    /**
     * @param  string $image 图像
     * @return array
     */
    public function imageCensorUserDefined($image){

        $data = array();

        $isUrl = substr(trim($image), 0, 4) === 'http';
        if(!$isUrl){
            $data['image'] = base64_encode($image);
        }else{
            $data['imgUrl'] = $image;
        }

        return $this->request($this->imageCensorUserDefinedUrl, $data);
    }

    /**
     * @param       $content
     * @param array $options
     * @return mixed
     */
    public function antiSpam($content, $options=array()){

        $data = array();
        $data['content'] = $content;

        $data = array_merge($data, $options);

        return $this->request($this->antiSpamUrl, $data);
    }

    ### 通用物体识别
    /**
     * 通用物体识别 advanced_general api url
     * @var string
     */
    private $advancedGeneralUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v2/advanced_general';

    /**
     * 菜品识别 dish_detect api url
     * @var string
     */
    private $dishDetectUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v2/dish';

    /**
     * 车辆识别 car_detect api url
     * @var string
     */
    private $carDetectUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/car';

    /**
     * logo商标识别 logo_search api url
     * @var string
     */
    private $logoSearchUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v2/logo';

    /**
     * logo商标识别—添加 logo_add api url
     * @var string
     */
    private $logoAddUrl = 'https://aip.baidubce.com/rest/2.0/realtime_search/v1/logo/add';

    /**
     * logo商标识别—删除 logo_delete api url
     * @var string
     */
    private $logoDeleteUrl = 'https://aip.baidubce.com/rest/2.0/realtime_search/v1/logo/delete';

    /**
     * 动物识别 animal_detect api url
     * @var string
     */
    private $animalDetectUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/animal';

    /**
     * 植物识别 plant_detect api url
     * @var string
     */
    private $plantDetectUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/plant';

    /**
     * 图像主体检测 object_detect api url
     * @var string
     */
    private $objectDetectUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/object_detect';



    /**
     * 通用物体识别接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function advancedGeneral($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->advancedGeneralUrl, $data);
    }

    /**
     * 菜品识别接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   top_num 返回预测得分top结果数，默认为5
     * @return array
     */
    public function dishDetect($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->dishDetectUrl, $data);
    }

    /**
     * 车辆识别接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   top_num 返回预测得分top结果数，默认为5
     * @return array
     */
    public function carDetect($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->carDetectUrl, $data);
    }

    /**
     * logo商标识别接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   custom_lib 是否只使用自定义logo库的结果，默认false：返回自定义库+默认库的识别结果
     * @return array
     */
    public function logoSearch($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->logoSearchUrl, $data);
    }

    /**
     * logo商标识别—添加接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param string $brief - brief，检索时带回。此处要传对应的name与code字段，name长度小于100B，code长度小于150B
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function logoAdd($image, $brief, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);
        $data['brief'] = $brief;

        $data = array_merge($data, $options);

        return $this->request($this->logoAddUrl, $data);
    }

    /**
     * logo商标识别—删除接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function logoDeleteByImage($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->logoDeleteUrl, $data);
    }

    /**
     * logo商标识别—删除接口
     *
     * @param string $contSign - 图片签名（和image二选一，image优先级更高）
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function logoDeleteBySign($contSign, $options=array()){

        $data = array();

        $data['cont_sign'] = $contSign;

        $data = array_merge($data, $options);

        return $this->request($this->logoDeleteUrl, $data);
    }

    /**
     * 动物识别接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   top_num 返回预测得分top结果数，默认为6
     * @return array
     */
    public function animalDetect($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->animalDetectUrl, $data);
    }

    /**
     * 植物识别接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function plantDetect($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->plantDetectUrl, $data);
    }

    /**
     * 图像主体检测接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   with_face 如果检测主体是人，主体区域是否带上人脸部分，0-不带人脸区域，其他-带人脸区域，裁剪类需求推荐带人脸，检索/识别类需求推荐不带人脸。默认取1，带人脸。
     * @return array
     */
    public function objectDetect($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->objectDetectUrl, $data);
    }

    /**
     * 相同图检索—入库 same_hq_add api url
     * @var string
     */
    private $sameHqAddUrl = 'https://aip.baidubce.com/rest/2.0/realtime_search/same_hq/add';

    /**
     * 相同图检索—检索 same_hq_search api url
     * @var string
     */
    private $sameHqSearchUrl = 'https://aip.baidubce.com/rest/2.0/realtime_search/same_hq/search';

    /**
     * 相同图检索—删除 same_hq_delete api url
     * @var string
     */
    private $sameHqDeleteUrl = 'https://aip.baidubce.com/rest/2.0/realtime_search/same_hq/delete';

    /**
     * 相似图检索—入库 similar_add api url
     * @var string
     */
    private $similarAddUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/realtime_search/similar/add';

    /**
     * 相似图检索—检索 similar_search api url
     * @var string
     */
    private $similarSearchUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/realtime_search/similar/search';

    /**
     * 相似图检索—删除 similar_delete api url
     * @var string
     */
    private $similarDeleteUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/realtime_search/similar/delete';

    /**
     * 商品检索—入库 product_add api url
     * @var string
     */
    private $productAddUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/realtime_search/product/add';

    /**
     * 商品检索—检索 product_search api url
     * @var string
     */
    private $productSearchUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/realtime_search/product/search';

    /**
     * 商品检索—删除 product_delete api url
     * @var string
     */
    private $productDeleteUrl = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/realtime_search/product/delete';



    /**
     * 相同图检索—入库接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   brief 检索时原样带回,最长256B。
     *   tags 1 - 65535范围内的整数，tag间以逗号分隔，最多2个tag。样例："100,11" ；检索时可圈定分类维度进行检索
     * @return array
     */
    public function sameHqAdd($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->sameHqAddUrl, $data);
    }

    /**
     * 相同图检索—检索接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   tags 1 - 65535范围内的整数，tag间以逗号分隔，最多2个tag。样例："100,11" ；检索时可圈定分类维度进行检索
     *   tag_logic 检索时tag之间的逻辑， 0：逻辑and，1：逻辑or
     *   pn 分页功能，起始位置，例：0。未指定分页时，默认返回前300个结果；接口返回数量最大限制1000条，例如：起始位置为900，截取条数500条，接口也只返回第900 - 1000条的结果，共计100条
     *   rn 分页功能，截取条数，例：250
     * @return array
     */
    public function sameHqSearch($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->sameHqSearchUrl, $data);
    }

    /**
     * 相同图检索—删除接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function sameHqDeleteByImage($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->sameHqDeleteUrl, $data);
    }

    /**
     * 相同图检索—删除接口
     *
     * @param string $contSign - 图片签名（和image二选一，image优先级更高）
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function sameHqDeleteBySign($contSign, $options=array()){

        $data = array();

        $data['cont_sign'] = $contSign;

        $data = array_merge($data, $options);

        return $this->request($this->sameHqDeleteUrl, $data);
    }

    /**
     * 相似图检索—入库接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   brief 检索时原样带回,最长256B。
     *   tags 1 - 65535范围内的整数，tag间以逗号分隔，最多2个tag。样例："100,11" ；检索时可圈定分类维度进行检索
     * @return array
     */
    public function similarAdd($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->similarAddUrl, $data);
    }

    /**
     * 相似图检索—检索接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   tags 1 - 65535范围内的整数，tag间以逗号分隔，最多2个tag。样例："100,11" ；检索时可圈定分类维度进行检索
     *   tag_logic 检索时tag之间的逻辑， 0：逻辑and，1：逻辑or
     *   pn 分页功能，起始位置，例：0。未指定分页时，默认返回前300个结果；接口返回数量最大限制1000条，例如：起始位置为900，截取条数500条，接口也只返回第900 - 1000条的结果，共计100条
     *   rn 分页功能，截取条数，例：250
     * @return array
     */
    public function similarSearch($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->similarSearchUrl, $data);
    }

    /**
     * 相似图检索—删除接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function similarDeleteByImage($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->similarDeleteUrl, $data);
    }

    /**
     * 相似图检索—删除接口
     *
     * @param string $contSign - 图片签名（和image二选一，image优先级更高）
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function similarDeleteBySign($contSign, $options=array()){

        $data = array();

        $data['cont_sign'] = $contSign;

        $data = array_merge($data, $options);

        return $this->request($this->similarDeleteUrl, $data);
    }

    /**
     * 商品检索—入库接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   brief 检索时原样带回,最长256B。**请注意，检索接口不返回原图，仅反馈当前填写的brief信息，所以调用该入库接口时，brief信息请尽量填写可关联至本地图库的图片id或者图片url、图片名称等信息**
     *   class_id1 商品分类维度1，支持1-60范围内的整数。检索时可圈定该分类维度进行检索
     *   class_id2 商品分类维度1，支持1-60范围内的整数。检索时可圈定该分类维度进行检索
     * @return array
     */
    public function productAdd($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->productAddUrl, $data);
    }

    /**
     * 商品检索—检索接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   class_id1 商品分类维度1，支持1-60范围内的整数。检索时可圈定该分类维度进行检索
     *   class_id2 商品分类维度1，支持1-60范围内的整数。检索时可圈定该分类维度进行检索
     *   pn 分页功能，起始位置，例：0。未指定分页时，默认返回前300个结果；接口返回数量最大限制1000条，例如：起始位置为900，截取条数500条，接口也只返回第900 - 1000条的结果，共计100条
     *   rn 分页功能，截取条数，例：250
     * @return array
     */
    public function productSearch($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->productSearchUrl, $data);
    }

    /**
     * 商品检索—删除接口
     *
     * @param string $image - 图像数据，base64编码，要求base64编码后大小不超过4M，最短边至少15px，最长边最大4096px,支持jpg/png/bmp格式
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function productDeleteByImage($image, $options=array()){

        $data = array();

        $data['image'] = base64_encode($image);

        $data = array_merge($data, $options);

        return $this->request($this->productDeleteUrl, $data);
    }

    /**
     * 商品检索—删除接口
     *
     * @param string $contSign - 图片签名（和image二选一，image优先级更高）
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function productDeleteBySign($contSign, $options=array()){

        $data = array();

        $data['cont_sign'] = $contSign;

        $data = array_merge($data, $options);

        return $this->request($this->productDeleteUrl, $data);
    }

    /**
     * 创建任务 create_task api url
     * @var string
     */
    private $createTaskUrl = 'https://aip.baidubce.com/rest/2.0/kg/v1/pie/task_create';

    /**
     * 更新任务 update_task api url
     * @var string
     */
    private $updateTaskUrl = 'https://aip.baidubce.com/rest/2.0/kg/v1/pie/task_update';

    /**
     * 获取任务详情 task_info api url
     * @var string
     */
    private $taskInfoUrl = 'https://aip.baidubce.com/rest/2.0/kg/v1/pie/task_info';

    /**
     * 以分页的方式查询当前用户所有的任务信息 task_query api url
     * @var string
     */
    private $taskQueryUrl = 'https://aip.baidubce.com/rest/2.0/kg/v1/pie/task_query';

    /**
     * 启动任务 task_start api url
     * @var string
     */
    private $taskStartUrl = 'https://aip.baidubce.com/rest/2.0/kg/v1/pie/task_start';

    /**
     * 查询任务状态 task_status api url
     * @var string
     */
    private $taskStatusUrl = 'https://aip.baidubce.com/rest/2.0/kg/v1/pie/task_status';



    /**
     * 创建任务接口
     *
     * @param string $name - 任务名字
     * @param string $templateContent - json string 解析模板内容
     * @param string $inputMappingFile - 抓取结果映射文件的路径
     * @param string $outputFile - 输出文件名字
     * @param string $urlPattern - url pattern
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   limit_count 限制解析数量limit_count为0时进行全量任务，limit_count&gt;0时只解析limit_count数量的页面
     * @return array
     */
    public function createTask($name, $templateContent, $inputMappingFile, $outputFile, $urlPattern, $options=array()){

        $data = array();

        $data['name'] = $name;
        $data['template_content'] = $templateContent;
        $data['input_mapping_file'] = $inputMappingFile;
        $data['output_file'] = $outputFile;
        $data['url_pattern'] = $urlPattern;

        $data = array_merge($data, $options);

        return $this->request($this->createTaskUrl, $data);
    }

    /**
     * 更新任务接口
     *
     * @param integer $id - 任务ID
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   name 任务名字
     *   template_content json string 解析模板内容
     *   input_mapping_file 抓取结果映射文件的路径
     *   url_pattern url pattern
     *   output_file 输出文件名字
     * @return array
     */
    public function updateTask($id, $options=array()){

        $data = array();

        $data['id'] = $id;

        $data = array_merge($data, $options);

        return $this->request($this->updateTaskUrl, $data);
    }

    /**
     * 获取任务详情接口
     *
     * @param integer $id - 任务ID
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function getTaskInfo($id, $options=array()){

        $data = array();

        $data['id'] = $id;

        $data = array_merge($data, $options);

        return $this->request($this->taskInfoUrl, $data);
    }

    /**
     * 以分页的方式查询当前用户所有的任务信息接口
     *
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   id 任务ID，精确匹配
     *   name 中缀模糊匹配,abc可以匹配abc,aaabc,abcde等
     *   status 要筛选的任务状态
     *   page 页码
     *   per_page 页码
     * @return array
     */
    public function getUserTasks($options=array()){

        $data = array();


        $data = array_merge($data, $options);

        return $this->request($this->taskQueryUrl, $data);
    }

    /**
     * 启动任务接口
     *
     * @param integer $id - 任务ID
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function startTask($id, $options=array()){

        $data = array();

        $data['id'] = $id;

        $data = array_merge($data, $options);

        return $this->request($this->taskStartUrl, $data);
    }

    /**
     * 查询任务状态接口
     *
     * @param integer $id - 任务ID
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function getTaskStatus($id, $options=array()){

        $data = array();

        $data['id'] = $id;

        $data = array_merge($data, $options);

        return $this->request($this->taskStatusUrl, $data);
    }

    /**
     * 词法分析 lexer api url
     * @var string
     */
    private $lexerUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v1/lexer';

    /**
     * 词法分析（定制版） lexer_custom api url
     * @var string
     */
    private $lexerCustomUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v1/lexer_custom';

    /**
     * 依存句法分析 dep_parser api url
     * @var string
     */
    private $depParserUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v1/depparser';

    /**
     * 词向量表示 word_embedding api url
     * @var string
     */
    private $wordEmbeddingUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v2/word_emb_vec';

    /**
     * DNN语言模型 dnnlm_cn api url
     * @var string
     */
    private $dnnlmCnUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v2/dnnlm_cn';

    /**
     * 词义相似度 word_sim_embedding api url
     * @var string
     */
    private $wordSimEmbeddingUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v2/word_emb_sim';

    /**
     * 短文本相似度 simnet api url
     * @var string
     */
    private $simnetUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v2/simnet';

    /**
     * 评论观点抽取 comment_tag api url
     * @var string
     */
    private $commentTagUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v2/comment_tag';

    /**
     * 情感倾向分析 sentiment_classify api url
     * @var string
     */
    private $sentimentClassifyUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v1/sentiment_classify';

    /**
     * 文章标签 keyword api url
     * @var string
     */
    private $keywordUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v1/keyword';

    /**
     * 文章分类 topic api url
     * @var string
     */
    private $topicUrl = 'https://aip.baidubce.com/rpc/2.0/nlp/v1/topic';

    /**
     * 格式化结果
     * @param $content string
     * @return mixed
     */
    protected function proccessResult($content){
        return json_decode(mb_convert_encoding($content, 'UTF8', 'GBK'), true, 512, JSON_BIGINT_AS_STRING);
    }

    /**
     * 词法分析接口
     *
     * @param string $text - 待分析文本（目前仅支持GBK编码），长度不超过65536字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function lexer($text, $options=array()){

        $data = array();

        $data['text'] = $text;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->lexerUrl, $data);
    }

    /**
     * 词法分析（定制版）接口
     *
     * @param string $text - 待分析文本（目前仅支持GBK编码），长度不超过65536字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function lexerCustom($text, $options=array()){

        $data = array();

        $data['text'] = $text;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->lexerCustomUrl, $data);
    }

    /**
     * 依存句法分析接口
     *
     * @param string $text - 待分析文本（目前仅支持GBK编码），长度不超过256字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   mode 模型选择。默认值为0，可选值mode=0（对应web模型）；mode=1（对应query模型）
     * @return array
     */
    public function depParser($text, $options=array()){

        $data = array();

        $data['text'] = $text;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->depParserUrl, $data);
    }

    /**
     * 词向量表示接口
     *
     * @param string $word - 文本内容（GBK编码），最大64字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function wordEmbedding($word, $options=array()){

        $data = array();

        $data['word'] = $word;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->wordEmbeddingUrl, $data);
    }

    /**
     * DNN语言模型接口
     *
     * @param string $text - 文本内容（GBK编码），最大512字节，不需要切词
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function dnnlm($text, $options=array()){

        $data = array();

        $data['text'] = $text;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->dnnlmCnUrl, $data);
    }

    /**
     * 词义相似度接口
     *
     * @param string $word1 - 词1（GBK编码），最大64字节
     * @param string $word2 - 词1（GBK编码），最大64字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   mode 预留字段，可选择不同的词义相似度模型。默认值为0，目前仅支持mode=0
     * @return array
     */
    public function wordSimEmbedding($word1, $word2, $options=array()){

        $data = array();

        $data['word_1'] = $word1;
        $data['word_2'] = $word2;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->wordSimEmbeddingUrl, $data);
    }

    /**
     * 短文本相似度接口
     *
     * @param string $text1 - 待比较文本1（GBK编码），最大512字节
     * @param string $text2 - 待比较文本2（GBK编码），最大512字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   model 默认为"BOW"，可选"BOW"、"CNN"与"GRNN"
     * @return array
     */
    public function simnet($text1, $text2, $options=array()){

        $data = array();

        $data['text_1'] = $text1;
        $data['text_2'] = $text2;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->simnetUrl, $data);
    }

    /**
     * 评论观点抽取接口
     *
     * @param string $text - 评论内容（GBK编码），最大10240字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     *   type 评论行业类型，默认为4（餐饮美食）
     * @return array
     */
    public function commentTag($text, $options=array()){

        $data = array();

        $data['text'] = $text;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->commentTagUrl, $data);
    }

    /**
     * 情感倾向分析接口
     *
     * @param string $text - 文本内容（GBK编码），最大102400字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function sentimentClassify($text, $options=array()){

        $data = array();

        $data['text'] = $text;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->sentimentClassifyUrl, $data);
    }

    /**
     * 文章标签接口
     *
     * @param string $title - 篇章的标题，最大80字节
     * @param string $content - 篇章的正文，最大65535字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function keyword($title, $content, $options=array()){

        $data = array();

        $data['title'] = $title;
        $data['content'] = $content;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->keywordUrl, $data);
    }

    /**
     * 文章分类接口
     *
     * @param string $title - 篇章的标题，最大80字节
     * @param string $content - 篇章的正文，最大65535字节
     * @param array $options - 可选参数对象，key: value都为string类型
     * @description options列表:
     * @return array
     */
    public function topic($title, $content, $options=array()){

        $data = array();

        $data['title'] = $title;
        $data['content'] = $content;

        $data = array_merge($data, $options);
        $data = mb_convert_encoding(json_encode($data), 'GBK', 'UTF8');

        return $this->request($this->topicUrl, $data);
    }

    /**
     * url
     * @var string
     */
    public $asrUrl = 'http://vop.baidu.com/server_api';

    /**
     * url
     * @var string
     */
    public $ttsUrl = 'http://tsn.baidu.com/text2audio';

    /**
     * 判断认证是否有权限
     * @param  array   $authObj
     * @return boolean
     */
    protected function isPermission($authObj)
    {
        return true;
    }

    /**
     * 处理请求参数
     * @param string $url
     * @param array $params
     * @param array $data
     * @param array $headers
     */
    protected function proccessRequest($url, &$params, &$data, $headers){

        $token = isset($params['access_token']) ? $params['access_token'] : '';

        if(empty($data['cuid'])){
            $data['cuid'] = md5($token);
        }

        if($url === $this->asrUrl){
            $data['token'] = $token;
            $data = json_encode($data);
        }else{
            $data['tok'] = $token;
        }

        unset($params['access_token']);
    }

    /**
     * @param  string $speech
     * @param  string $format
     * @param  int $rate
     * @param  array $options
     * @return array
     */
    public function asr($speech, $format, $rate, $options=array()){
        $data = array();

        if(!empty($speech)){
            $data['speech'] = base64_encode($speech);
            $data['len'] = strlen($speech);
        }

        $data['format'] = $format;
        $data['rate'] = $rate;
        $data['channel'] = 1;

        $data = array_merge($data, $options);

        return $this->request($this->asrUrl, $data, array());
    }

    /**
     * @param  string $text
     * @param  string $lang
     * @param  int $ctp
     * @param  array $options
     * @return array
     */
    public function synthesis($text, $lang='zh', $ctp=1, $options=array()){
        $data = array();

        $data['tex'] = $text;
        $data['lan'] = $lang;
        $data['ctp'] = $ctp;

        $data = array_merge($data, $options);

        $result = $this->request($this->ttsUrl, $data, array());

        if(isset($result['__json_decode_error'])){
            return $result['__json_decode_error'];
        }

        return $result;
    }
}

