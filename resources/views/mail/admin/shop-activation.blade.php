@component('mail::message')
Please Activate Shop. Here are shop details.

Shop Name: {{$shop->name}}
<br>
Shop Owner: {{$shop->owner->name}}

@component('mail::button', ['url' => url('/admin/shops')])
Manage Shops
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
