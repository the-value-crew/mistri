<?php

use App\ServiceCategory;
use Illuminate\Support\Str;



$CURRENCY = "AED";

function point_for_refer()
{
    $data = \App\Website::first();
    $point_for_refer = $data->points_for_referrer;
    return $point_for_refer;
}

function point_for_refer_code_user()
{
    $data = \App\Website::first();
    $point_for_user_through_referral = $data->points_for_refercode_user;
    return $point_for_user_through_referral;
}

function count_nonnull_field($a)
{
    $total = 0;
    foreach ($a as $elt) {
        if (!is_null($elt)) {
            $total++;
        }
    }
    return $total;
}


function cities()
{
    return  \App\City::where('name', '!=', null)->get();
}

function services()
{
    return \App\Service::latest()->get();
}

function serviceCategories()
{
    return \App\ServiceCategory::latest()->get();
}

function isFormExist($service_id)
{
    $service = \App\Service::find($service_id);
    $c = count($service->text_fields) + count($service->textarea_fields) + count($service->date_fields) + count($service->time_fields) + count($service->check_with_charge_fields) + count($service->check_fields) + count($service->radio_with_charge_fields) + count($service->radio_fields) + count($service->select_with_charge_fields) + count($service->select_fields);

    if ($c > 0 || $service->id == 72 || $service->id == 84 || $service->id == 85 || $service->id == 86) {
        return true;
    }

    return false;
}


function isProviderAvailable($service_id)
{
    $service = \App\Service::find($service_id);

    $count = 0;
    foreach ($service->users as $user) {
        if (isPriceForServiceDefined($user->id, $service_id)) {
            $count = $count + 1;
        }
    }

    /**
     *  Check if price is defined by service provider or not
     *
     * If service is static then it will show static form
     *
     *  72 = Id of pest control ( It is static service )
     */

    if ($count >= 0 || $service->id == 72) {
        return true;
    }
    return false;
}

function isPriceForServiceDefined($provider_id, $service_id)
{

    if ($service_id == 72 || $service_id == 84 || $service_id == 85 || $service_id == 86) {
        return true;
    }


    /**  pro_id = 100 , service_id = 46 */
    $count_check = 0;
    $count_radio = 0;
    $count_select = 0;
    $service = \App\Service::with(['check_with_charge_fields', 'radio_with_charge_fields', 'select_with_charge_fields'])->find($service_id);




    //----- Service check option ----------------->
    if (count($service->check_with_charge_fields) > 0) {
        foreach ($service['check_with_charge_fields'] as $charge_field) {

            $data = \App\VendorCheckFieldCharge::where('field_id', $charge_field->id)->where('service_provider_id', $provider_id)->get();

            if (count($data) > 0) {
                $count_check = $count_check + 1;
            }
        }
    }

    if (count($service->check_with_charge_fields) > 0) {
        if ($count_check == 0) {
            return false;
        }
    }
    //----- // Service check option ----------------->


    //    ----- Service radio option ----------------->
    if (count($service->radio_with_charge_fields) > 0) {
        foreach ($service['radio_with_charge_fields'] as $radio_with_charge_field) {

            $data2 = \App\VendorRadioFieldCharge::where('field_id', $radio_with_charge_field->id)->where('service_provider_id', $provider_id)->get();
            if (count($data2) > 0) {
                $count_radio = $count_radio + 1;
            }
        }
    }

    if (count($service->radio_with_charge_fields) > 0) {
        if ($count_radio == 0) {
            return false;
        }
    }


    //    ----- // Service radio option --------------->


    //    ----- Service select option ----------------->

    if (count($service->select_with_charge_fields) > 0) {
        foreach ($service['select_with_charge_fields'] as $select_with_charge_field) {
            $data3 = \App\VendorSelectFieldCharge::where('field_id', $select_with_charge_field->id)->where('service_provider_id', $provider_id)->get();
            if (count($data3) > 0) {
                $count_select = $count_select + 1;
            }
        }
    }

    if (count($service->select_with_charge_fields) > 0) {
        if ($count_select == 0) {
            return false;
        }
    }



    //    ----- // Service select option ----------------->

    $count = $count_check + $count_radio + $count_select;



    //    if(($count>0 || $service_id == 72) && $service->quotable == 0){
    //    if($count>0 || $service_id == 72 || $service_id == 84 ||$service_id == 85 || $service_id == 86){
    //        return true;
    //    }
    return true;
}
/**
 * Converts null values of the array to empty string
 *
 * @param array $array
 * @param array $exceptKeys
 *
 * @return array
 */
