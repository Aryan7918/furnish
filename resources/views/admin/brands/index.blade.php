<x-admin-master>
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h3 class="mb-0 mx-2">Brands</h3>
            <a href="#" data-url="{{ route('admin.brands.create') }}" data-title="Add Brand" data-btn-text="Update"
                class="btn btn-primary">Add Brand</a>
        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-hover table-bordered table-striped']) !!}
        </div>
    </div>
    @push('scripts')
        {!! $dataTable->scripts() !!}
        <script>
            $(document).ready(function() {
                $(document).on('submit', '#addBrandForm', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    let url = "{{ route('admin.brands.store') }}";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            let table = $("#data-table");
                            table.DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });

                $(document).on('submit', '#editBrandForm', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    let id = $('#editBrandSave').data('id');
                    let url = "{{ route('admin.brands.update', '/id') }}";
                    url = url.replace('/id', id);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            let table = $("#data-table");
                            table.DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });

                $(document).on('click', '.delete-btn', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    let url = "{{ route('admin.brands.destroy', '/id') }}";
                    url = url.replace('/id', id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function(response) {
                            let table = $("#data-table");
                            table.DataTable().ajax.reload();
                        }
                    });

                })
            });
        </script>
    @endpush
</x-admin-master>
