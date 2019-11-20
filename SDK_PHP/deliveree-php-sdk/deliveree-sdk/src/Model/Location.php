<?php
/**
 * Location
 *
 * PHP version 5
 *
 * @category Class
 * @package  Deliveree\Client
 * @author   TMA Dev team
 * @link     https://deliveree.com
 */

/**
 * Deliveree API
 *
 * With Deliveree API, developers can integrate our on-demand local delivery platform into their applications. The API is designed for developers to check prices, book an immediate or scheduled delivery and follow updates until delivery completion.
 *
 * OpenAPI spec version: 1.0.0
 * Contact: duke@deliveree.com
 * Generated by: https://deliveree.com
 */


namespace Deliveree\Client\Model;

use \ArrayAccess;
use \Deliveree\Client\ObjectSerializer;

/**
 * Location Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   TMA Dev team
 * @link     https://deliveree.com
 */
class Location implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Location';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'address' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'recipient_name' => 'string',
        'recipient_phone' => 'string',
        'note' => 'string',
        'need_cod' => 'bool',
        'cod_note' => 'string',
        'cod_invoice_fees' => 'double',
        'need_pod' => 'bool',
        'pod_note' => 'string',
        'position_trackings' => '\Deliveree\Client\Model\PositionTracking[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'address' => null,
