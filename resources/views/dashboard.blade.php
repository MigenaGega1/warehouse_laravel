@extends('layouts.app')

@section('content')


@can('isAdmin')

<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
      <!-- NAV -->
      <nav class="absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
        <div class="flex flex-col justify-between h-full">
          <div class="p-4">
            <!-- LOGO -->


            <div class="border-gray-700 py-5 text-white border-b rounded">
              <div class="relative">
              </div>
           <h1 class="block py-2.5 px-4 flex items-center uppercase text-xl space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">{{ Auth::user()->role }}</h1>
            </div>
            <!-- NAV LINKS -->
            <div class="py-4 text-gray-400 space-y-1">
              <!-- BASIC LINK -->
              <a href="/dashboard" class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Dashboard</span>
              </a>
              <!-- DROPDOWN LINK -->
              <div class="block" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                  <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                    <span>Users</span>
                  </div>
                  <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                  </svg>
                  <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
                <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                  <a href="/users" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                  Users
                  </a>
                  <a href="/users/create" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                 Create New User
                  </a>

                </div>
              </div>
              <div class="block mt-4" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                  <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                      </svg>

                    <span>Clients</span>
                  </div>
                  <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                  </svg>
                  <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
                <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                  <a href="/clients" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                  All Clients
                  </a>
                  <a href="/clients/create" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                 New Client
                  </a>

                </div>
              </div>
              <div class="block mt-4" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                  <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span>Products</span>
                  </div>
                  <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                  </svg>
                  <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
                <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                  <a href="/products" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                 All Products
                  </a>
                  <a href="/products/create" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                 Create New Product
                  </a>

                </div>
              </div>
              <div class="block mt-4" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                  <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                      </svg>
                    <span>Orders</span>
                  </div>
                  <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                  </svg>
                  <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
                <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                  <a href="/orders" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                  All Orders
                  </a>
                  <a href="/orders/create" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                 New Order
                  </a>

                </div>
              </div>
            </div>
          </div>

          <div class="text-gray-200 border-gray-800 rounded flex items-center justify-between p-2">
            <div class="flex items-center space-x-2">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

              <h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            </div>

          </div>
        </div>
      </nav>
      <!-- END OF NAV -->
      <!-- PAGE CONTENT -->
      <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
        <div class="md:hidden justify-between items-center bg-black text-white flex">
          <h1 class="text-2xl font-bold px-4">WareHouse</h1>
          <button @click="navOpen = !navOpen" class="btn p-4 focus:outline-none hover:bg-gray-800">
            <svg class="w-6 h-6 fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
        </div>
        <section class="max-w-7xl mx-auto py-4 px-5">
          <div class="flex justify-between items-center border-b border-gray-300">
            <h1 class="text-2xl font-semibold pt-2 pb-6">Dashboard</h1>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">
            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                <div class="space-y-2">
                    <p class="text-base text-gray-400 uppercase">Users</p>
                    <div class="flex items-center space-x-2">
                      <h1 class="text-xl font-semibold">{{count(App\Models\User::all())}}</h1>
                      <p class="text-base bg-green-50 text-green-500 px-1 rounded"></p>
                    </div>
                  </div>
                  <svg  class="w-12 h-12 text-gray-300"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
            </div>
            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
              <div class="space-y-2">
                <p class="text-base text-gray-400 uppercase">Clients</p>
                <div class="flex items-center space-x-2">
                  <h1 class="text-xl font-semibold">{{count(App\Models\Client::all())}}</h1>
                  <p class="text-base bg-green-50 text-green-500 px-1 rounded"></p>
                </div>
              </div>
              <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
              </svg>
            </div>
            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
              <div class="space-y-2">
                <p class="text-base text-gray-400 uppercase">Products</p>
                <div class="flex items-center space-x-2">
                  <h1 class="text-xl font-semibold">{{count(App\Models\Product::all())}}</h1>
                  <p class="text-base bg-red-50 text-red-500 px-1 rounded"></p>
                </div>
              </div>
              <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
              </svg>

            </div>
            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
             <div class="space-y-2">
                <p class="text-base text-gray-400 uppercase">Orders</p>
                <div class="flex items-center space-x-2">
                  <h1 class="text-xl font-semibold">{{count(App\Models\Order::all())}}</h1>
                  <p class="text-base bg-red-50 text-red-500 px-1 rounded"></p>
                </div>
              </div>
              <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
              </svg>
            </div>
          </div>


          <div class="bg-white shadow rounded-sm my-2.5 h-[500px] overflow-x-auto">

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            </div>
      </div>

    </section>

    </main>
    </div>
  </body>

