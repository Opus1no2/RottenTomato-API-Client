<?php
/**
 *
 * Base
 */
namespace RottenTomatoe\Api;

use RottenTomatoe\Client;

class Base 
{
    /**
     * @var obj $_client
     */
    protected $_client;
    
    /**
     *
     * Inject Client Object
     *
     * @param obj $client
     */
    public function __construct(Client $client)
    {
        $this->_client = $client;
        
    }
    
    /**
     *
     * Http Request
     *
     * @param string $url
     * @param array $opts
     *
     * @return string
     */ 
    public function _request($url, $opts)
    {
        return $this->_client->getHttpClient()->_request($url, $opts);
    }
}