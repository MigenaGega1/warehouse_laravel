@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-[#406d94]">
                <a href="/dashboard" class="flex items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
                    </svg>
                </a>
                <h2 class="text-center text-2xl font-serif text-lg-center ">Create Product</h2>
            </div>
            <div class="card-body shadow shadow-md shadow-black">
                <form action="/products" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="table table-bordered " id="product-table">
                        <tr class="text-base">
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="fields[0][name]" placeholder="Enter name"
                                    class="form-control" /></td>
                            <td><input type="number" name="fields[0][price]" placeholder="Enter price"
                                    class="form-control" /></td>
                            <td><input type="number" name="fields[0][stock]" placeholder="Enter stock"
                                    class="form-control" /></td>
                            <td><button type="button" name="add" id="add-newRow" class="btn bg-green-600 rounded">Add
                                    Anothor Product</button></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn bg-green-600 rounded">Save product</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var i = 0;

        $("#add-newRow").click(function() {
            ++i;
            $("#product-table").append('<tr><td><input type="text" name="fields[' + i +
                '][name]" placeholder="Enter name" class="form-control" /></td><td><input type="number" name="fields[' +
                i +
                '][price]" placeholder="Enter price" class="form-control" /></td><td><input type="number" name="fields[' +
                i +
                '][stock]" placeholder="Enter stock" class="form-control" /></td><td><button type="button" class="btn bg-red-600 remove-tr">Remove</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
