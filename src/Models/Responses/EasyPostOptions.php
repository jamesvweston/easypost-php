<?php

namespace jamesvweston\EasyPost\Models\Responses;


use jamesvweston\EasyPost\Traits\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.easypost.com/docs/api.html#options-object
 * Class Options
 * @package jamesvweston\EasyPost\Models\Responses
 */
class EasyPostOptions
{

    use SimpleSerialize;

    /**
     * Setting this option to true, will add an additional handling charge. An Additional Handling charge may be applied to the following:
     * Any article that is encased in an outside shipping container made of metal or wood.
     * Any item, such as a barrel, drum, pail or tire, that is not fully encased in a corrugated cardboard shipping container
     * Any package with the longest side exceeding 60 inches or its second longest side exceeding 30 inches.
     * Any package with an actual weight greater than 70 pounds.
     * @var	boolean
     */
    protected $additional_handling;

    /**
     * Setting this option to "0", will allow the minimum amount of address information to pass the validation check.
     * Only for USPS postage.
     * @var	string
     */
    protected $address_validation_level;

    /**
     * Set this option to true if your shipment contains alcohol.
     * UPS - only supported for US Domestic shipments
     * FedEx - only supported for US Domestic shipments
     * Canada Post - Requires adult signature 19 years or older. If you want adult signature 18 years or older, instead use delivery_confirmation: ADULT_SIGNATURE
     * @var	boolean
     */
    protected $alcohol;

    /**
     * Setting an account number of the receiver who is to receive and buy the postage.
     * UPS - bill_receiver_postal_code is also required
     * @var	string
     */
    protected $bill_receiver_account;

    /**
     * Setting a postal code of the receiver account you want to buy postage.
     * UPS - bill_receiver_account also required
     * @var	string
     */
    protected $bill_receiver_postal_code;

    /**
     * Setting an account number of the third party account you want to buy postage.
     * UPS - bill_third_party_country and bill_third_party_postal_code also required
     * @var	string
     */
    protected $bill_third_party_account;

    /**
     * Setting a country of the third party account you want to buy postage.
     * UPS - bill_third_party_account and bill_third_party_postal_code also required
     * @var	string
     */
    protected $bill_third_party_country;

    /**
     * Setting a postal code of the third party account you want to buy postage.
     * UPS - bill_third_party_country and bill_third_party_account also required
     * @var	string
     */
    protected $bill_third_party_postal_code;

    /**
     * Setting this option to true will indicate to the carrier to prefer delivery by drone, if the carrier supports drone delivery.
     * @var	boolean
     */
    protected $by_drone;

    /**
     * Setting this to true will add a charge to reduce carbon emissions.
     * @var	boolean
     */
    protected $carbon_neutral;

    /**
     * Adding an amount will have the carrier collect the specified amount from the recipient.
     * @var	string
     */
    protected $cod_amount;

    /**
     * Method for payment. "CASH", "CHECK", "MONEY_ORDER"
     * @var	string
     */
    protected $cod_method;

    /**
     * Which currency this shipment will show for rates if carrier allows.
     * @var	string
     */
    protected $currency;

    /**
     * Incoterm negotiated for shipment.
     * Supported values are "EXW", "FCA", "CPT", "CIP", "DAT", "DAP", "DDP", "FAS", "FOB", "CFR", and "CIF".
     * Setting this value to anything other than "DDP" will pass the cost and responsibility of duties on to the recipient of the package(s),
     * as specified by Incoterms rules
     * @var	string
     */
    protected $incoterm;

    /**
     * If you want to request a signature, you can pass "ADULT_SIGNATURE" or "SIGNATURE". You may also request "NO_SIGNATURE" to leave the package at the door.
     * All - some options may be limited for international shipments
     * @var	string
     */
    protected $delivery_confirmation;

    /**
     * Package contents contain dry ice.
     * UPS - Need dry_ice_weight to be set
     * UPS MailInnovations - Need dry_ice_weight to be set
     * FedEx - Need dry_ice_weight to be set
     * @var bool
     */
    protected $dry_ice;

    /**
     * If the dry ice is for medical use, set this option to true.
     * UPS - Need dry_ice_weight to be set
     * UPS MailInnovations - Need dry_ice_weight to be set
     * @var	string
     */
    protected $dry_ice_medical;

    /**
     * Weight of the dry ice in ounces.
     * UPS - Need dry_ice to be set
     * UPS MailInnovations - Need dry_ice to be set
     * FedEx - Need dry_ice to be set
     * @var	string
     */
    protected $dry_ice_weight;

    /**
     * Possible values "ADDRESS_SERVICE_REQUESTED", "FORWARDING_SERVICE_REQUESTED", "CHANGE_SERVICE_REQUESTED", "RETURN_SERVICE_REQUESTED", "LEAVE_IF_NO_RESPONSE"
     * @var	string
     */
    protected $endorsement;

    /**
     * Additional cost to be added to the invoice of this shipment. Only applies to UPS currently.
     * @var	float
     */
    protected $freight_charge;

    /**
     * This is to designate special instructions for the carrier like "Do not drop!".
     * @var	string
     */
    protected $handling_instructions;

