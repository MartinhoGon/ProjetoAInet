Hi {{ $name }},
<p>Your registration is completed. Please click the link to get access. </p>

{{ route('confirmation', $remember_token) }}
