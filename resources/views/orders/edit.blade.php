@extends('layouts.app')
@section('content')
    <div class="card">


        <div class="card-body">
            <form action="/orders/{{ $order->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-10  border-b border-gray-200 shadow ">
                    <div class="row ">
                        <div class="px-20 h-20 mb-4 w-[800px] ml-20 text-black">
                            <select style="height: 200" id="nameid" name='client_id'
                                class="form-control h-8  text-black font-semibold">
                                <option value="{{$order->client->id}}">{{ $order->client->first_name }} {{ $order->client->last_name }}
                                    {{ $order->client->email }}</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->first_name }}
                                        {{ $client->last_name }} {{ $client->email }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-12">
                        <label class="m-4 text-gray-500 font-bold" for="select">Update order status</label>
                        <select  id="select"  name="status"class="form-select  mb-4">
                            @foreach (config('app-status.app-status') as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                        @error('ststus')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Products
                        </div>

                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (old('products', $order->products->count() ? $order->products : ['']) as $order_product)
                                        <tr id="product{{ $loop->index }}">
                                            <td>
                                                <select name="products[]" class="form-control product-input">
                                                    <option value="">choose here product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            data-price="{{ $product->price }}"
                                                            @if (old('products.' . $loop->parent->index, optional($order_product)->id) == $product->id) selected @endif>
                                                            {{ $product->name }}
                                                            (${{$product->price }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="quantities[]" class="form-control number-input"
                                                    value="{{ old('quantities.' . $loop->index) ?? (optional(optional($order_product)->pivot)->quantity ?? '1') }}" />
                                            </td>
                                            <td>
                                                <span type="number" name="amount[]" class="form-control amount-holder"
                                                    value="{{ $order_product->price * $order_product->pivot->quantity }}">{{ $order_product->price * $order_product->pivot->quantity }}</span>
                                            </td>



                                        </tr>
                                    @endforeach
                                    <tr
                                        id="product{{ count(old('products', $order->products->count() ? $order->products : [''])) }}">
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="p-2">update</button>
            </form>


        </div>
    </div>
@endsection







































@section('scripts')
    <script>
        $(document).ready(function() {
            $('.number-input').blur(function(e) {
                let _this = $(this);
                let row = _this.closest('tr');
                let quantity = _this.val();
                alert(quantity);
                let price = row.find('.product-input option:selected').data('price');
                let totalAmount = (+quantity) * (+price);
                row.find('.amount-holder').text(totalAmount);
            });

            $('.product-input').on('change', function() {
                let _this = $(this);
                let row = _this.closest('tr');
                let price = row.find('.product-input option:selected').data('price');

                let quantity = row.find('.number-input').val();
                let totalAmount = (+quantity) * (+price);
                row.find('.amount-holder').text(totalAmount);
            });



            let row_number = {{ count(old('products', $order->products->count() ? $order->products : [''])) }};
            $("#add_row").click(function(e) {
                e.preventDefault();
                let new_row_number = row_number - 1;
                $('#product' + row_number).html($('#product' + new_row_number).html()).find(
                    'td:first-child');
                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                row_number++;
                $('.number-input').blur(function(e) {
                    let _this = $(this);
                    let row = _this.closest('tr');
                    let quantity = _this.val();
                    alert(quantity);
                    let price = row.find('.product-input option:selected').data('price');
                    let totalAmount = (+quantity) * (+price);
                    row.find('.amount-holder').text(totalAmount);
                });

                $('.product-input').on('change', function() {
                    let _this = $(this);
                    let row = _this.closest('tr');
                    let price = row.find('.product-input option:selected').data('price');

                    let quantity = row.find('.number-input').val();
                    let totalAmount = (+quantity) * (+price);
                    row.find('.amount-holder').text(totalAmount);
                });
            });



            $("#delete_row").click(function(e) {
                e.preventDefault();
                if (row_number > 1) {
                    $("#product" + (row_number - 1)).html('');
                    row_number--;
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $("#nameid").select2({
            placeholder: "Select client name",
            allowClear: true
        });
    </script>
@endsection
