@extends('system.layout')

@section('content')


    {!! Form::open(['id'=>'main-form','onsubmit' =>  isset($result) ? 'FormSubmit("'.route('system.language.update',$result->language_id).'");return false;':'FormSubmit("'.route('system.language.store') .'");return false;','method' => isset($result) ?  'PATCH' : 'POST']) !!}
    <div id="form-alert-message"></div>
    <!--begin::Row-->
    <div class="row gx-10 ">


        <!--begin::Col-->
        <div class="col-lg-6">
        {{ label(__('Name'),'required') }}
        <!--begin::Input group-->
            <div class="mb-5">
                {!! Form::text('name',isset($result->name) ? $result->name:old('name'),['class'=>'form-control form-control-solid']) !!}
                <div class="invalid-feedback" id="name-form-error"></div>
            </div>

            <!--end::Input group-->
        </div>

        <!--begin::Col-->
        <!--begin::Col-->
        <div class="col-lg-6">
        {{ label(__('Code'),'required') }}
        <!--begin::Input group-->
            <div class="mb-5">
                {!! Form::text('code',isset($result->code) ? $result->code:old('code'),['class'=>'form-control form-control-solid']) !!}
                <div class="invalid-feedback" id="code-form-error"></div>
            </div>

            <!--end::Input group-->
        </div>

        <!--begin::Col-->
        <div class="col-lg-6 ">
        {{ label(__('Status'),'required') }}
        <!--begin::Input group-->
            <div class="mb-5">
                {!! Form::select('status',status_select_data(),isset($result->status) ? $result->status:old('status'),['class'=>'form-select form-select-solid','id'=>'status',' data-placeholder'=>__('Select an option')]) !!}
                <div class="invalid-feedback" id="status-form-error"></div>
            </div>
        </div>
        <!--end::Col-->
        <div class="col-lg-6">
            {{ label( __('Sort Order'),'required') }}
            <div class="mb-5">
                {!! Form::number('sort_order',isset($result) ? $result->sort_order : null,['class'=>'form-control form-control-solid','id'=>'sort_order']) !!}
                <div class="invalid-feedback" id="sort_order-form-error"></div>
            </div>
        </div>
        <div class="col-lg-6">
            {{ label( __('Image'),'required') }}
            <div class="mb-5">
                {!! upload_image_view(isset($result)?$result->image:'','language','original') !!}
                <div class="invalid-feedback" id="input[image]-form-error"></div>
            </div>
        </div>

    </div>
    <!--end::Row-->
    <div class="separator separator-dashed mb-8"></div>

    <button type="submit" class="btn btn-primary submit">
        <span class="indicator-label">{{ isset($result->language_id)? __('Update') :  __('Create')}}</span>
        <span class="indicator-progress">{{__('Please wait')}}...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>

    {!! Form::close() !!}

@endsection

