<?php

namespace AZ\Helper;

/**
 * Хелпер для работы c меню
 *
 * Class MenuHelper
 *
 * @package FH\Helper
 *
 * @author Kulichkov Roman <roman@kulichkov.pro>
 */

class MenuHelper
{
    /**
     * MenuHelper constructor.
     */
    public function __construct()
    {}

    /**
     * @param array $dataset
     *
     * @return array
     */
    function buildTree(array $dataset)
    {
        $tree = array();
        $references = array();
        foreach($dataset as $id => & $node)
        {
            $references[$node['ID']] = & $node;
            $node['CHILDREN'] = array();

            if (is_null($node['PARENT_ID']))
            {
                $tree[$node['ID']] = & $node;
            }
            else
            {
                $references[$node['PARENT_ID']]['CHILDREN'][$node['ID']] = & $node;
            }
        }
        return $tree;
    }
}
?>
