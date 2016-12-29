<?php

namespace YoutubeDownloader\Tests;

use PHPUnit_Framework_TestCase;
use YoutubeDownloader\Youtube;

/**
 * Class YoutubeTest
 *
 * @package YoutubeDownloader\Tests
 */
class YoutubeTest extends PHPUnit_Framework_TestCase
{

    public function testInfo()
    {
        $ytDownload = new Youtube();

        $info = $ytDownload->info('https://www.youtube.com/watch?v=eNdZ3vK392k');

        $this->assertEquals($info['title'], 'Dummy Video #2');
    }

    public function testDownload()
    {
        $ytDownload = new Youtube();

        $info = $ytDownload->download('https://www.youtube.com/watch?v=eNdZ3vK392k', array(
            '--no-progress',
            '--audio-format mp3',
        ));

        $this->assertTrue($info);
    }
}
