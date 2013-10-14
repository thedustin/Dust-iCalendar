<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage Status
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node;


/**
 * Dust-iCalendar Node
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage Status
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class Status extends Node
{

    /**
     * The name of the Node.
     * Will be used by generating the *.iCal- and *.xCal-File
     */
    const NODE_NAME = 'Status';

}