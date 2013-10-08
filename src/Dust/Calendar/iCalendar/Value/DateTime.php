<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Value
 * @subpackage DateTime
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Value;


/**
 * Dust-iCalendar Document
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Value
 * @subpackage DateTime
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class DateTime extends \DateTime
{

    /**
     * The default iCalendar datetime formatting (YYYYMMDD[T]HHMMSS[Z] => 20130714T170000Z)
     */
    const DATE_ICALENDAR = 'Ymd\THis\Z';

    /**
     * Alias of the default iCalendar datetime formatting (YYYYMMDD[T]HHMMSS[Z] => 20130714T170000Z)
     */
    const DATE_ICALENDAR_FULL = self::DATE_ICALENDAR;

    /**
     * The default iCalendar date formatting (YYYYMMDD => 20130714)
     */
    const DATE_ICALENDAR_DATE = 'Ymd';

}