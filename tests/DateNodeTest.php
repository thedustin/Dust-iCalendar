<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar
 * @subpackage Test
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

require_once 'init.php';

use Dust\Calendar\iCalendar\Node\DateTime\End;
use Dust\Calendar\iCalendar\Node\DateTime\Stamp;
use Dust\Calendar\iCalendar\Node\DateTime\Start;
use Dust\Calendar\iCalendar\Value\DateTime;

/**
 * Dust-iCalendar Node
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar
 * @subpackage Test
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class DateNodeTest extends PHPUnit_Framework_TestCase
{

    const DATETIME_CREATE_STRING_FULL = '20131010T164525Z';
    const DATETIME_CREATE_STRING_DATE = '20131010';

    public function testStampICal()
    {
        $oDateStamp = new Stamp(new DateTime('20131010T164525Z'));

        $oDateStamp->setMode(Stamp::MODE_DATETIME);
        $this->assertEquals('DTSTAMP:'.self::DATETIME_CREATE_STRING_FULL, $oDateStamp->toICal());

        $oDateStamp->setMode(Stamp::MODE_DATE);
        $this->assertEquals('DTSTAMP;VALUE=DATE:'.self::DATETIME_CREATE_STRING_DATE, $oDateStamp->toICal());
    }

    public function testStartICal()
    {
        $oDateStart = new Start(new DateTime('20131010T164525Z'));

        $oDateStart->setMode(Start::MODE_DATETIME);
        $this->assertEquals('DTStart:'.self::DATETIME_CREATE_STRING_FULL, $oDateStart->toICal());

        $oDateStart->setMode(Start::MODE_DATE);
        $this->assertEquals('DTStart;VALUE=DATE:'.self::DATETIME_CREATE_STRING_DATE, $oDateStart->toICal());
    }

    public function testEndICal()
    {
        $oDateEnd = new End(new DateTime('20131010T164525Z'));

        $oDateEnd->setMode(End::MODE_DATETIME);
        $this->assertEquals('DTEnd:'.self::DATETIME_CREATE_STRING_FULL, $oDateEnd->toICal());

        $oDateEnd->setMode(End::MODE_DATE);
        $this->assertEquals('DTEnd;VALUE=DATE:'.self::DATETIME_CREATE_STRING_DATE, $oDateEnd->toICal());
    }

}