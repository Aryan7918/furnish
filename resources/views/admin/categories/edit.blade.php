<form id="editCategoryForm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 mb-2">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
            <div class="text-danger errorClass" id="nameError"></div>
        </div>
        <div class="col-12 mb-2">
            <label for="parent_id">Parent Category</label>
            <div class="my-1">
                <select name="parent_id" id="parent_id" class="form-control select2" style="min-width: 300px;">
                    <option value="">Select Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}
                            {{ $cat->id == $category->id ? 'disabled' : '' }}>
                            {{ Str::ucfirst($cat->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-danger errorClass" id="parent_idError"></div>
        </div>
        <div class="col-12 mb-2">
            <label for="status">Status <span class="text-danger">*</span></label>
            <div class="my-1">
                <select name="status" id="status" class="form-control select2 w-100">
                    <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="text-danger errorClass" id="statusError"></div>
    </div>
    <div class="modal-footer mx-0">
        <button type="submit" id="editCategorySave" data-id="{{ $category->id }}"
            class="btn btn-primary">Update</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $('#ajaxModal'),
            minimumResultsForSearch: 5,
            width: '200px'
        });
    });
</script>
