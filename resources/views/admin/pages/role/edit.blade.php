@extends('admin.layouts.main')
@section('title_page')
    Edit - Role - Admin - {{ config('app.name') }}
@endsection

@section('name_user')
    @if (auth()->user() != null)
        {{ auth()->user()->fullname }}
    @endif
@endsection

@section('email_user')
@if (auth()->user() != null)
{{ auth()->user()->email }}
@endif
@endsection

@section('role_user')
    @if (auth()->user() != null)
    <span class=" my-1 text-center
    badge badge-{{auth()->user()->getAccount->getRole->color}}"> {{auth()->user()->getAccount->getRole->role_name}}</span> 
    @endif
@endsection

@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'role';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
    Role
@endsection
@section('title_layout')
    Edit Role
@endsection
@section('actions_layout')
    <a href="{{route('admin.role.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Role
    </a>
@endsection
@section('title_card')
    Edit Role
@endsection
@section('content_card')
    <form action="" method="post">
        @csrf
        @if($errors->any())
            <div class="alert alert-warning d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>Thông tin chưa hợp lệ</div>
            </div>
        @endif
        <div class="form-group my-2">
            <label for="username">Tên Role</label>
            <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Tên Role"
            value="{{$role->role_name}}">
            @error('role_name')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group my-2">
            <label for="username">Mô tả</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả"
                   value="{{$role->description}}">
            @error('description')
            <span class="text-bold text-italic text-danger">{{$message}}</span>
            @enderror
        </div>

        @php
        $color = ['danger', 'success', 'warning', 'info', 'dark', 'light', 'primary'];
        @endphp

        <div class="form-group row">

            <label class="col-sm-2">Màu sắc: </label>
            <div class="col-sm-10">
                @foreach($color as $item)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="inlineRadio1" value="{{$item}}" {{$item == $role->color ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineRadio1"><span class="badge badge-{{$item}}">{{$item}}</span></label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="justify-content-center d-flex my-5">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection
@section('footer_card')

@endsection
@section('content_layout')
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title">@yield('title_card')</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                @yield('content_card')
            </div>
            <div class="card-footer">
                @yield('footer_card')
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection

