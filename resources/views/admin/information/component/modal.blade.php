<!-- Add Modal -->
<div class="modal fade text-left" id="modal-info-add-in" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-info" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="info_title">Title</label>
                        <input type="text" class="form-control" id="info_title" name="info_title"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="info-content">Content</label>
                        <textarea class="form-control" id="info_content" name="info_content" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="info_type">Type</label>
                        <select class="form-control" id="info_type" name="info_type">
                            <option value="Notice">Notice</option>
                            <option value="Faq">Faq</option>
                            <option value="Plan">Plan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="info_title">Prices</label>
                        <input type="text" class="form-control" id="info_prices" name="info_prices"/>
                    </div>
                </form>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="fn_submit_add_info();">Save Info</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal End -->
<!-- Edit Modal -->
<div class="modal fade text-left" id="modal-info-edit-in" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-info" method="post">
                    @csrf
                    <input type="hidden" name="edit_info_id" id="edit_info_id">
                    <div class="form-group">
                        <label class="form-label" for="edit_info_title">Title</label>
                        <input type="text" class="form-control" id="edit_info_title" name="edit_info_title"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_info_content">Content</label>
                        <textarea class="form-control" id="edit_info_content" name="edit_info_content" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_info_type">Type</label>
                        <select class="form-control" id="edit_info_type" name="edit_info_type">
                            <option value="Notice">Notice</option>
                            <option value="Faq">Faq</option>
                            <option value="Plan">Plan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_info_create">Create</label>
                        <input type="text" class="form-control" id="edit_info_create" name="edit_info_create" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit_info_update">Update</label>
                        <input type="text" class="form-control" id="edit_info_update" name="edit_info_update" readonly/>
                    </div>
                </form>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="fn_submit_edit_info();">Save Info</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal End -->