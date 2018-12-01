    <div class="bg-light border-top">
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <a class="nav-link d-inline" href="{{ route('faq') }}"><li class="d-inline">FAQ</li></a>
                @foreach($menus as $menu)
                    <a class="nav-link d-inline" href="{{ route('showMenu', $menu->id) }}"><li class="d-inline">{{ $menu->title }}</li></a>
                @endforeach
            </ul>
        </div>
        <div class="bg-warning text-center pt-3 pb-3">
            <span>All rights reserved by Best2List.</span>
        </div>
    </div>