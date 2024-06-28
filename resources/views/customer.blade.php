<x-layout>
    <x-slot name="title">
         <title>Customers</title>
    </x-slot>
    <x-slot name="content">
@foreach ($customers as $customer)

<h1>{{$customer->customer_id}}</h1>

<div>
    <p>Customer Name: {{$customer->customer_name}} </p>
</div>

 @endforeach 
 <div>     
    <a href="/index">Back</a>
</div>
    </x-slot>
</x-layout>


  
