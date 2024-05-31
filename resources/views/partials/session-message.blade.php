@if(session('message')) 
<div
    class="alert alert-success my-4"
    role="alert"
>
    <strong>Success!</strong>
    {{session('message')}}
</div>

@endif