<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Test\Gd;

use Imagine\Gd\Imagine;
use Imagine\Test\Image\AbstractFontTest;

/**
 * @group ext-gd
 */
class FontTest extends AbstractFontTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        if (!function_exists('gd_info')) {
            $this->markTestSkipped('Gd not installed');
        }
        $infos = gd_info();
        if (empty($infos['FreeType Support'])) {
            $this->markTestSkipped('This install does not support font tests');
        }
    }

    /**
     * {@inheritdoc}
     *
     * @see \Imagine\Test\Image\AbstractFontTest::getImagine()
     */
    protected function getImagine()
    {
        return new Imagine();
    }
}
