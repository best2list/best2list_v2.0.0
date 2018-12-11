@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">{{ $form->name }} Form</div>
        <div class="card-body">
            <div class="bg-light">
                <table class="table table-bordered table-responsive-md">
                    <tr>
                        <td>id</td>
                        <td>item label</td>
                        <td>item type</td>
                        <td>edit</td>
                        <td>delete</td>
                    </tr>
                    @foreach($form->formItems()->get() as $formItem)
                        <tr>
                            <td>{{ $formItem->id }}</td>
                            <td>{{ $formItem->label }}</td>
                            <td>{{ $formItem->form_item_type_id }}</td>
                            <td><a class="btn btn-warning" href="">edit</a></td>
                            <td><a class="btn btn-danger" href="">delete</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <a href="">add new item</a>

        </div>

        <div class="accordion p-4" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            single line text
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        @include('admin.form.item-form.single-line')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            multi line text
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        @include('admin.form.item-form.multi-line')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            number
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.number')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-4">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                            decimal
                        </button>
                    </h5>
                </div>
                <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.decimal')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-5">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                            date
                        </button>
                    </h5>
                </div>
                <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-6">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                            time
                        </button>
                    </h5>
                </div>
                <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-7">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                            date-time
                        </button>
                    </h5>
                </div>
                <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-8">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-8" aria-expanded="false" aria-controls="collapse-8">
                            select
                        </button>
                    </h5>
                </div>
                <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-9">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-9" aria-expanded="false" aria-controls="collapse-9">
                            multi-select
                        </button>
                    </h5>
                </div>
                <div id="collapse-9" class="collapse" aria-labelledby="heading-9" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-10">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-10" aria-expanded="false" aria-controls="collapse-10">
                            radio
                        </button>
                    </h5>
                </div>
                <div id="collapse-10" class="collapse" aria-labelledby="heading-10" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-11">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-11" aria-expanded="false" aria-controls="collapse-11">
                            check box
                        </button>
                    </h5>
                </div>
                <div id="collapse-11" class="collapse" aria-labelledby="heading-11" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-12">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-12" aria-expanded="false" aria-controls="collapse-12">
                            Email
                        </button>
                    </h5>
                </div>
                <div id="collapse-12" class="collapse" aria-labelledby="heading-12" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-13">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-13" aria-expanded="false" aria-controls="collapse-13">
                            phone
                        </button>
                    </h5>
                </div>
                <div id="collapse-13" class="collapse" aria-labelledby="heading-13" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-14">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-14" aria-expanded="false" aria-controls="collapse-14">
                            website
                        </button>
                    </h5>
                </div>
                <div id="collapse-14" class="collapse" aria-labelledby="heading-14" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-15">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-15" aria-expanded="false" aria-controls="collapse-15">
                            Currency
                        </button>
                    </h5>
                </div>
                <div id="collapse-15" class="collapse" aria-labelledby="heading-15" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-16">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-16" aria-expanded="false" aria-controls="collapse-16">
                            file upload
                        </button>
                    </h5>
                </div>
                <div id="collapse-16" class="collapse" aria-labelledby="heading-16" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading-17">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-17" aria-expanded="false" aria-controls="collapse-17">
                            image upload
                        </button>
                    </h5>
                </div>
                <div id="collapse-17" class="collapse" aria-labelledby="heading-17" data-parent="#accordionExample">
                    <div class="card-body">

                        @include('admin.form.item-form.date-time')

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection