<?php

namespace Mehran\Zarinpal\Payment;

use Illuminate\Support\Facades\Config;
use Webkul\Payment\Payment\Payment ;

/**
 * Zarinpal class
 *
 * @author    Jitendra Singh <jitendra@Mehran.com>
 * @copyright 2018 Mehran Software Pvt Ltd (http://www.Mehran.com)
 */
abstract class Zarinpal extends payment
{
    /**
     * Zarinpal web URL generic getter
     *
     * @param array $params
     * @return string
     */
    public function getZarinpalUrl($params = [])
    {
        return sprintf('aaa',
                $this->getConfigData('sandbox') ? 'sandbox.' : '',
                $params ? '?' . http_build_query($params) : ''
            );
    }

    /**
     * Add order item fields
     *
     * @param array $fields
     * @param int $i
     * @return void
     */
    protected function addLineItemsFields(&$fields, $i = 1)
    {
        $cartItems = $this->getCartItems();

        foreach ($cartItems as $item) {

            foreach ($this->itemFieldsFormat as $modelField => $ZarinpalField) {
                $fields[sprintf($ZarinpalField, $i)] = $item->{$modelField};
            }

            $i++;
        }
    }

    /**
     * Add billing address fields
     *
     * @param array $fields
     * @return void
     */
    protected function addAddressFields(&$fields)
    {
        $cart = $this->getCart();

        $billingAddress = $cart->billing_address;

        $fields = array_merge($fields, [
            'city'             => $billingAddress->city,
            'country'          => $billingAddress->country,
            'email'            => $billingAddress->email,
            'first_name'       => $billingAddress->first_name,
            'last_name'        => $billingAddress->last_name,
            'zip'              => $billingAddress->postcode,
            'state'            => $billingAddress->state,
            'address1'         => $billingAddress->address1,
            'address_override' => 1
        ]);
    }

    /**
     * Checks if line items enabled or not
     *
     * @param array $fields
     * @return void
     */
    public function getIsLineItemsEnabled()
    {
        return true;
    }
}