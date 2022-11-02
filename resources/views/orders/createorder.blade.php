@extends('layouts.app')

@section('content')
    <style>
        .dataTables_filter {
            display: none;
        }
    </style>

    </head>


    <body>
        <div class="container mx-auto mt-10">
            <div class="flex flex-col">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="/orders" method="POST" enctype="multipart/form-data" name="myform">
                            @csrf
                            <div class="p-10  border-b border-gray-200 shadow ">
                                <div class="row ">
                                    <div class="px-20 h-20 mb-4 w-[800px] ml-20 text-black">
                                        <select style="height: 200" id="nameid" name='client_id'
                                            class="form-control h-8  text-black font-semibold">
                                            <option></option>
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
                                            <tr id="product0">
                                                <td>
                                                    <select name="products[]" class="form-control product-input  font-bold">
                                                        <option value="">choose here product</option>
                                                        @foreach ($products as $product)
                                                            <option class="font-bold" data-price="{{ $product->price }}"
                                                                value="{{ $product->id }}">
                                                                {{ $product->name }} ( {{ $product->price }} $)

                                                            </option>
                                                            <span>{{ $product->stock }} available </span>
                                                        @endforeach
                                                    </select>
                                                    @error('products[]')
                                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" name="quantities[]" min="1"
                                                        class="form-control number-input" value="1" />
                                                </td>
                                                <td><input type="number" name="amount[]" placeholder="Amount"
                                                      class="form-control amount-holder"/> </td>
                                            </tr>
                                            <tr id="product1"></tr>
                                        </tbody>    <div>
                                    <input type="number" name="total" class=" form-control total-amount" placeholder="Total Amount" />
                                </div>
                                    </table>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>



                                <div class="flex flex-row">
                                    <button class="p-2 rounded bg-green-500 mt-4" type="submit"> Submit your Order</button>

                                </div>

                        </form>
                    </div>
                </div>
    </body>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.number-input').blur(function(e) {
                let _this = $(this);
                let row = _this.closest('tr');
                let quantity = _this.val();

                let price = row.find('.product-input option:selected').data('price');
                let totalAmount = (+quantity) * (+price);
                row.find('.amount-holder').val(totalAmount);
                var values = $("input[name='amount[]']")
                .map(function() {
                    return $(this).val();
                }).get();
            let total = 0;
            values.forEach(value => {
                total += (+value);
                $('.total-amount').val(total);
            });



            });

            $('.product-input').on('change', function() {
                let _this = $(this);
                let row = _this.closest('tr');
                let price = row.find('.product-input option:selected').data('price');

                let quantity = row.find('.number-input').val();
                let totalAmount = (+quantity) * (+price);

                row.find('.amount-holder').val(totalAmount);
                var values = $("input[name='amount[]']")
                .map(function() {
                    return $(this).val();
                }).get();
            let total = 0;
            values.forEach(value => {
                total += (+value);
                $('.total-amount').val(total);
            });

            });
            let row_number = 1;












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

                    let price = row.find('.product-input option:selected').data('price');
                    let totalAmount = (+quantity) * (+price);
                    row.find('.amount-holder').val(totalAmount);
                    var values = $("input[name='amount[]']")
                .map(function() {
                    return $(this).val();
                }).get();
            let total = 0;
            values.forEach(value => {
                total += (+value);
                $('.total-amount').val(total);
            });


                });

                $('.product-input').on('change', function() {
                    let _this = $(this);
                    let row = _this.closest('tr');
                    let price = row.find('.product-input option:selected').data('price');

                    let quantity = row.find('.number-input').val();
                    let totalAmount = (+quantity) * (+price);
                    row.find('.amount-holder').val(totalAmount);
                    var values = $("input[name='amount[]']")
                .map(function() {
                    return $(this).val();
                }).get();
            let total = 0;
            values.forEach(value => {
                total += (+value);
                $('.total-amount').val(total);
            });
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


        //     $(document).on('click', '.remove-tr', function() {
        //         $(this).parents('tr').remove();
        //     });
        // });
    </script>














    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $("#nameid").select2({
            placeholder: "Select client name",
            allowClear: true
        });
    </script>

    <script>
        $(document).ready(function() {




        });
    </script>
@endsection