function nullToEmptyStringOfArray(array $array, array $exceptKeys = []): array
{
    array_walk_recursive($array, function (&$val, $key) use ($exceptKeys) {
        if (!in_array($key, $exceptKeys)) {
            $val = $val ?? '';
        }
    });

    return $array;
}

/**
 * Change keys of an array to camel case
 *
 * @param array $array
 *
 * @return array
 */
function makeKeyCamelCased(array $array)
{
    $returnData = [];
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = makeKeyCamelCased($value);
        }
        $returnData[Str::camel($key)] = $value;
    }

    return $returnData;
}



function totalServiceCharge($order_id)
{
    $order = \App\Order::find($order_id);
    $total_radio = 0;
    $total_select = 0;
    $c = 0;

    if ($order->service->id == 72) {

        return pestControlCharge($order);
    }


    //    if(count($order->service->service_check_options)>0){
    //        $checkfieldValueByOrders = \App\CheckFieldValue::where('order_id',$order->id)->get();
    //
    //        foreach($order->service->service_check_options as $service_check_option){
    //            foreach($service_check_option->options as$key=> $op)
    //            {
    //                foreach($checkfieldValueByOrders as $checkfieldValueByOrder){
    //                    if($checkfieldValueByOrder->value == $op->id){
    //                        $a = $op->charge;
    //                    }
    //                }
    //
    //            }
    //
    //        }
    //    }

    //    if(count($order->service->radio_fields)>0){
    //        $radiofieldValueByOrders = \App\RadioFieldValue::where('order_id',$order->id)->get();
    //        foreach($order->service->radio_fields as $radio_field){
    //            foreach($radio_field->options as$key=> $op){
    //                foreach($radiofieldValueByOrders as $radiofieldValueByOrder){
    //                    if($radiofieldValueByOrder->value == $op->id){
    //                        $b = $op->charge;
    //                    }
    //                }
    //            }
    //        }
    //    }

    if (count($order->service->radio_with_charge_fields) > 0) {

        foreach ($order->service->radio_with_charge_fields as $radio_with_charge_field) {
            $data_radio = \App\RadioWithChargeValue::where('order_id', $order->id)->where('field_id', $radio_with_charge_field->id)->first();
            $data_value = \App\VendorRadioFieldCharge::where('service_provider_id', $order->provider_id)->where('field_id', $radio_with_charge_field->id)->where('option_id', $data_radio->radio_options->id)->first();

            $total_radio = $total_radio + ($data_value->charge * $data_radio->qty);
        }
    }

    if (count($order->service->select_with_charge_fields) > 0) {
        foreach ($order->service->select_with_charge_fields as $select_with_charge_field) {

            $data_select = \App\SelectWithChargeValue::where('order_id', $order->id)->where('field_id', $select_with_charge_field->id)->first();
            $data_value_select = \App\VendorSelectFieldCharge::where('service_provider_id', $order->provider_id)->where('field_id', $select_with_charge_field->id)->where('option_id', $data_select->select_options->id)->first();
            $total_select = $total_select + ($data_value_select->charge * $data_select->qty);
        }
    }



    $total = $total_radio + $total_select;
    return $total;
}

/**
    Find  service charge for pest control
 */

