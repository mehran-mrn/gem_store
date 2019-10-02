@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

@auth('customer')
    {!! view_render_event('bagisto.shop.products.wishlist.before') !!}
    <a class="hiraola-add_compare text-danger" href="{{ route('customer.wishlist.add', $product->product_id) }}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                class="{{$wishListHelper->getWishlistProduct($product)?"ion-android-favorite":"ion-android-favorite-outline"}} "></i></a>
    {!! view_render_event('bagisto.shop.products.wishlist.after') !!}
@endauth
