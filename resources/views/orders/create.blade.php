@extends('layouts.app')

@section('header')
    <h1>Orders</h1>
@endsection

@section('content')
    <div class="auth-shell">
        <div class="card auth-card">
            <div class="auth-header">
                <h1 class="auth-title text-center">Create order</h1>
            </div>

            <form method="POST" action="{{ route('cart.add') }}" class="auth-form">
                @csrf
                @method('PATCH')

                <div class="grid grid-2">

                    <div class="form-group grid grid-3">
                        <label for="product" class="form-label">Product</label>
                        <select name="product_id" id="product" class="form-control span-2">
                            <option value="">Select product</option>
                            @foreach ($products as $product)
                                <option
                                    value="{{ $product->id }}"
                                    data-image="{{ $product->image_path }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-unit="{{ $product->unit }}"
                                >
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="quantity" class="form-label">Quantity</label>
                        <input name="quantity" id="quantity" class="form-input span-2" value="1">

                        <label for="total" class="form-label">Subtotal</label>
                        <input readonly name="total" id="total" class="form-input span-2" value="">

                        <button id="add-to-cart" style="display: none" type="submit" class="button span-3">Add to Cart</button>

                    </div>
                    <div class="form-group justify-center" id="product-image-div">

                    </div>

                </div>


            </form>
        </div>
        @include('cart.popup')
    </div>
@endsection

@section('scripts')
    <script>

        $('#product').on('change', function () {

            $('#quantity').val(1);
            $('#add-to-cart').hide();
            let selected = $(this).find(':selected');
            let productId = $(this).val();

            if (!productId) {
                $('#product-image-div').html('');
                return;
            }

            let image = selected.data('image');
            let name = selected.data('name');
            let price = selected.data('price');
            let unit = selected.data('unit');

            $('#product-image-div').html(`
        <div class="text-center">
            <img src="/storage/${image}" style="max-width:200px;">
            <div class="mt-2">
                <strong>${name}</strong><br>
                R${price} / ${unit}
            </div>
        </div>
    `);

        });

        $('#product').trigger('change');

        function updateTotal() {

            let quantity = parseInt($('#quantity').val());

            if (!quantity || quantity <= 0) {
                quantity = 1;
                $('#quantity').val(1);
            }

            let selected = $('#product').find(':selected');
            let price = selected.data('price');

            if (!price) {
                $('#total').val('');
                return;
            }

            let total = quantity * price;

            $('#total').val("R " + total.toFixed(2));
            if(total > 0){
                $('#add-to-cart').show();
            } else{
                $('#add-to-cart').hide();
            }
        }

        $('#quantity').on('input', updateTotal);
        $('#product').on('change', updateTotal);

        $('#add-to-cart').on('click', function (e) {

            e.preventDefault();

            $.ajax({

                dataType: 'json',
                type: 'POST',
                url: "{{ route('cart.add') }}",

                data: {
                    product_id: $("#product").val(),
                    quantity: $("#quantity").val()
                },

                beforeSend: function () {
                    startLoader();
                },

                success: function (result) {

                    // store result if needed
                    window.cartResult = result;
                    stopLoader(() => {
                        showCartPopup();
                    });

                },

                complete: function () {

                },

                error: function (xhr, textStatus, errorThrown) {
                    console.log(xhr);
                    console.log(textStatus);
                    console.log(errorThrown);
                }

            });

        });

    </script>
@endsection
