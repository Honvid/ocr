<?php

namespace Honvid\Lib;

/*
|--------------------------------------------------------------------------
| CLASS NAME: Factory
|--------------------------------------------------------------------------
| @author    honvid
| @datetime  2018-08-07 11:36
| @package   Honvid\Lib
| @description:
|
*/

use Honvid\Lib\Baidu\AipOcr;
use Symfony\Component\Routing\Exception\NoConfigurationException;

class Factory
{
    /**
     * appId
     * @var string
     */
    protected static $appId = '';

    /**
     * apiKey
     * @var string
     */
    protected static $apiKey = '';

    /**
     * secretKey
     * @var string
     */
    protected static $secretKey = '';

    /**
     * @param null $driver
     * @return \Honvid\Lib\Baidu\AipOcr
     */
    public static function factory($driver = null)
    {
        if (null === $driver) {
            $driver = config('ocr.driver', 'baidu');
        }

        self::$appId = config('ocr.config.'.$driver.'.appId', '');
        self::$apiKey = config('ocr.config.'.$driver.'.apiKey', '');
        self::$secretKey = config('ocr.config.'.$driver.'.secretKey', '');

        if(empty(self::$appId) || empty(self::$apiKey) || empty(self::$secretKey)) {
            throw new NoConfigurationException("请检查应用参数配置错误！");
        }

        switch ($driver) {
            case 'baidu':
                return new AipOcr(self::$appId, self::$apiKey, self::$secretKey);
        }
    }
}