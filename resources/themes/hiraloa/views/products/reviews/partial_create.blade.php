<form method="POST" class="form-horizontal"
      action="{{ route('shop.reviews.store', $product->product_id ) }}"
      @submit.prevent="onSubmit"
      id="form-review">
    @csrf


    <h2>{{ __('shop::app.reviews.write-review') }}</h2>

    <div class="form-group ">
        <div class="col-sm-12 p-0">
            <label>{{ __('shop::app.reviews.title') }} <span class="required">*</span></label>
            <input value="{{ old('title') }}" class="review-input" type="text" name="title" id="con_email" required>
        </div>
    </div>

        <div class="form-group required">
            <div class="col-sm-12 p-0">
                <label>{{ __('shop::app.reviews.name') }} <span class="required">*</span></label>
                <input value="{{ old('name') }}" class="review-input" type="text" name="name" id="con_email" required>
            </div>
        </div>

    <div class="form-group required second-child">
        <div class="col-sm-12 p-0">
            <label class="control-label">{{ __('admin::app.customers.reviews.comment') }}</label>
            <textarea class="review-textarea" name="comment" id="con_message">{{ old('comment') }}</textarea>

        </div>
    </div>


    <div class="form-group last-child required">
        <div class="col-sm-12 p-0">
            <div class="your-opinion">
                <label>{{ __('admin::app.customers.reviews.rating') }}</label>
                <span>
                                                        <select name="rating" class="star-rating">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </span>
            </div>
        </div>
        <div class="hiraola-btn-ps_right">
            <button type="submit"  class="hiraola-btn hiraola-btn_dark">{{ __('shop::app.reviews.submit') }}</button>
        </div>
    </div>
</form>
