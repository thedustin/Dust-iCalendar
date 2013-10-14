<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\Status
 * @subpackage Event
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node\Status;

use Dust\Calendar\iCalendar\Node\Status;

/**
 * Dust-iCalendar Node
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\Status
 * @subpackage Event
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class Event extends Status
{

    /**
     * Indicates event is tentative
     */
    const TENTATIVE = 'TENTATIVE';

    /**
     * Indicates event is definite
     */
    const CONFIRMED = 'CONFIRMED';

    /**
     * Indicates event was cancelled
     */
    const CANCELLED = 'CANCELLED';

}