@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
    <p>_alert page</p>
</div>
@endif