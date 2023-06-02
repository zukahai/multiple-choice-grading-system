<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
    data-kt-menu-expand="false">
    @php
        $menuTeacher = config('menuTeacher');
    @endphp
    @foreach ($menuTeacher as $menu)
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion @if ($menu_parent == $menu['name']) hover show @endif ">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/art/art007.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z" fill="currentColor" />
                            <path
                                d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z"
                                fill="currentColor" />

                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">{{ $menu['title'] }}</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            @if (isset($menu['children']) && count($menu['children']) > 0)
                <div class="menu-sub menu-sub-accordion " kt-hidden-height="121" style="">
                    @foreach ($menu['children'] as $item)
                        <!--begin:Menu item-->
                        <div class="menu-item ">
                            <!--begin:Menu link-->
                            <a class="menu-link @if ($menu_parent == $menu['name'] && $menu_child == $item['name']) active @endif "
                                href="@if (isset($item['route'])) {{ route($item['route']) }} @else # @endif">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ $item['title'] }}</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    @endforeach
                </div>
            @endif
            <!--end:Menu sub-->
        </div>
    @endforeach

    {{--        <div data-kt-menu-trigger="click" --}}
    {{--             class="menu-item @if ($menu_parent == $menu['name']) here show menu-accordion @else menu-accordion @endif"> --}}

    {{--            <!--begin:Menu link--> --}}
    {{--            <span class="menu-link "> --}}
    {{--                                    <span class="menu-icon"> --}}
    {{--                                        <span class="svg-icon svg-icon-2"> --}}
    {{--                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" --}}
    {{--                                                 xmlns="http://www.w3.org/2000/svg"> --}}
    {{--                                                <path opacity="0.3" --}}
    {{--                                                      d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" --}}
    {{--                                                      fill="currentColor"/> --}}
    {{--                                                <rect x="6" y="12" width="7" height="2" rx="1" --}}
    {{--                                                      fill="currentColor"/> --}}
    {{--                                                <rect x="6" y="7" width="12" height="2" rx="1" --}}
    {{--                                                      fill="currentColor"/> --}}
    {{--                                            </svg> --}}
    {{--                                        </span> --}}
    {{--                                    </span> --}}
    {{--                                    <span class="menu-title">{{$menu['title']}}</span> --}}
    {{--                                    <span class="menu-arrow"></span> --}}
    {{--                                </span> --}}
    {{--            @if (isset($menu['children']) && count($menu['children']) > 0) --}}
    {{--                @foreach ($menu['children'] as $item) --}}
    {{--                    <div class="menu-sub menu-sub-accordion"> --}}
    {{--                        <!--begin:Menu item--> --}}
    {{--                        <div class="menu-item py-2"> --}}
    {{--                            <!--begin:Menu link--> --}}
    {{--                            <a class="menu-link @if ($menu_parent == $menu['name'] && $menu_child == $item['name']) active @endif " --}}
    {{--                               href="{{route('home')}}"> --}}
    {{--													<span class="menu-bullet"> --}}
    {{--														<span class="bullet bullet-dot"></span> --}}
    {{--													</span> --}}
    {{--                                <span class="menu-title">{{$item['title']}}</span> --}}
    {{--                            </a> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                @endforeach --}}
    {{--            @endif --}}
    {{--        </div> --}}
</div>
