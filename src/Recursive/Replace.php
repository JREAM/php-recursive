<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive;

class Replace extends AbstractBase
{
    /**
     * @var integer
     */
    protected $replace_limit = -1;
    protected $replace_count = 0;

    /**
     * How many times to replace an item,
     * Default of -1 is for all matches
     *
     * @param integer  $replace_limit
     *
     * @return Jream\Recursive\Replace
     */
    public function setReplaceLimit($replace_limit = -1)
    {
        $this->replace_limit = $replace_limit;
        return $this;
    }

    /**
     */
    public function byKey(array $items, $needle, $replace_value)
    {
        $iterator = $this->_createIterator($items);
        $this->result = $this->_replaceLoop($iterator, $needle, $replace_value, parent::FIND_BY_KEY);
        return $this->result;
    }

    /**
     */
    public function byValue(array $items, $needle, $replace_value)
    {
        $iterator = $this->_createIterator($items);
        $this->result = $this->_replaceLoop($iterator, $needle, $replace_value, parent::FIND_BY_VALUE);
        return $this->result;
    }

    /**
     */
    protected function _replaceLoop(\RecursiveIteratorIterator $items, $needle, $replace_value, $findBy)
    {
        $result = [];
        foreach ($items as $key => $value)
        {
            if ($this->replace_count >= $this->replace_limit) {
                // This will repeatedly return result over and over until it closes off,
                // not sure the best way to do it yet.
                return $result;
            }

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
                $this->replace_count++;
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
                $this->replace_count++;
            }
        }
        return $result;
    }

}
