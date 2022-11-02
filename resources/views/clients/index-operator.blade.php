
@extends('layouts.app')

@section('content')
@unless(count($clients)==0)
<table class="min-w-max w-full table-auto bg-white">
    <thead>
        <a href="/dashboard" class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
            </svg>
             </a>
      <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <th class="py-3 px-6 text-left">Name</th>
        <th class="py-3 px-6 text-left">Email</th>




      </tr>
    </thead>
    <tbody class="text-gray-600 text-sm">
        @foreach($clients as $client)
      <tr class="border-b border-gray-200 hover:bg-gray-100">
        <td class="py-3 px-6 text-left whitespace-nowrap">
          {{$client->first_name}} {{$client->last_name}}
</div>
</td>
<td class="py-3 px-6 text-left">
<div class="flex items-center">
<div class="mr-2">

</div>
<span>{{$client->email}}</span>
</div>
</td>


<td class="py-3 px-6 text-center">
<div class="flex item-center justify-center">

<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
    <a href="/clients/{{$client->id}}/edit">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
</svg>
</div>
</a>
</div>
</td>
</tr>
@endforeach



</tbody>
</table>
@else
<p>No Users found</p>
@endunless









@endsection


