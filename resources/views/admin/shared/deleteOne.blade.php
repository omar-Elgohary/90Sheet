<script>
    $(document).on('click' , '.delete-row', function (e) {
        e.preventDefault()
        Swal.fire({
            title: "{{__('هل تريد الاستمرار ؟')}}",
            text: "{{__('هل انت متأكد انك تريد استكمال عملية الحذف')}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '{{__('admin.confirm')}}',
            cancelButtonText: '{{__('admin.cancel')}}',
            customClass: {
                confirmButton: 'btn btn-danger me-3',
                cancelButton: 'btn btn-label-primary'
            },
            buttonsStyling: false
            }).then( (result) => {
            if (result.value) {
                $.ajax({
                    type: "delete",
                    url: $(this).data('url'),
                    data: {},
                    dataType: "json",
                    success:  (response) => {
                        Swal.fire(
                        {
                            position: 'top-start',
                            icon: 'success',
                            title: '{{__('admin.the_selected_has_been_successfully_deleted')}}',
                            showConfirmButton: false,
                            timer: 1500,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                        getData(searchArray() )
                        // toastr.error()
                        // $('.data-list-view').DataTable().row($(this).closest('td').parent('tr')).remove().draw();
                    }
                });
            }
        })
    });
</script>