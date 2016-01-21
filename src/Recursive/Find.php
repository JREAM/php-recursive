<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive;

class Find extends AbstractBase
{
    /**
     * Recursively find keys within a multi-dimenional array.
     *
     * @param  array   $items
     * @param  scalar  $needle
     *
     * @return object  Chain with ->get(), or
     *                            $object->findByValue['result'];
     */
    public function byKey(array $items, $needle)
    {
        $iterator = $this->_createIterator($items);
        $this->result = $this->_findLoop($iterator, $needle, parent::FIND_BY_KEY);
        return $this->result;
    }

    /**
     * Recursively find values within a multi-dimenional array.
     *
     * @param  array   $items
     * @param  scalar  $needle
     *
     * @return object  Chain with ->get(), or
     *                            $object->findByValue['result'];
     */
    public function byValue(array $items, $needle)
    {
        $iterator = $this->_createIterator($items);
        $this->result = $this->_findLoop($iterator, $needle, parent::FIND_BY_VALUE);
        return $this->result;
    }

    /**
     * Main lookup loop
     *
     * @param  \RecursiveIteratorIterator $items
     * @param  scalar                     $needle
     * @param  const                      $findBy  mode to find by
     *
     * @return array
     */
    protected function _findLoop(\RecursiveIteratorIterator $items, $needle, $findBy)
    {
        $result = [];
        foreach ($items as $key => $value)
        {
            $iter_keys = [];
            for ($i = $items->getDepth()-1; $i > 0; $i--) {
                $iter_keys[] = $items->getSubIterator($i)->key();
            }

            // Value Search
            if ($findBy === parent::FIND_BY_VALUE && $value === $needle)
            {
                $result[] = [
                    'key'         => $key,
                    'value'       => $value,
                    'depth'       => $items->getDepth(),
                    'parent_keys' => $iter_keys
                ];
            }
            // Key Search
            else if ($findBy === parent::FIND_BY_KEY && $key === $needle)
            {
                $result[] = [
                    'key'         => $key,
                    'value'       => $value,
                    'depth'       => $items->getDepth(),
                    'parent_keys' => $iter_keys
                ];
            }
        }
        return $result;
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
