<?php
namespace LotteryFront;
use GuzzleHttp\Client;

class Http
{
    private $client = null;

    private $url = '';


    public function __construct($url = '')
    {
        $this->client = new Client(['verify' => false]);
        $this->url = (empty($url)) ? 'http://localhost:12111/api/v1' : $url;
    }


    /**
     * GET でリクエストを投げる
     *
     * @param $url: string
     * @param $param: array('key' => 'value')
     * @return api result | Client()
     */
    public function get($url, $param = [], $decode = true)
    {
        $param = (is_array($param)) ? $param : [];

        $res = $this->client->request('GET', $this->url . $url, ['query' => $param]);

        return ($decode) ? $this->decode($res) : $res;
    }


    /**
     * POST でリクエストを投げる
     *
     * @param $url: string
     * @param $param: array('key' => 'value')
     * @return api result | Client()
     */
    public function post($url, $param = [], $decode = true)
    {
        $param = (is_array($param)) ? $param : [];

        $res = $this->client->request('POST', $this->url . $url, ['form_params' => $param]);

        return ($decode) ? $this->decode($res) : $res;
    }


    /**
     * PATCH でリクエストを投げる
     *
     * @param $url: string
     * @param $param: array('key' => 'value')
     * @return api result | Client()
     */
    public function patch($url, $param = [], $decode = true)
    {
        $param = (is_array($param)) ? $param : [];

        $res = $this->client->request('PATCH', $this->url . $url, ['form_params' => $param]);

        return ($decode) ? $this->decode($res) : $res;
    }


    /**
     * DELETE でリクエストを投げる
     *
     * @param $url: string
     * @param $param: array('key' => 'value')
     * @return api result | Client()
     */
    public function delete($url, $param = [], $decode = true)
    {
        $param = (is_array($param)) ? $param : [];

        $multiparts = [];

        foreach ($param as $key => $value) {
            $multiparts[] = [
                'name' => $key,
                'contents' => $value,
            ];
        }

        if (count($multiparts) == 0) {
            $multiparts[] = [
                'name' => '',
                'contents' => '',
            ];
        }

        $res = $this->client->request('DELETE', $this->url . $url, ['multipart' => $multiparts]);

        return ($decode) ? $this->decode($res) : $res;
    }


    public function decode($client)
    {
        if (empty($client)) {
            return null;
        }

        $body = $client->getBody();

        return (!empty($body)) ? json_decode($body) : null;
    }

    public function toArray($obj)
    {
        if (empty($obj)) {
            return [];
        }
        return json_decode(json_encode($obj), true);
    }
}
