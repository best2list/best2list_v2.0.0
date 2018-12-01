@extends('layouts.two-col.two-col')
@section('sidebar')
    @parent
@endsection
@section('content')




        <div class="accordion" id="accordionExample">
            @foreach($faqs as $faq)
                    <div class="card">
                        <div class="card-header" id="heading_{{ $faq->id }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_{{ $faq->id }}" aria-expanded="true" aria-controls="collapse_{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse_{{ $faq->id }}" class="collapse" aria-labelledby="heading_{{ $faq->id }}" data-parent="#accordionExample">
                            <div class="card-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        <div class="media justify-content-center mt-3">
            {{ $faqs->links() }}
        </div>
@endsection
