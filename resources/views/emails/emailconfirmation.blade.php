@component('mail::message')
# Email Confirmation

Hi {{ $firstName }},
You currently signed up at Mysurebiz. To complete your registration, kindly click on the confirmation button below.

@component('mail::button',
['url' => $link,
'color' => 'success'])
Confirm Email
@endcomponent

<small style="color: red;">
    Please, ignore this message if you are unaware of this action.
</small>

Thanks,<br>
{{ config('app.name') }}
@endcomponent