@endcan
@can('isOperator')
<div class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
      <!-- NAV -->
      <nav class="absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
        <div class="flex flex-col justify-between h-full">
          <div class="p-4">



            <div class="border-gray-700 py-5 text-white border-b rounded">
              <div class="relative">
              </div>
              <h1 class="block py-2.5 px-4 flex items-center uppercase text-xl space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">{{ Auth::user()->role }}</h1>
            </div>
            <!-- NAV LINKS -->
            <div class="py-4 text-gray-400 space-y-1">
              <!-- BASIC LINK -->
              <a href="/dashboard" class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Dashboard</span>
              </a>
              <!-- DROPDOWN LINK -->
              <div class="block" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">


                </div>

              </div>
              <div class="block mt-4" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                  <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                      </svg>

                    <span>Clients</span>
                  </div>
                  <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                  </svg>
                  <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
                <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                  <a href="/clients" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded  ">
                  My Clients
                  </a>
                  <a href="/clients/create" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                 New Client
                  </a>

                </div>
              </div>
              <div class="block mt-4" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">


                </div>

              </div>
              <div class="block mt-4" x-data="{open: false}">
                <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                  <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                      </svg>
                    <span>Orders</span>
                  </div>
                  <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                  </svg>
                  <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
                <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                  <a href="/orders" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                  All Orders
                  </a>
                  <a href="/orders/create" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                 New Order
                  </a>

                </div>
              </div>
            </div>
          </div>
          <!-- PROFILE -->
          <div class="text-gray-200 border-gray-800 rounded flex items-center justify-between p-2">
            <div class="flex items-center space-x-2">
              <!-- AVATAR IMAGE BY FIRST LETTER OF NAME -->

              <h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            </div>

          </div>
        </div>
      </nav>
      <!-- END OF NAV -->
      <!-- PAGE CONTENT -->
      <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
        <div class="md:hidden justify-between items-center bg-black text-white flex">
          <h1 class="text-2xl font-bold px-4">WareHouse</h1>
          <button @click="navOpen = !navOpen" class="btn p-4 focus:outline-none hover:bg-gray-800">
            <svg class="w-6 h-6 fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
        </div>
        <section class="max-w-7xl mx-auto py-4 px-5">
          <div class="flex justify-between items-center border-b border-gray-300">
            <h1 class="text-2xl font-semibold pt-2 pb-6">Dashboard</h1>
          </div>
          <!-- STATISTICS -->
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">

            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
              <div class="space-y-2">
                <p class="text-base text-gray-400 uppercase">Clients</p>
                <div class="flex items-center space-x-2">
                  <h1 class="text-xl font-semibold">{{count(App\Models\Client::where('user_id','=',auth()->id())->get())}}</h1>
                  <p class="text-base bg-green-50 text-green-500 px-1 rounded"></p>
                </div>
              </div>
              <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
              </svg>
            </div>

            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
             <div class="space-y-2">
                <p class="text-base text-gray-400 uppercase">Orders</p>
                <div class="flex items-center space-x-2">
                  <h1 class="text-xl font-semibold">{{count(App\Models\Order::where('user_id','=',auth()->id())->get())}}</h1>
                  <p class="text-base bg-red-50 text-red-500 px-1 rounded"></p>
                </div>
              </div>
              <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
              </svg>
            </div>
          </div>
          <!-- END OF STATISTICS -->

          <div class="bg-white shadow rounded-sm my-2.5 h-[500px] overflow-x-auto">

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            </div>
      </div>

    </section>
    <!-- END OF PAGE CONTENT -->
    </main>
    </div>
</div>






@endcan




@endsection
