<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage LongValue
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
 * @subpackage LongValue
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
abstract class LongValue extends Node
{

    /**
     * Return the iCal-representation of this node
     *
     * @return string
     */
    public function toICal()
    {
        return static::foldLine(parent::toICal());
    }

    /**
     * Fold a long line
     *
     * @param string $sCompleteLine
     *
     * @return string
     */
    public static function foldLine($sCompleteLine)
    {
        if(strlen($sCompleteLine) < static::MAX_LINE_LENGTH){
            return $sCompleteLine;
        }

        return wordwrap($sCompleteLine, static::MAX_LINE_LENGTH - strlen(static::LINE_GLUE), static::LINE_GLUE, true);
    }

}