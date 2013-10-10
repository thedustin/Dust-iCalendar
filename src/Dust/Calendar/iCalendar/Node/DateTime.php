<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage DateTime
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node;

use Dust\Calendar\iCalendar\Value\DateTime as DateTimeValue;

/**
 * Dust-iCalendar Node
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage DateTime
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 *
 * @property \DateTime $_mValue
 */
abstract class DateTime extends Node
{

    /**
     *
     */
    const MODE_DATETIME = 1;

    /**
     *
     */
    const MODE_DATE = 2;

    /**
     *
     * @var int
     */
    protected $_iMode;

    /**
     * Create a DateTimeNode
     *
     * @param \DateTime $_mValue
     * @param int       $_iMode
     */
    function __construct(\DateTime $_mValue = null, $_iMode = self::MODE_DATETIME)
    {
        $this->setMode($_iMode)
             ->setValue($_mValue ?: new DateTimeValue());
    }

    /**
     * Set the value of this node
     *
     * @param \DateTime $oDateTime
     *
     * @return $this
     */
    public function setValue(\DateTime $oDateTime)
    {
        $this->_mValue = $oDateTime;

        return $this;
    }

    /**
     * Set the date-mode of this node
     *
     * @param $iMode
     *
     * @return $this
     */
    public function setMode($iMode)
    {
        $this->_iMode = (int)$iMode;

        return $this;
    }

    /**
     * Return the iCal-representation of this node
     *
     * @return string
     */
    public function toICal()
    {
        if ($this->getMode() === static::MODE_DATE) {
            return $this->getName() . ';' . $this->getCalendarValue();
        } else {
            return parent::toICal();
        }
    }

    /**
     * Return the date-mode of this node
     *
     * @return int
     */
    public function getMode()
    {
        return $this->_iMode;
    }

    /**
     * @return string
     */
    public function getCalendarValue()
    {
        if ($this->getMode() === static::MODE_DATE) {
            return 'VALUE=DATE:' . $this->getValue()->format(DateTimeValue::DATE_ICALENDAR_DATE);
        } else {
            return $this->getValue()->format(DateTimeValue::DATE_ICALENDAR_FULL);
        }
    }

    /**
     *
     *
     * @return \DateTime
     */
    public function getValue()
    {
        return parent::getValue();
    }

    /**
     * Return the xCal-representation of this node
     *
     * @return string
     * @throws \RuntimeException
     */
    public function toXCal()
    {
        throw new \RuntimeException('Unimplemented yet');
    }
}