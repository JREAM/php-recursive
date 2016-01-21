<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive\Tests;

/**
 * @covers \Jream\Recursive\Replace
 */
class ReplaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Jream\Recursive\Replace
     */
    private $replace;

    protected function setUp()
    {
        $this->replace = new \Jream\Recursive\Replace();
    }

}