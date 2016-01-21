<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive\Tests;

/**
 * @covers \Jream\Recursive\Flatten
 */
class FlattenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Jream\Recursive\Flatten
     */
    private $flatten;

    protected function setUp()
    {
        $this->flatten = new \Jream\Recursive\Flatten();
    }

}