<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive\Tests;

/**
 * @covers \Jream\Recursive\Build
 */
class FindTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Jream\Recursive\Find
     */
    private $find;

    protected function setUp()
    {
        $this->find = new \Jream\Recursive\Find();
    }

    /**
     * @covers Jream\Recursive\Recursive::findByKey
     * @dataProvider valuesProvider
     */
    public function findByKey($value, $key)
    {
        $result = $this->find->byKey($value, $key);
        $this->assertInternalType('array', $result);
        $this->assertNotEmpty($result);
    }

    /**
     * @covers Jream\Recursive\Recursive::findByValue
     * @dataProvider valuesProvider
     */
    public function findByValue($value, $key)
    {
        $result = $this->find->byValue($value, $key);
        $this->assertInternalType('array', $result);
        $this->assertNotEmpty($result);
    }

}