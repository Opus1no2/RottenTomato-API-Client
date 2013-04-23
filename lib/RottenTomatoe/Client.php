<?php
/**
 *
 * Very simple client for using Rotten Tomatoe API
 *
 */
namespace RottenTomatoe;

use RottenTomatoe\HttpClient\Request;

class Client
{   
    /**
     * @var string $_key
     */
    protected $_key;
    
    /**
     *
     * Class constructor
     *
     * @var string $key
     *
     * @return void
     */
    public function __construct($key)
    {
        $this->_key = (string) $key;
    }
    
    /**
     *
     * Factory method
     *
     * @param string $method
     * @param null $arg
     *
     * @return mixed 
     *
     * @throws RuntTimeException
     */
    public function __call($method, $arg = null)
    {   
        switch ($method) {
            case 'list':
            case 'lists':
                return new Api\Lists($this);
                break;
            case 'movie':
            case 'movies':
                return new Api\Movies($this);
                break;
            default:
                throw new \RuntimeException(sprintf(
                    "Undefined API instance [%s]", $method
                ));
        }
    }
    
    /**
     *
     * Get HttpClient
     *
     * @return obj
     */
    public function getHttpClient()
    {
        $this->_httpClient = new Request($this->_key);
        return $this->_httpClient;
    }
    
    /**
     *
     * Set Http Client
     *
     * @var obj $client
     *
     * @return void
     */
    public function setHttpClient($client)
    {
        $this->_httpCient = $client;
    }    
}