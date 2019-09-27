@extends('layouts.app')


@section('content')
<section class="content-header">
      <h1>
        HARDWARES
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>

     <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box  box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Hardware</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ URL('addHardware') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
                <form>
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="inputLabelHardware">Label Hardware</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="inputLabelHardware" id="inputLabelHardware" placeholder="Enter Label Hardware">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="inputGsmNumber">Gsm Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="inputGsmNumber" id="inputGsmNumber" placeholder="Enter Gsm Number">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="status">Status</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="status" id="status" placeholder="Enter Status">
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputLokasi">Lokasi</label>
                        <div class="col-sm-9">
                            <div id="googleMap" style="width:100%;height:380px;"></div>
                        </div>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">List Hardware LPJU : </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="hardwaresTable">
                        <thead>
                            <th>NO</th>
                            <th>LABEL HARDWARE</th>
                            <th>GSM NUMBER</th>
                            <th>ACTIONS</th>

                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
        <div class="modal fade" id="detailModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title hardware-label"></h4>
                </div>
                <div class="modal-body">
                 <label class="col-sm-3 control-label">No GSM :</label>
                 <div class="col-sm-9 gsm"></div>
                  <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">List Detail Hardware LPJU : </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <table class="table table-bordered table-striped" id="detailHardwaresTable">
                                            <thead>
                                                <th>NO</th>
                                                <th>TANGGAL & WAKTU</th>
                                                <th>AKTIVITAS</th>
                                            </thead>
                                        </table>
                                    </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" id="closeDetail">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          <!-- Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Edit Hardware</h4>
            </div>
                    <form class="form-horizontal" id="editModalForm" action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="inputLabelHardware">Label Hardware</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputLabelHardware2" id="inputLabelHardware2" placeholder="Enter Label Hardware">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="inputGsmNumber">Gsm Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputGsmNumber2" id="inputGsmNumber2" placeholder="Enter Gsm Number">
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="status">Status</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="status2" id="status2" placeholder="Enter Status">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="inputLokasi">Lokasi</label>
                            <div class="col-sm-9">
                                <div id="googleMap" style="width:100%;height:380px;"></div>
                            </div>
                        </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                            <button type="button" id="closeEdit" class="btn btn-default">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
          </div>
        </div>
      </div>
</section>]
<script>
    $(document).ready(function () {
        $('#hardwaresTable').on('click','.detail',function(){
          $('#detailModal').modal('toggle');
            var id=$(this).data('id');

                $.ajax({
                    url : "{{ url('hardwareDataDetail') }}",
                    method : "POST",
                    dataType: 'json',
                    data : { _token: "{{csrf_token()}}", id : id},
                    success :function(data){
                            $('.hardware-label').html(data.LABEL_HARDWARE);
                            $('.gsm').html(data.GSM_NUMBER);
                            function2(id);
                            tablex.clear().draw();

                    }
            });
        });

        function function2(id){
            var tablex = $('#detailHardwaresTable').DataTable({
                "processing": true,
                "serverSide": true,
                "destroy": true,
                "ajax":{
                         "url": "{{ url('detailHardwareData') }}",
                         "dataType": "json",
                         "type": "POST",
                         "data":function (d) {
              d.id = id;
              d._token = "{{csrf_token()}}";
        },
                       },
                "columns": [
                    { "data": "NO" },
                    { "data": "DATE" },
                    { "data": "AKTIVITAS" }
                ]

            });
        };

        $('#hardwaresTable').on('click','.delete',function(){

            var id=$(this).data('id');
            var table = $('#hardwaresTable').DataTable();
            $.ajax({
                url : "{{ url('deleteHardware') }}/" +id,
                type : "POST",
                dataType: 'json',
                data : {_method: 'delete', _token: "{{csrf_token()}}", id : id},
                success :function(){
                    table.clear().draw();
                    console.log("Success");

                }
            });

        });
        });
        $('#closeDetail').on('click',function(){

            $('#editModal').modal('toggle');

        });
        $('#hardwaresTable').on('click','.edit',function(){
            $('#editModal').modal('toggle');
            var id=$(this).data('id');

                $.ajax({
                    url : "{{ url('hardwareDataDetail') }}",
                    method : "POST",
                    dataType: 'json',
                    data : { _token: "{{csrf_token()}}", id : id},
                    success :function(data){
                            $('#editModalForm').attr('action', "{{ URL('editHardware') }}/" +id);
                            $('#inputLabelHardware2').val(data.LABEL_HARDWARE);
                            $('#inputGsmNumber2').val(data.GSM_NUMBER);
                            $('#status2').val(data.CHAR_HARDWARE);

                    }
            });

        });
        $('#closeEdit').on('click',function(){

            $('#editModal').modal('toggle');

        });
    </script>

<!-- /.content -->
@endsection
