<!--begin::Javascript-->
<script>
    var hostUrl = "{{ asset('/admin/assets/') }}";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('/admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('/admin/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used by this page)-->
<script src="{{ asset('/admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used by this page)-->
<script src="{{ asset('/admin/assets/js/custom/apps/ecommerce/settings/settings.js') }}"></script>
<script src="{{ asset('/admin/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('/admin/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('/admin/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('/admin/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('/admin/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('/admin/assets/js/custom/utilities/modals/users-search.js') }}"></script>

<script>
    function abc(result, type) {
        if (result !== null) {
            if (type === 'success')
                toastr.success(result);
            if (type === 'danger')
                toastr.error(result);
            if (type === 'warning')
                toastr.warning(result);
            if (type === 'info')
                toastr.info(result);
        }
    };

    //handle on click delete-btn
    $(document).on("click", ".delete-btn", function() {
        var row = $(this).closest("tr");
        var id = $(this).attr("data-id");
        console.log(id);

        swal.fire({
            title: "Bạn có chắc chắn muốn xóa?",
            text: "Sau khi xóa, bạn sẽ không thể phục hồi dữ liệu này!",
            icon: "warning",
            showCancelButton: true,
            // background: '#DDDDDD',
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Hủy bỏ"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: "/{{ Route::current()->uri() }}/delete/" + id,
                    type: "GET",
                    success: function(result) {
                        if (result !== null) {
                            toastr.success("Xóa thành công");
                            row.remove();
                        } else {
                            toastr.error("Xóa thất bại");
                        }
                    },
                    error: function(e) {
                        toastr.error("Xóa thất bại");
                    }
                })
            }
        });
    });
</script>

@yield('js_custom')
<!--end::Custom Javascript-->
<!--end::Javascript-->
