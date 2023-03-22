<div id="setCustomStatusModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title">
                    <i class="ti-user"></i>Statusni yaratish
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-2 col-sm-12">
                    <div class="input-group">
                        <div class="input-group-prepend user-status-emoji">
                            <input type="text" class="form-control" id="userStatusEmoji">
                        </div>
                        <input type="text" class="form-control" id="userStatus"
                               placeholder="{{ __('messages.whats_your_status') }}...">
                    </div>
                    <div class="col-sm-12 my-2 p-0 text-right">
                        <button type="button" class="btn btn-primary" id="setUserStatus">Saqlash</button>
                        <button type="button" class="btn btn-secondary" id="clearUserStatus">Statusni tozalash</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>