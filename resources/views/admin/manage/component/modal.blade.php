<!-- Modal to add new user starts-->
<div class="modal modal-slide-in new-user-modal fade" id="modals-users-in">
    <div class="modal-dialog">
        <form class="edit-user modal-content pt-0" id="form-edit-user">
            @csrf
            <input type="hidden" id="user_id" name="user_id">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="user_name">User Name</label>
                    <input type="text" id="user_name" class="form-control dt-uname" name="user_name" readonly/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="user_email">User Email</label>
                    <input type="text" id="user_email" class="form-control dt-email" name="user_email" readonly/>
                    <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                </div>
                <div class="form-group">
                    <label class="form-label" for="user_role">User Role</label>
                    <select id="user_role" class="form-control" name="user_role">
                        <option value="Admin">Admin</option>
                        <option value="Seller">Seller</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="user_statuss">User Status</label>
                    <select id="user_status" class="form-control" name="user_status">
                        <option value="Active">Active</option>
                        <option value="Block">Block</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="user_join">User Join</label>
                    <input type="text" id="user_join" class="form-control dt-uname" name="user_join" readonly/>
                </div>
                <button type="button" class="btn btn-primary mr-1 data-submit" onclick="fn_submit_user()">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal to add edit user Ends-->