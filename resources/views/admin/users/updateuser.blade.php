@extends('layouts.app')

@section('content')
<div class="p-6 md:w-[700px] h-auto bg-white rounded-lg border  lg:ml-[500px] border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <section class="vh-100 gradient-custom  ">
        <a href="/admin/users" class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
            </svg>
             </a>
                  <h3 class="text-xl text-black-50 text-center">Update this user</h3>
                  <form method="POST" action="/users/{{$user->id}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <div class="relative z-0 mb-6 w-full group mt-4">
                                <input type="text" value="{{$user->first_name}}" name="first_name" id="first_name" class="block   py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
                                <label for="name" class="peer-focus:font-medium absolute text-base  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
                            </div>
                        </div>
                        @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <div class="relative z-0 mb-6 w-full group mt-4">
                                <input type="text" name="last_name" value="{{$user->last_name}}" id="last_name" class="block   py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
                                <label for="last_name" class="peer-focus:font-medium absolute text-base  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
                            </div>
                        </div>
                        @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <div class="relative z-0 mb-6 w-full group mt-4">
                                <input type="email" name="email" id="email" value="{{$user->email}}" class="block   py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
                                <label for="email" class="peer-focus:font-medium absolute text-base  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            </div>

                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                      </div>
                      <div class="col-md-6 mb-4 pb-2">



                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <select name="role" class="" >
                            @foreach ( config('app-vars.app-roles') as $role)
                             <option value="{{$role}}">{{$role}}</option>
                           @endforeach
                           </select>
                          @error('role')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror



                        <div class="row mb-3">

                            <div class="relative z-0 mb-6 w-full group mt-4">
                                <input type="password" name="password" id="password" class="block   py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
                                <label for="password" class="peer-focus:font-medium absolute text-base  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                            </div>
                            <div class="relative z-0 mb-6 w-full group mt-4">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="block   py-2.5 px-0 w-full text-base text-gray-900 bg-transparent  border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
                                <label for="password_confirmation" class="peer-focus:font-medium absolute text-base  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password</label>
                            </div>
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>



                    <div class="mt-4 pt-2">
                      <button class="btn btn-secondary ml-[250px]"  value="Submit" >Update </button>
                    </div>

                  </form>

      </section>
    </div>


  @endsection
