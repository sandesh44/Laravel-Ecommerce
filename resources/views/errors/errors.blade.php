@if (count($errors))
<div class="row">
  <div class="col-sm-12 mt-2">
  <div class="alert  alert-danger alert-dismissible" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        <ol>{{ $error }}</ol>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top: -7px;">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  </div> 
</div>

@endif