function pestControlCharge($order)
{
    $service_provider = $order->provider_id;
    $pest_order = \App\PestControlOrder::where('order_id', $order->id)->first();

    $home_size = $pest_order->home_size;


    $charge = 0;

    if ($pest_order->premises_type == 'Residential') {
        if ($pest_order->home_type == 'Apartment') {
            foreach (json_decode($pest_order->treatment_for) as $item) {
                $apartment_charge = \App\VendorResidentialPC::where(['vendor_id' => $service_provider, 'home_type' => 'Apartment', 'treatment_type_id' => $item])->first();
                if ($apartment_charge) {
                    $charge = $charge + $apartment_charge->$home_size;
                } else {

                    $admin_apartment_charge = \App\ResidentialPestControl::where(['home_type' => 'Apartment', 'pest_control_treatment_type_id' => $item])->first();
                    $charge = $charge + $admin_apartment_charge->$home_size;
                }
            }
            return $charge;
        } else {

            foreach (json_decode($pest_order->treatment_for) as $item) {
                $apartment_charge = \App\VendorResidentialPC::where(['vendor_id' => $service_provider, 'home_type' => 'Villa', 'treatment_type_id' => $item])->first();
                if ($apartment_charge) {
                    $charge = $charge + $apartment_charge->$home_size;
                } else {

                    $admin_apartment_charge = \App\ResidentialPestControl::where(['home_type' => 'Villa', 'pest_control_treatment_type_id' => $item])->first();
                    $charge = $charge + $admin_apartment_charge->$home_size;
                }
            }
            return $charge;
        }
    } else {

        $office_size = $pest_order->office_size;
        $size = '';
        if ($office_size > 0 && $office_size <= 500) {
            $size = 'home_size1';
        } elseif ($office_size > 500 && $office_size <= 1000) {
            $size = 'home_size2';
        } elseif ($office_size > 1000 && $office_size <= 1500) {
            $size = 'home_size3';
        } elseif ($office_size > 1500 && $office_size <= 2000) {
            $size = 'home_size4';
        }


        foreach (json_decode($pest_order->treatment_for) as $item) {

            $officecharge = \App\VendorOfficePC::where(['vendor_id' => $service_provider, 'treatment_type_id' => $item])->first();
            if ($officecharge) {
                $charge = $charge + $officecharge->$size;
            } else {

                $admin_office_charge = \App\OfficePestControl::where(['pest_control_treatment_type_id' => $item])->first();
                $charge = $charge + $admin_office_charge->$size;
            }
        }

        return $charge;
    }
}


function getPestControlTreatmentCharge($order, $treatment_id)
{

    $service_provider = $order->provider_id;
    $pest_order = \App\PestControlOrder::where('order_id', $order->id)->first();

    $home_size = $pest_order->home_size;




    if ($pest_order->premises_type == 'Residential') {
        if ($pest_order->home_type == 'Apartment') {

            $apartment_charge = \App\VendorResidentialPC::where(['vendor_id' => $service_provider, 'home_type' => 'Apartment', 'treatment_type_id' => $treatment_id])->first();
            if ($apartment_charge) {
                return $apartment_charge->$home_size;
            } else {

                $admin_apartment_charge = \App\ResidentialPestControl::where(['home_type' => 'Apartment', 'pest_control_treatment_type_id' => $treatment_id])->first();
                return $admin_apartment_charge->$home_size;
            }
        } else {

            $apartment_charge = \App\VendorResidentialPC::where(['vendor_id' => $service_provider, 'home_type' => 'Villa', 'treatment_type_id' => $treatment_id])->first();
            if ($apartment_charge) {
                return $apartment_charge->$home_size;
            } else {

                $admin_apartment_charge = \App\ResidentialPestControl::where(['home_type' => 'Villa', 'pest_control_treatment_type_id' => $treatment_id])->first();
                return $admin_apartment_charge->$home_size;
            }
        }
    } else {

        $office_size = $pest_order->office_size;
        $size = '';
        if ($office_size > 0 && $office_size <= 500) {
            $size = 'home_size1';
        } elseif ($office_size > 500 && $office_size <= 1000) {
            $size = 'home_size2';
        } elseif ($office_size > 1000 && $office_size <= 1500) {
            $size = 'home_size3';
        } elseif ($office_size > 1500 && $office_size <= 2000) {
            $size = 'home_size4';
        }


        $officecharge = \App\VendorOfficePC::where(['vendor_id' => $service_provider, 'treatment_type_id' => $treatment_id])->first();
        if ($officecharge) {
            return $officecharge->$size;
        } else {

            $admin_office_charge = \App\OfficePestControl::where(['pest_control_treatment_type_id' => $treatment_id])->first();
            return $admin_office_charge->$size;
        }
    }
}

