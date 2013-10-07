<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage CustomNode
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node;


/**
 * Dust-iCalendar CustomNode
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage CustomNode
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
abstract class CustomNode extends Node {

    /**
     * Return the name of the node and prepend 'X-' by the name
     *
     * @return string
     */
    public function getName()
    {
        return 'X-' . parent::getName();
    }

}