<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Document
 * @subpackage Document
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

namespace Dust\Calendar\iCalendar\Document;

use Dust\Calendar\iCalendar\Collection\Collection;
use Dust\Calendar\iCalendar\Document\Exception\UnknownDocumentFormatException;
use Dust\Calendar\iCalendar\Node\Node;

/**
 * Dust-iCalendar Document
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar\iCalendar\Document
 * @subpackage Document
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @copyright  2013 Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @version    Release: @package_version@
 * @link       http://thedust.in
 */
class Document extends Collection
{

    /**
     * The name of the Node.
     * Will be used by genewating the *.iCal- and *.xCal-File
     */
    const NODE_NAME = 'VCALENDAR';

    /**
     * declare that the document should present an iCal-File
     */
    const FORMAT_ICAL = 1;

    /**
     * declare that the document should present an xCal-File
     */
    const FORMAT_XCAL = 2;

    /**
     * declare that the document should present an vCalendar Version 1.0
     */
    const VERSION_10 = 1.0;

    /**
     * declare that the document should present an vCalendar Version 2.0
     */
    const VERSION_20 = 2.0;

    /**
     * the default product id to use in the document
     */
    const PRODID_DEFAULT = '-//Dustin Breuer//NONSGML DustICalendar//DE';

    /**
     * The version of the document
     *
     * @var float
     */
    protected $_fVersion;

    /**
     * The product id of the document
     *
     * @var string
     */
    protected $_sProdId;

    /**
     * The format of the document
     *
     * @var int
     */
    protected $_iFormat;

    /**
     * @param float  $fVersion
     * @param int    $iFormat
     * @param string $sProdId
     */
    function __construct($fVersion = self::VERSION_20, $iFormat = self::FORMAT_ICAL, $sProdId = self::PRODID_DEFAULT)
    {
        $this->setVersion($fVersion)
        ->setFormat($iFormat)
        ->setProdId($sProdId);
    }

    /**
     * Set the Format of the document
     *
     * @param int $iFormat The new Format of the document
     *
     * @return $this
     */
    public function setFormat($iFormat)
    {
        $this->_iFormat = (int)$iFormat;

        return $this;
    }

    /**
     * Set the Version of the document
     *
     * @param float $fVersion The new Version of the document
     *
     * @return $this
     */
    public function setVersion($fVersion)
    {
        $this->_fVersion = (float)$fVersion;

        return $this;
    }

    /**
     * Set the ProdId of the document
     *
     * @param string $sProdId The new ProdId of the document
     *
     * @return $this
     */
    public function setProdId($sProdId)
    {
        $this->_sProdId = (string)$sProdId;

        return $this;
    }

    /**
     * Return the document as string
     *
     * @return string
     * @throws Exception\UnknownDocumentFormatException
     */
    function __toString()
    {
        return $this->toString();
    }

    /**
     * Return the document as string
     *
     * @return string
     * @throws Exception\UnknownDocumentFormatException
     */
    public function toString()
    {
        switch ($this->getFormat()) {
            case static::FORMAT_ICAL:
                return $this->toICal();
            case static::FORMAT_XCAL:
                return $this->toXCal();
            default:
                throw new UnknownDocumentFormatException(sprintf('Documentformat %u is unknown', $this->getFormat()));
        }
    }

    /**
     * Return the format of the document
     *
     * @return int
     */
    public function getFormat()
    {
        return $this->_iFormat;
    }

    /**
     * Return the iCal-representation of this document
     *
     * @return string
     */
    public function toICal()
    {
        $sReturn = 'BEGIN:' . $this->getName() . Node::EOL;
        $sReturn .= sprintf('VERSION:%1.1f', $this->getVersion()) . Node::EOL;
        $sReturn .= 'PRODID:' . $this->getProdId() . Node::EOL;

        foreach ($this->_aNodes as $oNode) {
            $sReturn .= $oNode->toICal() . Node::EOL;
        }

        $sReturn .= 'END:' . $this->getName();

        return $sReturn;
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

    /**
     * Return the version of the document
     *
     * @return float
     */
    public function getVersion()
    {
        return $this->_fVersion;
    }

    /**
     * Return the product id of the document
     *
     * @return string
     */
    public function getProdId()
    {
        return $this->_sProdId;
    }

    /**
     * Write the document to the file <i>sFilename</i>
     *
     * @param string $sFilename the Path
     *
     * @return bool return true on success and false on failure
     * @throws Exception\UnknownDocumentFormatException
     * @throws \UnexpectedValueException
     */
    public function toFile($sFilename)
    {
        //TODO: Maybe i should test is_writeable a bit...
        if (is_writeable($sFilename)) {
            return (file_put_contents($sFilename, $this->toString()) !== false);
        }
        throw new \UnexpectedValueException(sprintf('Expected an valid, writeable path but get %s', $sFilename));
    }
}