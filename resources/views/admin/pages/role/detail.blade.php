@extends('admin.layouts.main')
@section('title_page')
    Detail role {{(!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""}} - Admin - {{ config('app.name') }}
@endsection
@section('name_user')
    {{(auth()->user()->account->username)}}

@endsection
@section('email_user')
    Tài khoản: {{number_format(auth()->user()->money, 0, '', ',')}} VND
@endsection

@section('role_user')
    @foreach(auth()->user()->account->roles->take(4) as $role)
        <span class="badge badge-light-{{$role->color}} fw-bold fs-8 py-1 mx-auto">{{$role->role_name}}</span>
    @endforeach
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
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Role: {{(!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""}}
@endsection
@section('title_layout')
    Detail role {{(!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""}}
@endsection
@section('actions_layout')
    <a href="{{route('admin.role.index')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Role
    </a>
@endsection
@section('title_card')
    Role {{(!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""}}
@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="abc('{{$message}}' , 'danger')"
    @endif
@endsection

@section('content_card')

    @if(!empty($success))
        <h6 class="alert alert-info"> {{$success}}</h6>
    @endif

    @if(!$accounts->isEmpty())
    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="row my-5 mx-auto">
                <div class="form-floating col col-6">
                    <select class="form-select col col-8" data-control="select2" id="idTypeTable" name="id_account" data-placeholder="Select an option">
                        @foreach($accounts as $account)
                            <option value="{{$account->id}}">{{$account->id}} - {{$account->username}}</option>
                        @endforeach
                    </select>
                    <label for="idTypeTable">Tài khoản</label>
                </div>
                <div class="form-floating col col-6 mx-auto">
                    <input type="submit" class="btn btn-primary h-100" value="Thêm">
                </div>
            </div>
        </form>
    </div>
    @endif
    <hr class="my-4">
    <h3 class="text-center">Role {{(!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""}}</h3>

    <table class="table search-table-outter">
        <thead>
        @if(!$roles_account->isEmpty())
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">UserName</th>
                <th class="text-center" scope="col">Roles</th>
                <th class="text-center" scope="col">Created_at</th>
                <th class="text-center" scope="col">AddRole_{{(!$roles_account->isEmpty()) ?$roles_account[0]->role->role_name: ""}}_at</th>
                <th>&nbsp;</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse ($roles_account as $item)
            <tr class="align-middle">
                <th class="align-middle text-center" scope="row">{{$item->id}}</th>
                <td class="align-middle text-center">{{$item->getAccount->username}}</td>
                <td class="align-middle text-center">
                    @foreach($item->getAccount->roles as $role)
                        <span class=" my-1 text-center
                    badge badge-{{$role->color}}"> {{$role->role_name}}</span>
                    @endforeach
                </td>
                <td class="align-middle text-center">{{$item->getAccount->created_at}}</td>
                <td class="align-middle text-center">{{$item->created_at}}</td>
                <td class="align-center justify-content-center">

                    <span class="btn btn-icon btn-danger delete-btn btn-sm btn-icon-md btn-circle mx-1"
                          data-toggle="tooltip" data-placement="top" data-id="{{$item->id}}" title="Xóa">
                                    <i class="fa fa-trash"></i>
                    </span>
                </td>
            </tr>
        @empty
            <h1 class="text-light text-center">Không có dữ liệu</h1>
        @endforelse

        </tbody>
    </table>
    <div class="d-flex justify-content-center text-dark">
        {{$roles_account->links()}}
    </div>
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

