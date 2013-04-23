<?php
/**
 *
 * Methods for requesting List information
 */
namespace RottenTomatoe\Api;

class Lists extends Base
{
    const TYPE = 'lists';

    /**
     *
     * Retrieve a list of box office movies
     *
     * @param array $opts
     *
     * @return string
     */
    public function boxOfficeMovies(array $opts = array())
    {
        return $this->_request($this->_path(
            'movies/box_office'), $opts
        );
    }
    
    /**
     *
     * Retrieve upcoming movies
     *
     * @param array $opts
     *
     * @return string
     */
    public function upComing(array $opts = array())
    {
        return $this->_request($this->_path(
            'movies/upcoming'), $opts
        );
    }
    
    /**
     *
     * Retrieve current list of movies in theators
     *
     * @param array $opts
     *
     * @return string
     */
    public function inTheators(array $opts = array())
    {
        return $this->_request($this->_path(
            'movies/in_theators'), $opts
        );
    }
    
    /**
     *
     * Retreiving a list of opening movies
     *
     * @param array $opts
     *
     * @return string 
     */
    public function opening(array $opts = array())
    {
        return $this->_request($this->_path(
            'movies/opening'), $opts
        );
    }
    
    /**
     *
     * Retrieve top rented Dvd's
     *
     * @param array $opts
     * 
     * @return string
     */
    public function topRentals(array $opts = array())
    {
        return $this->_request($this->_path(
            'dvds/top_rentals'), $opts
        );
    }
    
    /**
     *
     * Retrieve a list of current releases
     *
     * @param array $opts
     *
     * @return string
     */
    public function currentReleases(array $opts = array())
    {
        return $this->_request($this->_path(
            'dvds/current_releases'), $opts
        );
    }
    
    /**
     *
     * Retrieve all newly released Dvds
     *
     * @param array $opts
     *
     * @return string
     */
    public function newReleases(array $opts = array())
    {
        return $this->_request($this->_path(
            'dvds/new_releases'), $opts
        );
    }
    
    /**
     *
     * Retrieve a list of up coming Dvds
     *
     * @param array $opts
     *
     * @return string
     */
    public function upComingDvd(array $opts = array())
    {
        return $this->_request($this->_path(
            'dvds/upcoming'), $opts
        );
    }
    
    /**
     *
     * Assemple path for request
     *
     * @param string $page
     *
     * @return string
     */
    protected function _path($page)
    {
        $path =  self::TYPE . '/' .$page . '.json?';
        return (string) $path;
    }
}