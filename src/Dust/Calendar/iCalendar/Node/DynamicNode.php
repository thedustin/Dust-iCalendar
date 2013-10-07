<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage DynamicNode
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Node;


/**
 * Dust-iCalendar DynamicNode
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage DynamicNode
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
final class DynamicNode extends Node {

    /**
     * The name of the Node.
     *
     * @var string
     */
    protected $_sName = Node::NODE_NAME;

    /**
     * __construct
     *
     * @param string $sName the name of the node
     * @param mixed $mValue the value of the node
     */
    function __construct($sName, $mValue = null)
    {
        $this->setName($sName)
             ->setValue($mValue);
    }

    /**
     * Return the name of the node
     *
     * @return string
     */
    public function getName()
    {
        return $this->_sName;
    }

    /**
     * Set the name of this Node
     *
     * @param string $sName the new name of this node
     *
     * @return $this
     */
    public function setName($sName)
    {
        $this->_sName = $sName;

        return $this;
    }

}