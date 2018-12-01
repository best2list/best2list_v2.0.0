    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-list"></i> categories</div>
        <div class="card-body">
            {{--<ul>--}}
                {{--@foreach ($categories as $parent)--}}
                    {{--<li><a href="/category/{{ $parent->id }}">{{ $parent->title }}</a>--}}
                        {{--@if ($parent->children->count())--}}
                            {{--<ul>--}}
                                {{--@foreach ($parent->children as $child)--}}
                                    {{--<li><a href="/category/{{ $child->id }}">{{ $child->title }}</a></li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--@endif--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
            {{--<br/>--}}
            {{--<hr/>--}}
            {{--<br/>--}}
            @foreach ($categories as $parent)
                @if ($parent->children->count())
                    <div class="btn-group dropright d-block mt-2 mb-2 border-0">
                        <button type="button" class="dropdown-toggle border-0 btn btn-block btn-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $parent->title }}
                        </button>
                        <div class="dropdown-menu col-12">
                            <ul class="list-unstyled p-2">
                                @foreach ($parent->children as $child)
                                    <li><a class="btn btn-block btn-warning mb-2" href="/category/{{ $child->id }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <a class="btn btn-block btn-warning" href="/category/{{ $parent->id }}">{{ $parent->title }}</a>
                @endif
            @endforeach
        </div>
    </div>
