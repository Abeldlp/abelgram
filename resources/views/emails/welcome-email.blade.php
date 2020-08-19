@component('mail::message')
# Welcome to Abegram!

We are really glad you put an eye on this website. 
We have been growing thanks to people like you that mostly want to invest
their time in new technologies. 


@component('mail::button', ['url' => ''])
Back to Abegram
@endcomponent

All the best,<br>
Abeldlp, {{ config('app.name') }} ceo and development director.
@endcomponent
