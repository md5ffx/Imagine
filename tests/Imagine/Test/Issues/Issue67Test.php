<?php

namespace Imagine\Test\Issues;

use Imagine\Exception\RuntimeException;
use Imagine\Gd\Imagine;
use Imagine\Test\ImagineTestCase;

/**
 * @group ext-gd
 */
class Issue67Test extends ImagineTestCase
{
    private function getImagine()
    {
        try {
            $imagine = new Imagine();
        } catch (RuntimeException $e) {
            $this->markTestSkipped($e->getMessage());
        }

        return $imagine;
    }

    /**
     * @expectedException \Imagine\Exception\RuntimeException
     */
    public function testShouldThrowExceptionNotError()
    {
        $invalidPath = '/thispathdoesnotexist';

        $imagine = $this->getImagine();

        $imagine->open('tests/Imagine/Fixtures/large.jpg')
            ->save($invalidPath . '/myfile.jpg');
    }
}
