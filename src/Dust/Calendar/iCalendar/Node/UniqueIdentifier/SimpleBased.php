<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\UniqueIdentifier
 * @subpackage SimpleBased
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node\UniqueIdentifier;

use Dust\Calendar\iCalendar\Node\UniqueIdentifier;

/**
 * Dust-iCalendar Node
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\UniqueIdentifier
 * @subpackage SimpleBased
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class SimpleBased extends UniqueIdentifier
{

    /**
     * Generate an unique identifier value
     *
     * @param string $sHost   the host that should be used
     * @param int    $iLength the length of the first part of the id
     *
     * @return string
     */
    public static function generateUniqueIdentifier($sHost, $iLength = 16)
    {
        return static::_moreUniqueUniqid($iLength) . '@' . $sHost;
    }

    /**
     * Generate a unique identifier with the length <i>iLength</i> by use of the php-function uniqid()
     *
     * @param int $iLength the length of the first part of the id
     *
     * @return string
     *
     * @link http://www.php.net/manual/en/function.uniqid.php
     */
    protected static function _moreUniqueUniqid($iLength)
    {
        $sUniqid = '';

        do {
            $sUniqid .= uniqid();
        } while(strlen($sUniqid) < $iLength);

        return substr($sUniqid, 0, $iLength);
    }
}