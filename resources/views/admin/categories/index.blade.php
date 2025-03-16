<x-admin-master>
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h3 class="mb-0 mx-2">Categories</h3>
            <a href="#" data-url="{{ route('admin.categories.create') }}" data-title="Add Category"
                data-btn-text="Save" class="btn btn-primary">Add Category</a>
        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-hover table-bordered table-striped']) !!}
        </div>
    </div>
    @push('scripts')
        {!! $dataTable->scripts() !!}
        <script>
            $(document).ready(function() {
                $(document).on('submit', '#addCategoryForm', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    let url = "{{ route('admin.categories.store') }}";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#ajaxModal').modal('hide');
                            let table = $("#data-table");
                            table.DataTable().ajax.reload();
                            toastr.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            $(".errorClass").text('');
                            $(".form-control").removeClass('is-invalid');
                            if (xhr.status == 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $("#" + key).addClass("is-invalid");
                                    $("#" + key + "Error").text(value);
                                });
                            }
                        }
                    });
                });

                $(document).on('submit', '#editCategoryForm', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    let id = $('#editCategorySave').data('id');
                    let url = "{{ route('admin.categories.update', '/id') }}";
                    url = url.replace('/id', id);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#ajaxModal').modal('hide');
                            let table = $("#data-table");
                            table.DataTable().ajax.reload();
                            toastr.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            $(".errorClass").text('');
                            $(".form-control").removeClass('is-invalid');
                            if (xhr.status == 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $("#" + key).addClass("is-invalid");
                                    $("#" + key + "Error").text(value);
                                });
                            } else {
                                toastr.error(xhr.responseText);
                            }
                        }
                    });
                });

                $(document).on('click', '.delete-btn', function(e) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            e.preventDefault();
                            let id = $(this).data('id');
                            let url = "{{ route('admin.categories.destroy', '/id') }}";
                            url = url.replace('/id', id);
                            $.ajax({
                                type: "DELETE",
                                url: url,
                                success: function(response) {
                                    toastr.success(response.message);
                                    let table = $("#data-table");
                                    table.DataTable().ajax.reload();
                                },
                                error: function(xhr, status, error) {
                                    toastr.error(xhr.responseText);
                                }
                            });
                        }
                    });
                });

            });
        </script>
    @endpush
</x-admin-master>