/**
 *  Find value of text field of service of Order
 */

function textFieldValue($order_id, $field_id)
{
    $data = \App\TextValue::where('order_id', $order_id)->where('field_id', $field_id)->first();

    return $data->value;
}

/**
 *  Find value of textarea field of service of order
 */

function textareaFieldValue($order_id, $field_id)
{
    $data = \App\TextareaValue::where('order_id', $order_id)->where('field_id', $field_id)->first();

    return $data->value;
}


/**
 *  Find value of date field value of service of order
 */

function dateFieldValue($order_id, $field_id)
{
    $data = \App\DateValue::where('order_id', $order_id)->where('field_id', $field_id)->first();
    return $data->value;
}

/**
 *  Find value of time of service for order
 */

function timeFieldValue($order_id, $field_id)
{
    $option = \App\TimeValue::where('order_id', $order_id)->where('field_id', $field_id)->first()->option_id;
    $value = \App\TimeFieldOption::find($option)->time;
    return $value;
}

/**
 *Find radio  with charge field of service for order
 */

function radioWithChargeValue($order_id, $field_id, $provider_id)
{
    $option_id = \App\RadioWithChargeValue::where('order_id', $order_id)->where('field_id', $field_id)->first()->option_id;
    $charge = \App\VendorRadioFieldCharge::where('service_provider_id', $provider_id)->where('field_id', $field_id)->where('option_id', $option_id)->first()->charge;
    return $charge;
}

/**
 *   Find radio  field of service for order
 */

function radioValue($order_id, $field_id)
{
    $option_id = \App\RadioValue::where('order_id', $order_id)->where('field_id', $field_id)->first()->radio_option;
    return $option_id->option;
}

/**
 *  Select with charge value
 */

function selectWithChargeValue($order_id, $field_id, $provider_id)
{
    $option_id = \App\SelectWithChargeValue::where('order_id', $order_id)->where('field_id', $field_id)->first()->option_id;
    $charge = \App\VendorSelectFieldCharge::where('service_provider_id', $provider_id)->where('field_id', $field_id)->where('option_id', $option_id)->first()->charge;
    return $charge;
}

/**
 *  Select with out charge value
 */

function selectValue($order_id, $field_id)
{
    $option_id = \App\SelectValue::where('order_id', $order_id)->where('field_id', $field_id)->first()->select_option;
    return $option_id->option;
}

/**
 * Min service charge
 */
function minServiceCharge($service_id, $provider_id)
{
    $min_charge = \App\UserService::where('user_id', $provider_id)->where('service_id', $service_id)->first()->vendor_min_service_charge;
    return $min_charge;
}

function getVendorServiceToDisplayAtHome($vendor_id)
{
    //        $data = \App\UserService::where('user_id',$vendor_id)->where('state','approved')->first();
    $data = \App\UserService::where('user_id', $vendor_id)->where('state', 'approved')->first();
    $service = \App\Service::find($data->service_id);
    return $service;
}

/**
 *  Total service charge for
 */

function totalBillAmount($order_id, $service_id, $provider_id)
{
    $order = \App\Order::find($order_id);
    $min_charge = minServiceCharge($service_id, $provider_id);

    /**
     *  Radio field charge  value
     */
    $radio_charge = 0;
    $select_charge = 0;

    foreach ($order->service->radio_with_charge_fields as $radio_with_charge_field) {
        $radio_charge = $radio_charge + radioWithChargeValue($order_id, $radio_with_charge_field->id, $order->provider_id);
    }

    foreach ($order->service->select_with_charge_fields as $select_with_charge_field) {
        $select_charge = $select_charge + selectWithChargeValue($order_id, $select_with_charge_field->id, $order->provider_id);
    }

    $total = $radio_charge + $select_charge + $min_charge;
    return $total;
}
