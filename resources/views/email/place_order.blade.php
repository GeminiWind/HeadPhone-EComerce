@component('mail::message')
# Hello

###You placed an order in Headphone.Check the information below

##### Receiver
###### Name: {{ $order->receiver->name }}
###### Telephone : {{ $order->receiver->telephone }}
###### Address : {{ $order->receiver->address }}

@component('mail::table')
| Product      			  | Qty           | Price  					  |
| ------------------------|:-------------:| -------------------------:|
@foreach ($order->products as $product)
| {{$product->name}}      |  {{$product->pivot->quantity}}      | {{$product->pivot->price}}     |
@endforeach
@endcomponent

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
