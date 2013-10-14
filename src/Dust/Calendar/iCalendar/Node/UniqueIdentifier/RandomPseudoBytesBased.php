<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node\UniqueIdentifier
 * @subpackage RandomPseudoBytesBased
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
 * @subpackage RandomPseudoBytesBased
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class RandomPseudoBytesBased extends UniqueIdentifier
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
        return bin2hex(openssl_random_pseudo_bytes((int)$iLength / 2)) . '@' . $sHost;
    }
}