    /**
     * Dangerous goods indicator. Possible values are "ORMD" and "LIMITED_QUANTITY". Applies to USPS, FedEx and DHL eCommerce.
     * @var	string
     */
    protected $hazmat;

    /**
     * Package will wait at carrier facility for pickup.
     * @var	boolean
     */
    protected $hold_for_pickup;

    /**
     * This will print an invoice number on the postage label.
     * @var	string
     */
    protected $invoice_number;

    /**
     * Set the date that will appear on the postage label. Accepts ISO 8601 formatted string including time zone offset.
     * @var	string
     */
    protected $label_date;

    /**
     * Supported label formats include "PNG", "PDF", "ZPL", and "EPL2". "PNG" is the only format that allows for conversion.
     * @var	string
     */
    protected $label_format;

    /**
     * Whether or not the parcel can be processed by the carriers equipment.
     * @var	boolean
     */
    protected $machinable;

    /**
     * You can optionally print custom messages on labels. The locations of these fields show up on different spots on the carrier's labels.
     * FedEx
     *      (null) - If print_custom_1_code is not provided it defaults to Customer Reference
     *      PO - Purchase Order Number
     *      DP - Department Number
     *      RMA - Return Merchandise Authorization
     * UPS
     *      AJ - Accounts Receivable Customer Account
     *      AT - Appropriation Number
     *      BM - Bill of Lading Number
     *      9V - Collect on Delivery (COD) Number
     *      ON - Dealer Order Number
     *      DP - Department Number
     *      3Q - Food and Drug Administration (FDA) Product Code
     *      IK - Invoice Number
     *      MK - Manifest Key Number
     *      MJ - Model Number
     *      PM - Part Number
     *      PC - Production Code
     *      PO - Purchase Order Number
     *      RQ - Purchase Request Number
     *      RZ - Return Authorization Number
     *      SA - Salesperson Number
     *      SE - Serial Number
     *      ST - Store Number
     *      TN - Transaction Reference Number
     *      EI - Employer’s ID Number
     *      TJ - Federal Taxpayer ID No.
     *      SY - Social Security Number
     *
     * @var	string
     */
    protected $print_custom_1;

    /**
     * An additional message on the label. Same restrictions as print_custom_1
     * @var	string
     */
    protected $print_custom_2;

    /**
     * An additional message on the label. Same restrictions as print_custom_1
     * @var	string
     */
    protected $print_custom_3;

    /**
     * Create a barcode for this custom reference if supported by carrier.
     * @var	boolean
     */
    protected $print_custom_1_barcode;

    /**
     * Create a barcode for this custom reference if supported by carrier.
     * @var	boolean
     */
    protected $print_custom_2_barcode;

    /**
     * Create a barcode for this custom reference if supported by carrier.
     * @var	boolean
     */
    protected $print_custom_3_barcode;

    /**
     * Specify the type of print_custom_1.
     * @var	string
     */
    protected $print_custom_1_code;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->additional_handling          = AU::get($data['additional_handling']);
        $this->address_validation_level     = AU::get($data['address_validation_level']);
        $this->alcohol                      = AU::get($data['alcohol']);
        $this->bill_receiver_account        = AU::get($data['bill_receiver_account']);
        $this->bill_receiver_postal_code    = AU::get($data['bill_receiver_postal_code']);
        $this->bill_third_party_account     = AU::get($data['bill_third_party_account']);
        $this->bill_third_party_country     = AU::get($data['bill_third_party_country']);
        $this->bill_third_party_postal_code = AU::get($data['bill_third_party_postal_code']);
        $this->by_drone                     = AU::get($data['by_drone']);
        $this->carbon_neutral               = AU::get($data['carbon_neutral']);
        $this->cod_amount                   = AU::get($data['cod_amount']);
        $this->cod_method                   = AU::get($data['cod_method']);
        $this->currency                     = AU::get($data['currency']);
        $this->delivery_confirmation        = AU::get($data['delivery_confirmation']);
        $this->dry_ice                      = AU::get($data['dry_ice']);
        $this->cod_amount                   = AU::get($data['cod_amount']);
        $this->dry_ice_medical              = AU::get($data['dry_ice_medical']);
        $this->dry_ice_weight               = AU::get($data['dry_ice_weight']);
        $this->endorsement                  = AU::get($data['endorsement']);
        $this->freight_charge               = AU::get($data['freight_charge']);
        $this->hazmat                       = AU::get($data['hazmat']);
        $this->hold_for_pickup              = AU::get($data['hold_for_pickup']);
        $this->invoice_number               = AU::get($data['invoice_number']);
        $this->label_date                   = AU::get($data['label_date']);
        $this->label_format                 = AU::get($data['label_format']);
        $this->machinable                   = AU::get($data['machinable']);
        $this->print_custom_1               = AU::get($data['print_custom_1']);
        $this->print_custom_2               = AU::get($data['print_custom_2']);
        $this->print_custom_3               = AU::get($data['print_custom_3']);
        $this->print_custom_1_barcode       = AU::get($data['print_custom_1_barcode']);
        $this->print_custom_2_barcode       = AU::get($data['print_custom_2_barcode']);
        $this->print_custom_3_barcode       = AU::get($data['print_custom_3_barcode']);
        $this->print_custom_1_code          = AU::get($data['print_custom_1_code']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->simpleSerialize();
    }

}