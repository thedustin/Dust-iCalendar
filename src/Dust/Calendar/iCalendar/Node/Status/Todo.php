<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\Status
 * @subpackage Todo
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
 * @subpackage Todo
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class Todo extends Status
{

    /**
     * Indicates to-do needs action
     */
    const NEEDS_ACTION = 'NEEDS-ACTION';

    /**
     * Indicates to-do completed
     */
    const COMPLETED = 'COMPLETED';

    /**
     * Indicates to-do in process of
     */
    const IN_PROCESS = 'IN-PROCESS';

    /**
     * Indicates to-do was cancelled
     */
    const CANCELLED = 'CANCELLED';

}