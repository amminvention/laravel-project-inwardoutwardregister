<!-- sample modal content -->
<div class="modal fade viewOutwardDetails" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info" style="border-radius: 0;">
                <h4 class="modal-title" id="myLargeModalLabel"><i class="mdi mdi-file-chart fa-lg"></i> OUTWARD VIEW</h4>
                <button type="button" class="close remove-data-from-view-form" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="box-title text-info">Outward Detail</h5>
                <hr class="my-15">
                <div class="row">
                    <div class="col-md-6 pl-0">
                        <table style="clear: both" class="table outward-table">
                            <tbody>
                                <tr>
                                    <th class="w-p30">Outward Mode</th>
                                    <td id="out_mod"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Outward Date</th>
                                    <td id="out_dte"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Letter Ref. No</th>
                                    <td id="let_ref_no"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 pl-0 pb-0 mb-0">
                        <table style="clear: both" class="table outward-table">
                            <tbody>
                                <tr>
                                    <th class="w-p30">Outward No</th>
                                    <td id="out_no"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Inward No</th>
                                    <td id="in_no"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Letter Date</th>
                                    <td id="let_dte"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 pl-0 pt-0 mt-0">
                        <table style="clear: both" class="table outward-table">
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
                        <table style="clear: both" class="table outward-table outward-tab-space">
                            <tbody>
                                <tr>
                                    <th class="w-p30">Department</th>
                                    <td id="frm_dpt"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Person Name</th>
                                    <td id="frm_per_nm"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="box-title text-info">To Details</h5>
                        <hr class="my-15">
                        <table style="clear: both" class="table outward-table outward-tab-space">
                            <tbody>
                                <tr>
                                    <th class="w-p30">Name</th>
                                    <td id="to_nm"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Place</th>
                                    <td id="to_plc"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Adderess</th>
                                    <td id="to_add"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 class="box-title text-info">Courier Details</h5>
                <hr class="my-15">
                <div class="row">
                    <div class="col-md-6">
                        <table style="clear: both" class="table outward-table outward-tab-space">
                            <tbody>
                                <tr>
                                    <th class="w-p30">Courier</th>
                                    <td id="cor"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Receipt Date</th>
                                    <td id="cor_rec_dte"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Is Return</th>
                                    <td id="is_ret"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Return Reason</th>
                                    <td id="ret_res"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Created</th>
                                    <td id="crtd"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table style="clear: both" class="table outward-table outward-tab-space">
                            <tbody>
                                <tr>
                                    <th class="w-p30">Receipt No.</th>
                                    <td id="recpt_no"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Amount</th>
                                    <td id="amt"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Return Date</th>
                                    <td id="ret_dte"></td>
                                </tr>
                                <tr>
                                    <th class="w-p30">Description</th>
                                    <td id="desc"></td>
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
