@component('mail::message')

{{$customer['name']}}

<div style="color: blue;">
	
 {{$customer['message']}}
 <br>

 <div style="margin: 0 auto;">
 	@component('mail::button', ['url' => '#'])
 	See In WahdatShop's Website
 	@endcomponent
 </div>
 
 <hr>
 <div>
 Contact me at:<br>
 Cell: {{$customer['phone']}}<br>
 Email: {{$customer['email']}}, Or <a href="mailto:{{$customer['email']}}">Click here for direct email</a>
 </div>
</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent



