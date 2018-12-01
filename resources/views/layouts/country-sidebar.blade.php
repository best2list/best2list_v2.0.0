    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-flag"></i> countries</div>
        <div class="card-body">
            <ul>
                @foreach($countries as $country)
                    <li class="list-unstyled mb-md-2">
                        <a href="/country/{{ $country->id }}"><img class="col-3" src="{{ url($country->flag) }}" alt="$country->country{{ $country->country }}"> {{ $country->country }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
