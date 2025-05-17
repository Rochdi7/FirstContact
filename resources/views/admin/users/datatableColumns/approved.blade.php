@if($user->approved)
   <div class="badge badge-light-primary fw-bolder"> Actif </div>
@else
    <div class="badge badge-light-danger fw-bolder"> Bloqué </div>
@endif
