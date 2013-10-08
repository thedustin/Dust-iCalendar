<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage Geo
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node;

use Dust\Calendar\iCalendar\Value\GeoPosition;

/**
 * Dust-iCalendar Node
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage Geo
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 *
 * @property GeoPosition $_mValue
 */
class Geo extends Node
{

    /**
     * The name of the Node.
     * Will be used by generating the *.iCal- and *.xCal-File
     */
    const NODE_NAME = 'GEO';

    /**
     * @param GeoPosition $_mValue
     */
    function __construct(GeoPosition $_mValue = null)
    {
        parent::__construct($_mValue);
    }

    /**
     * Set the value ot this node.
     * By one arguments, the first argument must be from type Value/GeoPosition
     * By two arguments, the first and second argument must be from type float
     *
     * @param GeoPosition|float $mValue  A Value/GeoPosition or one of two float values
     * @param float             $mValue2 (optional) a float value
     *
     * @return $this
     * @throws \BadMethodCallException
     */
    public function setValue($mValue, $mValue2 = null)
    {
        switch (func_num_args()) {
            case 1:
                if (!$mValue instanceof GeoPosition) {
                    throw new \BadMethodCallException(sprintf('%s::%s expect as first argument an Object from Type Value/GeoPositon but get an Object from Type %s',
                                                              get_class($this), __METHOD__, get_class($mValue)));
                }

                $this->_mValue = $mValue;
                break;
            case 2:
                if (!is_float($mValue) || !is_float($mValue2)) {
                    throw new \BadMethodCallException(sprintf('%s::%s expect as first and second argument float values, but get values from type %s and %s',
                                                              get_class($this), __METHOD__, gettype($mValue),
                                                              gettype($mValue2)));
                }

                $this->_mValue = new GeoPosition($mValue, $mValue2);
                break;
            default:
                throw new \BadMethodCallException(sprintf('%s::%s expect as one or two arguments, but get %u',
                                                          get_class($this), __METHOD__, func_num_args()));
        }

        return $this;
    }

    /**
     * Returns the Latitude of this node
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->_mValue->getLatitude();
    }

    /**
     * Returns the Longitude of this node
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->_mValue->getLongitude();
    }

    /**
     * Set the Latitude of this Node
     *
     * @param float $fLatitude the new latitude
     *
     * @return $this
     */
    public function setLatitude($fLatitude)
    {
        $this->_mValue->setLatitude($fLatitude);

        return $this;
    }

    /**
     * Set the Longitude of this Node
     *
     * @param float $fLongitude the new Longitude
     *
     * @return $this
     */
    public function setLongitude($fLongitude)
    {
        $this->_mValue->setLongitude($fLongitude);

        return $this;
    }
}