@if ($message = Session::get('success'))
  <!-- Start an Alert -->
  <div id="alerttopleft" class="myadmin-alert myadmin-alert-img alert-primary myadmin-alert-top-left"> <img src="{{url('/')}}/backend/images/005-database.png" class="img" alt="img"><a href="#" class="closed">&times;</a>
    <h4>Account number copied</h4> <b>to clipboard</b> Successfully.</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(
</div>
@endif