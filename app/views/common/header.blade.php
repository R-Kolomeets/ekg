@section('header')
<div class="header">
  <a href="[% URL::to('signup') %]" class="green-btn header-btn">[% Lang::get('locale.signup') %]</a>
  <a href="[% URL::to('login') %]" class="green-btn header-btn">[% Lang::get('locale.login') %]</a>
</div>
@endsection