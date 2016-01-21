<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive;

class Modify extends AbstractBase
{

    /**
     * Uppercase all Keys
     *
     * @param array  $items
     *
     * @return array
     */
    public function uppercaseKeys(array $items)
    {
        $this->result = $this->_keyCaseLoop($items, \CASE_UPPER);
        return $this->result;
    }

    /**
     * Lowercase all Keys
     *
     * @param array  $items
     *
     * @return array
     */
    public function lowercaseKeys(array $items)
    {
        $this->result = $this->_keyCaseLoop($items, \CASE_LOWER);
        return $this->result;
    }

    /**
     */
    protected function _keyCaseLoop(&$items, $mode)
    {
        foreach ($items as $key => $value)
        {
            array_change_key_case($items, $mode);

            // Simple recursion
            if (is_array($item[$key])) {
                $this->_keyCaseLoop($item[$key], $mode);
            }
        }
    }

}
