<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Collection
 * @subpackage CustomCollection
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Collection;


/**
 * Dust-iCalendar Collection
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Collection
 * @subpackage CustomCollection
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
abstract class CustomCollection extends Collection {

    /**
     * Return the name of the node and prepend 'X-' by the name
     *
     * @return string
     */
    public function getName()
    {
        return 'X-' . $this->getName();
    }

}