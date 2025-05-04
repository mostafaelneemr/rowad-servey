@extends('system.layout')

@section('content')

    <!--begin::Form-->
    {!! Form::open([
        'id' => 'main-form',
        'onsubmit' => isset($result)
            ? 'FormSubmit("'.route('system.product.update', $result->id).'");return false;'
            : 'FormSubmit("'.route('system.product.store').'");return false;',
        'method' => isset($result) ? 'PATCH' : 'POST','enctype'=>'multipart/form-data'
    ]) !!}

    <div id="form-alert-message"></div>

    <div class="card mb-6 mb-xl-9">
        <div class="card-body pt-9 pb-0">
            <ul class="nav nav-tabs flex-nowrap text-nowrap mb-5 fs-6 fw-bold">
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 active" data-bs-toggle="tab" href="#description">{{__('General')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#topic_data">{{__('Data')}}</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- General Tab -->
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6 fw-bold">
                        @foreach($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 mb-5 me-6 @if($language['id'] == 1) active @endif" data-bs-toggle="tab" href="#language{{$language['id']}}">
                                    {{$language['name']}}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="myTabContent2">
                        @foreach($languages as $language)
                            <div class="tab-pane fade @if($language['id'] == 1) show active @endif" id="language{{$language['id']}}" role="tabpanel">
                                <div class="row gx-10">
                                    <div class="col-lg-6">
                                        {{ label(__('Title'), 'required') }}
                                        <div class="mb-5">
                                            {{ Form::input('text', 'input[lang]['.$language['id'].'][title]', isset($result) ? $result->{$language['id'] == 2 ? 'title_ar' : 'title_en'} : '', [
                                                'id' => 'input[lang]['.$language['id'].'][title]',
                                                'class' => 'form-control form-control-solid'
                                            ]) }}
                                            <div class="invalid-feedback" id="input[lang][{{$language['id']}}][title]-form-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        {{ label(__('Image Description'), 'required') }}
                                        <div class="mb-5">
                                            {{ Form::input('text', 'input[lang]['.$language['id'].'][image_desc]', isset($result) ? $result->{$language['id'] == 2 ? 'image_desc_ar' : 'image_desc_en'} : '', [
                                                'id' => 'input[lang]['.$language['id'].'][image_desc]',
                                                'class' => 'form-control form-control-solid',

                                            ]) }}
                                            <div class="invalid-feedback" id="input[lang][{{$language['id']}}][image_desc]-form-error"></div>
                                        </div>

                                    </div>


                                    <div class="col-lg-12">
                                        {{ label(__('Description Text'), 'required') }}
                                        <div class="mb-5">
                                            {{ Form::textarea('input[lang]['.$language['id'].'][desc]', isset($result) ? $result->{$language['id'] == 2 ? 'desc_ar' : 'desc_en'} : '', [
                                                'id' => 'input[lang]['.$language['id'].'][desc]',
                                                'class' => 'form-control form-control-solid',
                                                'rows' => 4
                                            ]) }}
                                            <div class="invalid-feedback" id="input[lang][{{$language['id']}}][desc]-form-error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Data Tab -->
                <div class="tab-pane fade" id="topic_data" role="tabpanel">
                    <div class="row gx-10">
                        <div class="col-lg-6">
                            {{ label(__('Main Image'), 'required') }}
                            <div class="mb-5">
                                {{ Form::file('image', [
                                    'id' => 'image',
                                    'class' => 'form-control form-control-solid',
                                    'accept' => 'image/*'
                                ]) }}
                                <div class="invalid-feedback" id="main_image-form-error"></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{ label(__('Gallery Images')) }}
                            <div class="mb-5">
                                {{ Form::file('gallery_images[]', [
                                    'id' => 'gallery_images',
                                    'class' => 'form-control form-control-solid',
                                    'accept' => 'image/*',
                                    'multiple' => true
                                ]) }}
                                <div class="invalid-feedback" id="gallery_images-form-error"></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{ label(__('Category'), 'required') }}
                            <div class="mb-5">
                                {!! Form::select('category_id', ['' => ''] + $categories->pluck('title_'.lang(), 'id')->toArray(), isset($result->category_id) ? $result->category_id : old('category_id'), [
                                    'class' => 'form-select form-select-solid',
                                    'id' => 'category_id',
                                    'data-placeholder' => __('Select a Category')
                                ]) !!}
                                <div class="invalid-feedback" id="category_id-form-error"></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{ label(__('Attach File')) }}
                            <div class="mb-5">
                                {{ Form::file('pdf_file', [
                                    'id' => 'pdf_file',
                                    'class' => 'form-control form-control-solid',
                                    'accept' => '.pdf,.doc,.docx,.xls,.xlsx'
                                ]) }}
                                <div class="invalid-feedback" id="pdf_file-form-error"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            {{ label(__('Slider Image'), 'required') }}
                            <div class="mb-5">
                                {{ Form::file('slider_image', [
                                    'id' => 'slider_image',
                                    'class' => 'form-control form-control-solid',
                                    'accept' => 'image/*'
                                ]) }}
                                <div class="invalid-feedback" id="slider_image-form-error"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            {{ label(__('Sort Order')) }}
                            <div class="mb-5">
                                {{ Form::number('sort', isset($result) ? $result->sort : 0, [
                                    'id' => 'sort',
                                    'class' => 'form-control form-control-solid'
                                ]) }}
                                <div class="invalid-feedback" id="sort-form-error"></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{ label(__('Status')) }}
                            <div class="mb-5">
                                {!! Form::select('status', ['' => ''] + default_status(false,true), isset($result->status) ? $result->status : old('input[status]'), [
                                    'class' => 'form-select form-select-solid',
                                    'id' => 'input[status]',
                                    'data-placeholder' => __('Select Status')
                                ]) !!}
                                <div class="invalid-feedback" id="status-form-error"></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Data Tab -->
            </div>
        </div>
    </div>

    <div class="separator separator-dashed mb-8"></div>

    <button type="submit" class="btn btn-primary submit">
        <span class="indicator-label">{{ isset($result) ? __('Update') : __('Create') }}</span>
        <span class="indicator-progress">{{ __('Please wait') }}...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>

    {!! Form::close() !!}

@endsection
