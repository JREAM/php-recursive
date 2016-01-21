<?php
/*
 * (c) Jesse Boyer <hello@jream.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jream\Recursive;

class Dom extends AbstractBase
{

    /**
     * @return void
     */
    public function table(array $items)
    {
    }

    /**
     * @return void
     */
    public function div(array $items, $row_classnames = 'row', $col_classnames = 'col-md-%s')
    {
        if (strpos($col_classnames, '%s') === -1) {
            throw new InvalidArgumentException('$col_classnames must have %s for style enumeration.');
        }

    }

    /**
     * @return void
     */
    protected function _buildLoop(array $items, $type)
    {

    }

}
