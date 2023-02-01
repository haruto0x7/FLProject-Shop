<!-- Add Modal -->
<div class="modal fade text-left" id="modal-style-add-in" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Style</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-style" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="style_title">Title</label>
                        <input type="text" class="form-control" id="style_title" name="style_title"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="style_title">Prices</label>
                        <input type="number" class="form-control" id="style_prices" name="style_prices"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="style_title">Youtube Url</label>
                        <input type="text" class="form-control" id="style_youtube_url" name="style_youtube_url"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="style_status">Type</label>
                        <select class="form-control" id="style_status" name="style_status">
                            <option value="Active">Active</option>
                            <option value="Block">Block</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="info-content">Comment</label>
                        <textarea class="form-control" id="style_comment" name="style_comment" rows="5"></textarea>
                    </div>
                </form>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="fn_submit_add_style();">Save Style</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal End -->
<!-- Edit Modal -->
<div class="modal fade text-left" id="modal-style-edit-in" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Style</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-style" method="post">
                    @csrf
                    <input type="hidden" name="edit_style_id" id="edit_style_id">
                    <div class="form-group">
                        <label class="form-label" for="style_title">Title</label>
                        <input type="text" class="form-control" id="edit_style_title" name="edit_style_title"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="style_title">Prices</label>
                        <input type="number" class="form-control" id="edit_style_prices" name="edit_style_prices"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="style_title">Youtube Url</label>
                        <input type="text" class="form-control" id="edit_style_youtube_url" name="edit_style_youtube_url"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="style_status">Type</label>
                        <select class="form-control" id="edit_style_status" name="edit_style_status">
                            <option value="Active">Active</option>
                            <option value="Block">Block</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="style-comment">Comment</label>
                        <textarea class="form-control" id="edit_style_comment" name="edit_style_comment" rows="5"></textarea>
                    </div>
                </form>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="fn_submit_edit_style();">Save Style</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal End -->