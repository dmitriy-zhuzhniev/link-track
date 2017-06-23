<?php

namespace App\Domain\Click;

class Click
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $ua;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $ref;

    /**
     * @var string
     */
    private $param1;

    /**
     * @var string
     */
    private $param2;

    /**
     * @var int
     */
    private $error = 0;

    /**
     * @var int
     */
    private $badDomain = 0;

    /**
     * @param ClickId $id
     * @param $ua
     * @param $ip
     * @param $ref
     * @param $param1
     */
    public function __construct(
        ClickId $id,
        $ua,
        $ip,
        $ref,
        $param1
    ) {
        $this->id = $id->getValue();
        $this->id = $id;
        $this->ua = $ua;
        $this->ip = $ip;
        $this->ref = $ref;
        $this->param1 = $param1;
    }

    /**
     * @param ClickId $id
     * @param $ua
     * @param $ip
     * @param $ref
     * @param $param1
     *
     * @return Click
     */
    public static function register(
        ClickId $id,
        $ua,
        $ip,
        $ref,
        $param1
    ) {
        return new Click($id, $ua, $ip, $ref, $param1);
    }

    /**
     * @return ClickId
     */
    public function id()
    {
        return new ClickId($this->id);
    }

    /**
     * @return string
     */
    public function ua()
    {
        return $this->ua;
    }

    /**
     * @param string $ua
     */
    public function setUa($ua)
    {
        $this->ua = $ua;
    }

    /**
     * @return string
     */
    public function ip()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function ref()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return string
     */
    public function param1()
    {
        return $this->param1;
    }

    /**
     * @param string $param1
     */
    public function setParam1($param1)
    {
        $this->param1 = $param1;
    }

    /**
     * @return string
     */
    public function param2()
    {
        return $this->param2;
    }

    /**
     * @param string $param2
     */
    public function setParam2($param2)
    {
        $this->param2 = $param2;
    }

    /**
     * @return int
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * @param int $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return int
     */
    public function badDomain()
    {
        return $this->badDomain;
    }

    /**
     * @param int $badDomain
     */
    public function setBadDomain($badDomain)
    {
        $this->badDomain = $badDomain;
    }
}