'latitude' => 'double',
'longitude' => 'double',
'recipient_name' => null,
'recipient_phone' => null,
'note' => null,
'need_cod' => null,
'cod_note' => null,
'cod_invoice_fees' => 'double',
'need_pod' => null,
'pod_note' => null,
'position_trackings' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'address' => 'address',
        'latitude' => 'latitude',
        'longitude' => 'longitude',
        'recipient_name' => 'recipient_name',
        'recipient_phone' => 'recipient_phone',
        'note' => 'note',
        'need_cod' => 'need_cod',
        'cod_note' => 'cod_note',
        'cod_invoice_fees' => 'cod_invoice_fees',
        'need_pod' => 'need_pod',
        'pod_note' => 'pod_note',
        'position_trackings' => 'position_trackings'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'address' => 'setAddress',
        'latitude' => 'setLatitude',
        'longitude' => 'setLongitude',
        'recipient_name' => 'setRecipientName',
        'recipient_phone' => 'setRecipientPhone',
        'note' => 'setNote',
        'need_cod' => 'setNeedCod',
        'cod_note' => 'setCodNote',
        'cod_invoice_fees' => 'setCodInvoiceFees',
        'need_pod' => 'setNeedPod',
        'pod_note' => 'setPodNote',
        'position_trackings' => 'setPositionTrackings'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'address' => 'getAddress',
        'latitude' => 'getLatitude',
        'longitude' => 'getLongitude',
        'recipient_name' => 'getRecipientName',
        'recipient_phone' => 'getRecipientPhone',
        'note' => 'getNote',
        'need_cod' => 'getNeedCod',
        'cod_note' => 'getCodNote',
        'cod_invoice_fees' => 'getCodInvoiceFees',
        'need_pod' => 'getNeedPod',
        'pod_note' => 'getPodNote',
        'position_trackings' => 'getPositionTrackings'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['latitude'] = isset($data['latitude']) ? $data['latitude'] : null;
        $this->container['longitude'] = isset($data['longitude']) ? $data['longitude'] : null;
        $this->container['recipient_name'] = isset($data['recipient_name']) ? $data['recipient_name'] : null;
        $this->container['recipient_phone'] = isset($data['recipient_phone']) ? $data['recipient_phone'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['need_cod'] = isset($data['need_cod']) ? $data['need_cod'] : null;
        $this->container['cod_note'] = isset($data['cod_note']) ? $data['cod_note'] : null;
        $this->container['cod_invoice_fees'] = isset($data['cod_invoice_fees']) ? $data['cod_invoice_fees'] : null;
        $this->container['need_pod'] = isset($data['need_pod']) ? $data['need_pod'] : null;
        $this->container['pod_note'] = isset($data['pod_note']) ? $data['pod_note'] : null;
        $this->container['position_trackings'] = isset($data['position_trackings']) ? $data['position_trackings'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param string $address address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets latitude
     *
     * @return double
     */
    public function getLatitude()
    {
        return $this->container['latitude'];
    }

    /**
     * Sets latitude
     *
     * @param double $latitude latitude
     *
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->container['latitude'] = $latitude;

        return $this;
    }

    /**
     * Gets longitude
     *
     * @return double
     */
    public function getLongitude()
    {
        return $this->container['longitude'];
    }

    /**
     * Sets longitude
     *
     * @param double $longitude longitude
     *
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->container['longitude'] = $longitude;

        return $this;
    }

    /**
     * Gets recipient_name
     *
     * @return string
     */
    public function getRecipientName()
    {
        return $this->container['recipient_name'];
    }

    /**
     * Sets recipient_name
     *
     * @param string $recipient_name recipient_name
     *
     * @return $this
     */
    public function setRecipientName($recipient_name)
    {
        $this->container['recipient_name'] = $recipient_name;

        return $this;
    }

    /**
     * Gets recipient_phone
     *
     * @return string
     */
    public function getRecipientPhone()
    {
        return $this->container['recipient_phone'];
    }

    /**
     * Sets recipient_phone
     *
     * @param string $recipient_phone recipient_phone
     *
     * @return $this
     */
    public function setRecipientPhone($recipient_phone)
    {
        $this->container['recipient_phone'] = $recipient_phone;

        return $this;
    }

    /**
     * Gets note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->container['note'];
    }

    /**
     * Sets note
     *
     * @param string $note note
     *
     * @return $this
     */
    public function setNote($note)
    {
        $this->container['note'] = $note;

        return $this;
    }

    /**
     * Gets need_cod
     *
     * @return bool
     */
    public function getNeedCod()
    {
        return $this->container['need_cod'];
    }

    /**
     * Sets need_cod
     *
     * @param bool $need_cod need_cod
     *
     * @return $this
     */
    public function setNeedCod($need_cod)
    {
        $this->container['need_cod'] = $need_cod;

        return $this;
    }

    /**
     * Gets cod_note
     *
     * @return string
     */
    public function getCodNote()
    {
        return $this->container['cod_note'];
    }

    /**
     * Sets cod_note
     *
     * @param string $cod_note cod_note
     *
     * @return $this
     */
    public function setCodNote($cod_note)
    {
        $this->container['cod_note'] = $cod_note;

        return $this;
    }

    /**
     * Gets cod_invoice_fees
     *
     * @return double
     */
    public function getCodInvoiceFees()
    {
        return $this->container['cod_invoice_fees'];
    }

    /**
     * Sets cod_invoice_fees
     *
     * @param double $cod_invoice_fees cod_invoice_fees
     *
     * @return $this
     */
    public function setCodInvoiceFees($cod_invoice_fees)
    {
        $this->container['cod_invoice_fees'] = $cod_invoice_fees;

        return $this;
    }

    /**
     * Gets need_pod
     *
     * @return bool
     */
    public function getNeedPod()
    {
        return $this->container['need_pod'];
    }

    /**
     * Sets need_pod
     *
     * @param bool $need_pod need_pod
     *
     * @return $this
     */
    public function setNeedPod($need_pod)
    {
        $this->container['need_pod'] = $need_pod;

        return $this;
    }

    /**
     * Gets pod_note
     *
     * @return string
     */
    public function getPodNote()
    {
        return $this->container['pod_note'];
    }

    /**
     * Sets pod_note
     *
     * @param string $pod_note pod_note
     *
     * @return $this
     */
    public function setPodNote($pod_note)
    {
        $this->container['pod_note'] = $pod_note;

        return $this;
    }

    /**
     * Gets position_trackings
     *
     * @return \Deliveree\Client\Model\PositionTracking[]
     */
    public function getPositionTrackings()
    {
        return $this->container['position_trackings'];
    }

    /**
     * Sets position_trackings
     *
     * @param \Deliveree\Client\Model\PositionTracking[] $position_trackings position_trackings
     *
     * @return $this
     */
    public function setPositionTrackings($position_trackings)
    {
        $this->container['position_trackings'] = $position_trackings;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
