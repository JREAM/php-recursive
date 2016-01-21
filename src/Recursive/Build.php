<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive;

class Build extends AbstractBase
{

    /**
     * Create a multi-dimensional array from a string
     *
     * @example
     *     fromString("this.gets.deep");
     *     produces:
     *     ['this', ['gets', ['deep']]]
     *
     *     fromString('this.gets.deep|bro|sis');
     *     ['this', ['gets', ['deep', 'bro', 'sis']]]
     *     Note: If you duplicate a sibling, eg: bro|bro, it will only use one key.
     *
     *     Using a custom separator (it cannot be the pipe |)
     *     fromString('this->gets->deep|bro|sis', '->');
     *     ['this', ['gets', ['deep', 'bro', 'sis']]]
     *
     *
     *
     * @param  string $string    The string to use
     * @param  string $separator The separator, defaults to "."
     *
     * @return array
     */
    public function fromString($string, $separator = '.')
    {
        if ($separator == '|') {
            throw new InvalidArgumentException('cannot use "|", reserved for sibling arrays');
        }

        if (preg_match("/(\$separator\|)|(\|\$separator)/", $string)) {
            throw new InvalidArgumentException('cannot place the separator: "'.$separator.' next to the pipe: |"');
        }


        $pieces = explode($separator, $string);
        $this->result = [];

        // Reference the current result to append to.
        $current = &$result;
        foreach($pieces as $key)
        {
            // Check for siblings
            if (strpos('|', $key) !== -1) {
                $siblings = explode('|', $key);
                $siblings = array_unique($siblings);
                foreach ($siblings as $v) {
                    $current[$v] = [];
                }
            }
            else
            {
                // Default add a nested key.
                $current[$key] = [];
            }

            // Move a level deeper
            $current = &$current[$key];
        }

        return $this->result;
    }

}
