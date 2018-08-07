<?php

namespace Honvid;

/*
|--------------------------------------------------------------------------
| CLASS NAME: Ocr
|--------------------------------------------------------------------------
| @author    honvid
| @datetime  2018-08-07 11:28
| @package   Honvid
| @description:
|
*/

use Honvid\Lib\Factory;

class Ocr
{
    /**
     * The name of the driver to used.
     *
     * @var string
     */
    protected $driver = null;

    private $client = null;

    /**
     * Ocr constructor.
     *
     * @param null $driver
     */
    public function __construct($driver = null)
    {
        if (null === $driver) {
            $driver = config('ocr.driver', 'baidu');
        }

        $this->driver = $driver;
    }

    /**
     * @return \Honvid\Lib\Baidu\AipOcr|null
     */
    public function make()
    {
        if ( ! isset($this->client)) {
            $this->client = Factory::factory($this->driver);
        }

        return $this->client;
    }

    /**
     * @param       $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, array $parameters)
    {
        return call_user_func_array([$this->make(), $method], $parameters);
    }
}