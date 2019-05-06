<h1>Hi {{ $user->name }}</h1>
{{--<p>Please use the following code to activate your account:</p>--}}
<p>Please click on the following link to activate your account</p>
<button ><a href="{{$url}}/{{$user->status}}">Verifica</a></button>
<p>Create react app team!</p>