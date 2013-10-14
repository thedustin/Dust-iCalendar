<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage Node
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
 * @subpackage Node
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
abstract class Node {

    /**
     * The name of the Node.
     * Will be used by generating the *.iCal- and *.xCal-File
     */
    const NODE_NAME = 'UNKNOWN';

    /**
     * The max length of a line (in "Byte")
     */
    const MAX_LINE_LENGTH = 75;

    /**
     * The Charsequence to connect multiline values
     */
    const LINE_GLUE = "\r\n ";

    /**
     * The default linebreak
     */
    const EOL = "\r\n";

    /**
     * The value of the node
     *
     * @var mixed
     */
    protected $_mValue;

    /**
     * a list with node names as keys and the class als value
     * 
     * @var array
     */
    protected static $_aClassToNodeName = array(
        'DTEND' => 'Dust\\Calendar\\iCalendar\\Node\\DateTime\\End',
        'DTSTAMP' => 'Dust\\Calendar\\iCalendar\\Node\\DateTime\\Stamp',
        'DTSTART' => 'Dust\\Calendar\\iCalendar\\Node\\DateTime\\Start',
        'GEO' => 'Dust\\Calendar\\iCalendar\\Node\\Geo',
        'STATUS' => 'Dust\\Calendar\\iCalendar\\Node\\Status',
        'STATUS_EVENT' => 'Dust\\Calendar\\iCalendar\\Node\\Status\\Event',
        'STATUS:EVENT' => 'Dust\\Calendar\\iCalendar\\Node\\Status\\Event',
        'STATUS_JOURNAL' => 'Dust\\Calendar\\iCalendar\\Node\\Status\\Journal',
        'STATUS:JOURNAL' => 'Dust\\Calendar\\iCalendar\\Node\\Status\\Journal',
        'STATUS_TODO' => 'Dust\\Calendar\\iCalendar\\Node\\Status\\Todo',
        'STATUS:TODO' => 'Dust\\Calendar\\iCalendar\\Node\\Status\\Todo',
        'UID' => 'Dust\\Calendar\\iCalendar\\Node\\UniqueIdentifier',
    );

    /**
     * @param mixed $_mValue The value of the node
     */
    function __construct($_mValue)
    {
        $this->setValue($_mValue);
    }

    /**
     * Return the value of the node as a plain string to use in the *.iCal-File
     *
     * @return string
     */
    public function getCalendarValue()
    {
        return (string) $this->_mValue;
    }

    /**
     * Return the name of the node
     *
     * @return string
     */
    public function getName()
    {
        return static::NODE_NAME;
    }

    /**
     * Return the value of the node
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->_mValue;
    }

    /**
     * Set the value of this node
     *
     * @param mixed $mValue the new value
     *
     * @return $this
     */
    public function setValue($mValue)
    {
        $this->_mValue = $mValue;

        return $this;
    }

    /**
     * Return the iCal-representation of this node
     *
     * @return string
     */
    public function toICal()
    {
        return $this->getName() . ':' . $this->getCalendarValue();
    }

    /**
     * Return the xCal-representation of this node
     *
     * @return string
     */
    public function toXCal()
    {
        $sLowerName = strtolower($this->getName());

        return '<' . $sLowerName . '>' . $this->getCalendarValue() . '</' . $sLowerName . '>';
    }

    /**
     * Create a new Node from type <i>sNodeName</i>
     *
     * @param string $sNodeName the name of the new node
     * @param mixed $mValue the value of the new node
     *
     * @return Node
     */
    public static function createNode($sNodeName, $mValue = null)
    {
        if(isset(static::$_aClassToNodeName[$sNodeName])){
            return new static::$_aClassToNodeName[$sNodeName]($mValue);
        } else if(substr($sNodeName, 0, 2) === 'X-'){
            return new DynamicCustomNode($sNodeName, $mValue);
        }

        return new DynamicNode($sNodeName, $mValue);
    }
}