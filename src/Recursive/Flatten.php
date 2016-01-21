<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive;

class Flatten extends AbstractBase
{
    /**
     * Returns a one-dimensional array in totality
     *
     * @param  array  $items
     *
     * @return array
     */
    public function all(array $items)
    {
        $this->result = $result = [];
        $this->_flattenLoop($result, null, $items, false);
        $this->result = $result;
        return $this->result;
    }

    /**
     * Returns a one-dimensional array based on a child key
     *
     * @param  array  $items
     * @param  string $child_key
     *
     * @return array
     */
    public function byChildKey(array $items, $child_key = 'children')
    {
        $this->result = $result = [];
        $this->_flattenLoop($result, null, $items, $child_key);
        $this->result = $result;
        return $this->result;
    }

    /**
     * Flattens the referenced array into one item
     *
     * @param  array  &$result     Reference array
     * @param  mixed  $parent_key
     * @param  array  $items
     * @param  mixed  $child_key
     *
     * @return void
     */
    protected function _flattenLoop(array &$result, $parentkey, array $items, $child_key = false)
    {
        $flag       = true;
        $parent_key = ($parent_key) ? $parent_key : null;

        foreach ($items as $key => $value)
        {
            if (is_array($value))
            {
                if ($child_key && $key == $child_key && $flag) {
                    $parent_key = end($result);
                    $flag = true;
                } else {
                    $flag = false;
                }

                $this->_flattenLoop($result, $parent_key , $value, $child_key);
            } else {
                $result[] = $parent_key . ' ' . $value;
            }
        }
    }

    /**
     * May just be another way of doing the same as above.
     *
     * @param  [type] $items     [description]
     * @param  string $separator [description]
     *
     * @return array
     */
    public function toDotKeys($items, $separator = '.')
    {
        $iterator = $this->_createIterator($items);
        $result = [];

        foreach ($iterator as $key => $value)
        {
            $keys = [];
            foreach (range(0, $iterator->getDepth()) as $depth) {
                $keys[] = $iterator->getSubIterator($depth)->key();
            }

            $result[ join($separator, $keys) ] = $value;
        }

        return $result;
    }

}
