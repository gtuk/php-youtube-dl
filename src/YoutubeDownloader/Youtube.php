<?php

namespace YoutubeDownloader;

use Exception;

/**
 * Class Youtube
 *
 * @package YoutubeDownloader
 */
class Youtube
{

    private $executable;

    /**
     * YoutubeDownloader constructor.
     *
     * @param string $executable
     *
     * @throws Exception
     */
    public function __construct($executable = '/usr/local/bin/youtube-dl')
    {
        if (! file_exists($executable)) {
            throw new Exception('Can\'t find executable');
        }
        $this->executable = $executable;
    }


    /**
     * Get info
     *
     * @param $url
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function info($url) {
        $result = $this->cmdWrapper($url, array('--dump-json'));

        return json_decode($result, true);
    }

    /**
     * Download from an url
     *
     * @param       $url
     * @param array $params
     *
     * @return bool
     *
     * @throws Exception
     */
    public function download($url, $params = array()) {
        $this->cmdWrapper($url, $params);

        return true;
    }

    /**
     * Execute command
     *
     * @param       $url
     * @param array $params
     *
     * @return string
     *
     * @throws Exception
     */
    private function cmdWrapper($url, $params = array()) {
        $content = shell_exec($this->executable.' '.$url.' '.$this->parseParams($params));
        if (!$content) {
            throw new Exception('There was an error during the execution');
        }

        return $content;
    }

    /**
     * Parse a params array to string
     *
     * @param $params
     *
     * @return string
     */
    private function parseParams($params) {
        return implode(' ', $params);
    }
}