@component('mail::message')
# Reset Account
Welcome {{$data['data']->name}}<br>
The body of your message.

@component('mail::button', ['url' => aurl('/reset/password/'.$data['token'])])
Click Here to reset your password
@endcomponent
Or <br>
cop this link
<a href="{{aurl('/reset/password/'.$data['token'])}}">{{aurl('/reset/password/'.$data['token'])}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
