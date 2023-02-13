@extends('admin.layouts.main')
@section('title_page')
    {{ config('app.name') }}
@endsection

@section('name_user')
    {{-- @if (auth()->user() != null)
        {{ auth()->user()->fullname }}
    @endif --}}
@endsection

@section('email_user')
    {{-- @if (auth()->user() != null)
        {{ auth()->user()->email }}
    @endif --}}
@endsection

@section('role_user')
    {{-- @if (auth()->user() != null)
        <span
            class=" my-1 text-center
    {{-- badge badge-{{auth()->user()->getAccount->getRole->color}}"> {{auth()->user()->getAccount->getRole->role_name}}</span>  
@endif --}}
@endsection

@section('css_custom')
    <link href="{{ asset('/admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js_custom')
    <script src="{{ asset('/admin/assets/plugins/global/plugins.bundle.js') }}"></script>
@endsection
@section('menu')
    @php
        $menu_parent = 'question';
        $menu_child = 'index';
    @endphp
@endsection
@section('title_component')
    Question
@endsection
@section('title_layout')
    Question
@endsection
@section('actions_layout')
    <a href="{{ route('teacher.question.index') }}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Question
    </a>
@endsection
@section('title_card')
    Question
@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('{{ $message }}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="abc('{{ $message }}' , 'danger')"
    @endif
@endsection

@section('content_card')
    <div>
        <form method="get" action="">
            <div class="input-group mb-5">
                <input type="text" class="form-control" name="keywords" placeholder="Từ khoá tìm kiếm"
                    value="{{ request()->keywords }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <h5 class="text-center">Danh sách Câu hỏi</h5>
    {{-- <a href="{{ route('admin.role.showcreate') }}" class="btn btn-primary mb-2">Thêm vai trò</a> --}}
    @if (!empty($success))
        <h6 class="alert alert-info"> {{ $success }}</h6>
    @endif

    <table class="table search-table-outter">
        <thead>
            @if (!$questions->isEmpty())
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Question</th>
                    <th class="text-center" scope="col">Choice A</th>
                    <th class="text-center" scope="col">Choice B</th>
                    <th class="text-center" scope="col">Choice C</th>
                    <th class="text-center" scope="col">Choice D</th>
                    <th class="text-center" scope="col">Answer</th>
                    <th class="text-center" scope="col">Name Teacher</th>
                    <th class="text-center" scope="col">Status</th>

                    <th>&nbsp;</th>
                </tr>
            @endif
        </thead>
        <tbody>
            @forelse ($questions as $item)
                <tr class="align-middle">
                    <th class="align-middle text-center" scope="row">{{ $item->id }}</th>
                    <td class="align-middle text-center">

                        {{ $item->question }}</span>
                    </td>
                    <td class="align-middle text-center">

                        {{ $item->choiceA }}</span>
                    </td>
                    <td class="align-middle text-center">

                        {{ $item->choiceB }}</span>
                    </td>
                    <td class="align-middle text-center">

                        {{ $item->choiceC }}</span>
                    </td>
                    <td class="align-middle text-center">

                        {{ $item->choiceD }}</span>
                    </td>
                    <td class="align-middle text-center">

                        {{ $item->ans }}</span>
                    </td>
                    <td class="align-middle text-center">

                        {{ $item->getUser->fullname }}</span>
                    </td>
                    <td class="align-middle text-center">

                        {{ $item->status }}</span>
                    </td>

                    <td class="align-center justify-content-center">

                        {{-- <a href="{{ route('admin.role.detail', ['id' => $item->id]) }}"
                            class="btn btn-icon btn-info btn-sm btn-icon-md btn-circle mx-1" title="Chi tiết">
                            <i class="fa fa-asterisk"></i>
                        </a> --}}

                        {{-- <a href="{{ route('teacher.question.showEdit') }}/{{ $item->id }}"
                            class="btn btn-icon btn-success btn-sm btn-icon-md btn-circle mx-1" title="Sửa">
                            <i class="fa fa-edit"></i>
                        </a> --}}

                        <span class="btn btn-icon btn-danger delete-btn btn-sm btn-icon-md btn-circle mx-1"
                            data-toggle="tooltip" data-placement="top" data-id="{{ $item->id }}" title="Xóa">
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
        {{ $questions->links() }}
    </div>
@endsection

@section('footer_card')
@endsection
@section('content_layout')
    <!--begin::Card-->
    <div class="card
            shadow-sm card-bordered">
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
