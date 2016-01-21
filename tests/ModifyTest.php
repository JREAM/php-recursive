<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive\Tests;

/**
 * @covers \Jream\Recursive\Modify
 */
class ModifyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Jream\Recursive\Modify
     */
    private $modify;

    protected function setUp()
    {
        $this->modify = new \Jream\Recursive\Modify();
    }

}