<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\DateTime
 * @subpackage Stamp
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node\DateTime;

use Dust\Calendar\iCalendar\Node\DateTime;

/**
 * Dust-iCalendar Node
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\DateTime
 * @subpackage Stamp
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class Stamp extends DateTime
{

    /**
     * The name of the Node.
     * Will be used by generating the *.iCal- and *.xCal-File
     */
    const NODE_NAME = 'DTSTAMP';

}