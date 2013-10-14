<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\Status
 * @subpackage Journal
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
 * @subpackage Journal
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class Journal extends Status
{

    /**
     * Indicates journal is draft
     */
    const DRAFT = 'DRAFT';

    /**
     * Indicates journal is final
     * Alias for Journal::FINAL (but "final" is a reserved word)
     */
    const FINISHING = 'FINAL';

    /**
     * Indicates journal is final
     * Alias for Journal::FINISHING
     */
    const LAST = 'FINAL';

    /**
     * Indicates journal is removed
     */
    const CANCELLED = 'CANCELLED';

}