@guest
    <div class="card">
        <div class="card-header">mybusiness</div>
        <div class="card-body">
            <ul>
                <li><a href="/login">login</a> </li>
            </ul>
        </div>
    </div>
@else
    <div class="card">
        <div class="card-header">mybusiness</div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li><a class="btn btn-warning btn-block mb-2" href="{{ route('index') }}">my businesses</a> </li>
                <li><a class="btn btn-warning btn-block mb-2" href="{{ route('create') }}">new business</a></li>
                <li><a class="btn btn-warning btn-block mb-2" href="{{ route('showFavorite') }}">my favorite business</a> </li>
                <li><a class="btn btn-warning btn-block mb-2" href="{{ route('ticket') }}">ticket</a> </li>
                <li><a class="btn btn-warning btn-block mb-2" href="/password/reset">reset password</a></li>
            </ul>
        </div>
    </div>
@endguest
<br/>