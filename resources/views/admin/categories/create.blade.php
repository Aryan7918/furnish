<form id="addCategoryForm" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 mb-2">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control">
            <div class="text-danger errorClass" id="nameError"></div>
        </div>
        <div class="col-12 mb-2">
            <label for="parent_id">Parent Category</label>
            <div class="my-1">
                <select name="parent_id" id="parent_id" class="form-control select2" style="min-width: 300px;">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label for="status">Status <span class="text-danger">*</span></label>
        <div class="my-1">
            <select name="status" id="status" class="form-control select2 w-100">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
    </div>
    </div>
    <div class="modal-footer mx-0">
        <button type="submit" id="addCategorySave" class="btn btn-primary">Submit</button>
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
