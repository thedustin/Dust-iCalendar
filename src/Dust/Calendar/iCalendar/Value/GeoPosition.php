<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Value
 * @subpackage GeoPosition
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
 * @subpackage GeoPosition
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class GeoPosition
{

    /**
     * Latitude
     *
     * @var float
     */
    protected $_fLatitude = -0.0;

    /**
     * Longitude
     *
     * @var float
     */
    protected $_fLongitude = -0.0;

    /**
     *
     *
     * @param float $fLatitude
     * @param float $fLongitude
     */
    function __construct($fLatitude = -0.0, $fLongitude = -0.0)
    {
        $this->_fLatitude  = (float)$fLatitude;
        $this->_fLongitude = (float)$fLongitude;
    }

    /**
     * Returns the Latitude of this position
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->_fLatitude;
    }

    /**
     * Returns the Longitude of this position
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->_fLongitude;
    }

    /**
     * Set the Latitude of this GeoPosition
     *
     * @param float $fLatitude the new latitude
     *
     * @return $this
     */
    public function setLatitude($fLatitude)
    {
        $this->_fLatitude = (float)$fLatitude;

        return $this;
    }

    /**
     * Set the Longitude of this GeoPosition
     *
     * @param float $fLongitude the new Longitude
     *
     * @return $this
     */
    public function setLongitude($fLongitude)
    {
        $this->_fLongitude = (float)$fLongitude;

        return $this;
    }
}