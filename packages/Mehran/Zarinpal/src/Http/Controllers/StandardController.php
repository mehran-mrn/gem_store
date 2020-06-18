<?php

namespace Mehran\Zarinpal\Http\Controllers;

use App\iran_payment;
use Illuminate\Support\Facades\DB;
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
     * @param \Mehran\Attribute\Repositories\OrderRepository $orderRepository
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


        $gateway
            ->set($cart->grand_total*10)
            ->ready();
        //  ->setCallback(url('/path/to/callback/route')); You can also change the callback

        $refId = $gateway->refId(); // شماره ارجاع بانک
        $transID = $gateway->transactionId(); // شماره تراکنش

            $iran_payment = new iran_payment();
            $iran_payment->cart_id = $cart->id;
            $iran_payment->transaction_id = $gateway->transactionId();
            $iran_payment->save();

        return $gateway->redirect();

        } catch (\Exception $e) {

            echo $e->getMessage();
        }
        return view('Zarinpal::standard-redirect');
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
        try {

            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();


            $iran_payment = iran_payment::where('transaction_id', $gateway->transactionId())->first();
            $cart = DB::table('carts')->find($iran_payment['cart_id']);

            $order = $this->orderRepository->create($cart);

            DB::table('carts')
                ->where('id', $iran_payment['cart_id'])
                ->update(['is_active' => false]);

            session()->flash('order', $order);

            return redirect()->route('shop.checkout.success');


        } catch (\Larabookir\Gateway\Exceptions\RetryException $e) {

            echo $e->getMessage() . "<br>";

        } catch (\Exception $e) {
            // نمایش خطای بانک
            $this->cancel();
            echo $e->getMessage();
        }

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