@component('mail::message')
# Hello

######Below was your order. Please confirm.

@component('mail::table')
| Product      			  | Qty           | Price  					  |
| ------------------------|:-------------:| -------------------------:|
@foreach ($order->products as $product)
| {{$product->name}}      |  {{$product->pivot->quantity}}      | {{$product->price}}     |
@endforeach
@endcomponent

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
