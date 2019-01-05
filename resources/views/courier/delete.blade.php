<form action="" method="POST" class="remove-record-model">
    <div class="modal fade deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure?
                @csrf
            </div>
            <div class="modal-footer m-0 p-0" style="overflow: hidden">
                <div class="clearfix">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-block pl-35 pr-35 remove-data-from-delete-form" data-dismiss="modal">No, Keep it</button>
                        <button type="submit" class="btn btn-danger btn-block mt-0 pl-35 pr-35">Yes, delete it</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</form>