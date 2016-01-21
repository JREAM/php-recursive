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
class BuildTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Jream\Recursive\Build
     */
    private $build;

    protected function setUp()
    {
        $this->build = new \Jream\Recursive\Build();
    }

    /**
     * @covers Jream\Recursive\Recursive::findByKey
     */
    public function testFromString()
    {
        $result = $this->build->fromString('two.levels');
        print_r($result);

        $result = $this->build->fromString('parent.bother|sister');
        print_r($result);

        $result = $this->build->fromString('parent->bother|sister->daughter', '->');
        print_r($result);
    }

}