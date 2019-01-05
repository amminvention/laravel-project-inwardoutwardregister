<!-- sample modal content -->
<div class="modal fade viewInwardDetails" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info" style="border-radius: 0;">
                <h4 class="modal-title" id="myLargeModalLabel"><i class="mdi mdi-file-chart fa-lg"></i> INWARD VIEW</h4>
                <button type="button" class="close remove-data-from-view-form" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="box-title text-info">Inward Detail</h5>
                <hr class="my-15">
                <div class="row">
                    <div class="col-md-6 pl-0">
                        <table style="clear: both" class="table inward-table">
                            <tbody>
                                <tr>
                                    <th class="w-p30">ID</th>
                                    <td id="id"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Inward Mode Name</th>
                                    <td id="in_mod_nm"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Inward Date</th>
                                    <td id="in_dte"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Outward No</th>
                                    <td id="out_no"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 pl-0 pb-0 mb-0">
                        <table style="clear: both" class="table inward-table">
                            <tbody>
                                <tr>
                                    <th class="w-p30">Letter Date</th>
                                    <td id="let_dte"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Inward No</th>
                                    <td id="in_no"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Receive Date</th>
                                    <td id="rec_dte"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Letter No</th>
                                    <td id="let_no"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 pl-0 pt-0 mt-0">
                        <table style="clear: both" class="table inward-table">
                            <tbody>
                                <tr class="pt-0 mt-0">
                                    <th class="pt-0 mt-0 w-p15">Subject</th>
                                    <td class="pt-0 mt-0" id="sub"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="box-title text-info">From Details</h5>
                        <hr class="my-15">
                        <table style="clear: both" class="table inward-table inward-tab-space">
                            <tbody>
                                <tr>
                                    <th class="w-p30">From Name</th>
                                    <td id="frm_nm"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">From Address</th>
                                    <td id="frm_add"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="box-title text-info">To Details</h5>
                        <hr class="my-15">
                        <table style="clear: both" class="table inward-table inward-tab-space">
                            <tbody>
                            <tr>
                                <th class="w-p30">Department</th>
                                <td id="dept"></td>
                            </tr>
                            <tr>
                                <th class="w-p30">Person Name</th>
                                <td id="per_nm"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 class="box-title text-info">Courier Details</h5>
                <hr class="my-15">
                <div class="row">
                    <div class="col-md-6">
                        <table style="clear: both" class="table inward-table inward-tab-space">
                            <tbody>
                            <tr>
                                <th class="w-p30">Courier</th>
                                <td id="cor"></td>
                            </tr>
                            <tr>
                                <th class="w-p30">Description</th>
                                <td id="desc"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table style="clear: both" class="table inward-table inward-tab-space">
                            <tbody>
                            <tr>
                                <th class="w-p30">Created</th>
                                <td id="crtd"></td>
                            </tr>
                            <tr>
                                <th class="w-p30">Modified</th>
                                <td id="modf"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
