<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive\Tests;
/**
 * @covers \Jream\Recursive\Dom
 */
class DomTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Jream\Recursive\Dom
     */
    private $dom;

    protected function setUp()
    {
        $this->dom = new \Jream\Recursive\Dom();
    }

}