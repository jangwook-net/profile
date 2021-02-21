@component('mail::message')
# Contacts Received

You are received Contact from {{ $name }}({{ $email }}).

<hr>


【Name】<br>
{{ $name }}



【E-mail Address】<br>
{{ $email }}



【Contents】<br>
{{ $contents }}


<hr>
@endcomponent
