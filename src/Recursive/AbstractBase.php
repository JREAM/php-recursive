<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive;

abstract class AbstractBase
{
    const FIND_BY_KEY   = 'key';
    const FIND_BY_VALUE = 'value';

    /**
     * How deep to recursively search.
     * Default -1 for infinite
     *
     * @var integer
     */
    protected $max_depth = -1;

    /**
     * @var array
     */
    protected $result = [];

    /**
     * Get the current results
     *
     * @return array
     */
    public function get()
    {
        return $this->result;
    }

    /**
     * Optionally set the max depth to seek within an array
     *
     * @param int  $max_depth
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public function setMaxDepth($max_depth)
    {
        if (!is_numeric($max_depth)) {
            throw new InvalidArgumentException("must be numeric");
        }

        $this->max_depth = $max_depth;
    }


    /**
     * Creates an iterator with settings
     * Resets class-wide results
     *
     * @param  $items  array
     *
     * @return object  \RecursiveIteratorIterator
     */
    protected function _createIterator(array $items)
    {
        $this->result = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveArrayIterator($items)
        );

        $iterator->setMaxDepth($this->max_depth);

        return $iterator;
    }

}