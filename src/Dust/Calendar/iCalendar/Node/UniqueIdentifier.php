<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Node
 * @subpackage UniqueIdentifier
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
 * @subpackage UniqueIdentifier
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
abstract class UniqueIdentifier extends Node
{

    /**
     * The name of the Node.
     * Will be used by generating the *.iCal- and *.xCal-File
     */
    const NODE_NAME = 'UID';

    /**
     * the host of this unique identifier
     *
     * @var string
     */
    protected $_sHost = 'example.org';

    /**
     * @param string $sHost the host of the node
     */
    function __construct($sHost)
    {
        $this->setHost($sHost);
    }

    /**
     * set the host of this unique identifier
     *
     * @param string $sHost the new host
     *
     * @return $this
     */
    public function setHost($sHost)
    {
        $this->_sHost = (string)$sHost;

        return $this;
    }

    /**
     * Create a node from type UniqueIdentifier and generate and set the value automatically
     *
     * @param string $sHost   the host of the node
     * @param int    $iLength the length of the first part of the id
     *
     * @return UniqueIdentifier
     */
    public static function createUniqueIdentifier($sHost, $iLength = 16)
    {
        /** @var UniqueIdentifier $oNode */
        $oNode = new static($sHost);

        $oNode->setHost($sHost)
            ->setValue($oNode->generate($iLength));

        return $oNode;
    }

    /**
     * generate an unique id
     *
     * @param int $iLength the length of the first part of the id
     *
     * @return string
     */
    public function generate($iLength = 16)
    {
        return static::generateUniqueIdentifier($this->getHost(), $iLength);
    }

    /**
     * Generate an unique identifier value
     *
     * @param string $sHost   the host that should be used
     * @param int    $iLength the length of the first part of the id
     *
     * @return string
     */
    abstract public static function generateUniqueIdentifier($sHost, $iLength = 16);

    /**
     * return the host of this unique identifier
     *
     * @return string
     */
    public function getHost()
    {
        return $this->_sHost;
    }

    /**
     * generate an unique id and set this as value
     *
     * @param int $iLength the length of the first part of the id
     *
     * @return $this
     */
    public function generateValue($iLength = 16)
    {
        $this->setValue($this->generate($iLength));

        return $this;
    }
}