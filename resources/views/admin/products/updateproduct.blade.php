@extends('layouts.app')

@section('content')


<div class="container">
    <div class="card mt-3">
    <div class="card-header bg-[#406d94]  ">
        <a href="/products" class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
            </svg>
             </a>
        <h2 class="text-center text-2xl font-serif text-lg-center">Edit Product</h2></div>
    <div class="card-body shadow shadow-md shadow-black">
        <form method="POST" action="/products/{{$product->id}}">
            @csrf
            @method('PUT')


    <table class="table " >
    <tr class="text-base">
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>

    </tr>
    <tr>
    <td>  <input type="text" name="name" id="name"  value="{{$product->name}}" class="block   py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >

        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror</td>
    <td><input type="number" name="price" id="price" value="{{$product->price}}" class="block border-b-2 border-gray-600  py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >

        @error('price')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror</td>
    <td>    <input type="number" name="stock" id="stock" value="{{$product->stock}}" class="block  border-b-2 border-gray-600  py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >


        @error('stock')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror</td>

    </tr>
    </table>
    <button type="submit" class="btn bg-green-600 rounded">Update</button>
    </form>
    </div>
    </div>
    </div>

@endsection

