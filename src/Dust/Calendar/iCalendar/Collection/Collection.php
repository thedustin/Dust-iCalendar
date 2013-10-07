<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Collection
 * @subpackage Collection
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Collection;

use Dust\Calendar\iCalendar\Collection\Exception\NodeNotFoundException;
use Dust\Calendar\iCalendar\Document\Document;
use Dust\Calendar\iCalendar\Node\Node;

/**
 * Dust-iCalendar Collection
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Collection
 * @subpackage Collection
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
abstract class Collection extends Node implements \ArrayAccess, \Countable, \IteratorAggregate
{

    /**
     * An array of child-nodes
     *
     * @var Node[]
     */
    protected $_aNodes = array();

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or <b>Traversable</b>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->_aNodes);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset The offset to retrieve.
     *
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return ($this->offsetExists($offset) ? $this->_aNodes[$offset] : null);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset An offset to check for.
     *
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return isset($this->_aNodes[$offset]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value  The value to set.
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->_aNodes[] = & $value;
        } else {
            $this->_aNodes[$offset] = & $value;
        }
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset The offset to unset.
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->_aNodes[$offset]);
    }

    /**
     * Check whether this node have child-nodes
     *
     * @return bool true on has childs or otherwise false
     */
    public function hasChilds()
    {
        return ($this->count() > 0);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->_aNodes);
    }

    /**
     * Prepend the node <i>oNode</i> to the front of the child-array
     *
     * @param Node $oNode the node that should be prepend
     *
     * @return $this
     */
    public function prependNode(Node $oNode)
    {
        array_unshift($this->_aNodes, $oNode);

        return $this;
    }

    /**
     * Check whether <i>oNode</i> is a child of this node
     *
     * @param Node $oNode the node to check
     *
     * @return bool return true when <i>oNode</i> is a child of this node otherwise false
     */
    public function hasNode(Node $oNode)
    {
        return in_array($oNode, $this->_aNodes, true);
    }

    /**
     * Remove all child-nodes
     *
     * @return $this
     */
    public function clear()
    {
        $this->_aNodes = array();

        return $this;
    }

    /**
     * Return an array with all child-nodes
     *
     * @return Node[]
     */
    public function getNodes()
    {
        return $this->_aNodes;
    }

    /**
     * Search whether this node has a child-node with node name <i>sNodeName</i>
     *
     * @param string $sNodeName the node name to search by
     *
     * @return bool return true when a node with the node-name <i>sNodeName</i> was found otherwise false
     */
    public function hasNodeWithNodeName($sNodeName)
    {
        try {
            $this->findNodeByNodeName($sNodeName);

            return true;
        } catch (NodeNotFoundException $ex) {
            return false;
        }
    }

    /**
     * Finds the first node with the node name <i>sNodeName</i>
     *
     * @param string $sNodeName the node name to search by
     *
     * @return Node the founded node
     * @throws Exception\NodeNotFoundException Thrown when no node is found
     */

    public function findNodeByNodeName($sNodeName)
    {
        foreach ($this->_aNodes as $oNode) {
            if ($oNode->getName() === $sNodeName) {
                return $oNode;
            }
        }

        throw new NodeNotFoundException(sprintf('No Node found with Nodename "%s"', $sNodeName));
    }

    /**
     * Set the value of one ore more nodes with the node name <i>sNodeName</i> to <i>mValue</i>
     *
     * @param string $sNodeName the node name to search by
     * @param mixed  $mValue    the new node value
     * @param bool   $bAll      indicates whether one (false) or all (true) nodes will be updated
     *
     * @return $this
     */
    public function setNodeValueByNodeName($sNodeName, $mValue, $bAll = false)
    {
        try {
            if (!$bAll) {
                $oNode = $this->findNodeByNodeName($sNodeName);
                $oNode->setValue($mValue);
            } else {
                $aNodes = $this->findNodesByNodeName($sNodeName);

                foreach ($aNodes as $oNode) {
                    $oNode->setValue($mValue);
                }
            }
        } catch (NodeNotFoundException $ex) {
            $oNode = Node::createNode($sNodeName, $mValue);

            $this->appendNode($oNode);
        }

        return $this;
    }

    /**
     * Finds all nodes with the node name <i>sNodeName</i>
     *
     * @param string $sNodeName the node name to search by
     *
     * @return Node[] an array with the the founded nodes
     * @throws Exception\NodeNotFoundException Thrown when no node is found
     */
    public function findNodesByNodeName($sNodeName)
    {
        $aReturn = array_filter($this->_aNodes, function ($oNode) use ($sNodeName) {
            return ($oNode->getName() === $sNodeName);
        });

        if (empty($aReturn)) {
            throw new NodeNotFoundException(sprintf('No Node found with Nodename "%s"', $sNodeName));
        }

        return $aReturn;
    }

    /**
     * Add the node <i>oNode</i> to the end of the child-array
     *
     * @param Node $oNode the node that should be append
     *
     * @return $this
     */
    public function appendNode(Node $oNode)
    {
        array_push($this->_aNodes, $oNode);

        return $this;
    }

    /**
     * Return the iCal-representation of this node
     *
     * @return string
     */
    public function toICal()
    {
        $sReturn = 'BEGIN:' . $this->getName() . Document::EOL;

        foreach ($this->_aNodes as $oNode) {
            $sReturn .= $oNode->toICal() . Document::EOL;
        }

        $sReturn .= 'END:' . $this->getName();

        return $sReturn;
    }

    /**
     * Return the xCal-representation of this node
     *
     * @return string
     */
    public function toXCal()
    {
        $sLowerName = strtolower($this->getName());
        $sReturn    = '<' . $sLowerName . '>' . Document::EOL;

        foreach ($this->_aNodes as $oNode) {
            $sReturn .= $oNode->toXCal() . Document::EOL;
        }

        $sReturn .= '</' . $sLowerName . '>';

        return $sReturn;
    }
}