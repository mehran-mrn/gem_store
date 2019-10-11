<?php

namespace Mehran\Zarinpal\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Mehran\Zarinpal\Helpers\Ipn;

/**
 * Zarinpal Standard controller
 *
 * @author    Jitendra Singh <jitendra@Mehran.com>
 * @copyright 2018 Mehran Software Pvt Ltd (http://www.Mehran.com)
 */
class StandardController extends Controller
{
    /**
     * OrderRepository object
     *
     * @var array
     */
    protected $orderRepository;

    /**
     * Ipn object
     *
     * @var array
     */
    protected $ipnHelper;

    /**
     * Create a new controller instance.
     *
     * @param  \Mehran\Attribute\Repositories\OrderRepository  $orderRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        Ipn $ipnHelper
    )
    {
        $this->orderRepository = $orderRepository;

        $this->ipnHelper = $ipnHelper;
    }

    /**
     * Redirects to the Zarinpal.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        $cart = Cart::getCart();

        try {

            $gateway = \Gateway::Zarinpal();


            // $gateway->setCallback(url('/path/to/callback/route')); You can also change the callback
            $gateway
                ->price($cart->grand_total)
                // setShipmentPrice(10) // optional - just for paypal
                // setProductName("My Product") // optional - just for paypal
                ->ready();
            $refId =  $gateway->refId(); // شماره ارجاع بانک
            $transID = $gateway->transactionId(); // شماره تراکنش

            // در اینجا
            //  شماره تراکنش  بانک را با توجه به نوع ساختار دیتابیس تان
            //  در جداول مورد نیاز و بسته به نیاز سیستم تان
            // ذخیره کنید .
            return $gateway->redirect();

        } catch (\Exception $e) {

            echo $e->getMessage();
        }
        //return view('Zarinpal::standard-redirect');
    }

    /**
     * Cancel payment from Zarinpal.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        session()->flash('error', 'Zarinpal payment has been canceled.');

        return redirect()->route('shop.checkout.cart.index');
    }

    /**
     * Success payment
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        Cart::deActivateCart();

        session()->flash('order', $order);

        return redirect()->route('shop.checkout.success');
    }

    /**
     * Zarinpal Ipn listener
     *
     * @return \Illuminate\Http\Response
     */
    public function ipn()
    {
        $this->ipnHelper->processIpn(request()->all());
    }
}