@component('mail::message')

Hi <b>{{$name}}</b>,

Congrats for delivering this email!

It looks neat, no?<br />

@component('mail::button', ['url' => $link])

Take Me Back <br/>

@endcomponent

Regards,<br />
DevBlog.

@endcomponent
