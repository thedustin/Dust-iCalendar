<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Value
 * @subpackage DateInterval
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
 * @subpackage DateInterval
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class DateInterval extends \DateInterval
{

    /**
     * formating string like ISO 8601 (PnYnMnDTnHnMnS)
     */
    const INTERVAL_ISO8601 = 'P%yY%mM%dDT%hH%iM%sS';

    /**
     * formating string like ISO 8601
     */
    const INTERVAL_ICALENDAR = self::INTERVAL_ISO8601;

    /**
     * formating the interval like ISO 8601 (PnYnMnDTnHnMnS)
     *
     * @return string
     */
    function __toString()
    {
        $sReturn = 'P';

        if($this->y){
            $sReturn .= $this->y . 'Y';
        }

        if($this->m){
            $sReturn .= $this->m . 'M';
        }

        if($this->d){
            $sReturn .= $this->d . 'D';
        }

        if($this->h || $this->i || $this->s){
            $sReturn .= 'T';

            if($this->h){
                $sReturn .= $this->h . 'H';
            }

            if($this->i){
                $sReturn .= $this->i . 'M';
            }

            if($this->s){
                $sReturn .= $this->s . 'S';
            }
        }

        return $sReturn;
    }
}