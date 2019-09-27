@extends('layouts.app')


@section('content')
<section class="content-header">
      <h1>
        NOTIFICATION
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

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Notification List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            @foreach($notif as $ntf)
                @if($ntf->STATUS == '1')
                <div class="alert alert-warning alert-dismissible">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                    <h4><i class="icon fa fa-warning"></i>{{$ntf->table_hardwares->LABEL_HARDWARE}}, {{$ntf->NOTIF}}</h4>
                </div>
                @else
                <div class="alert alert-success alert-dismissible">
                        {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                        <h4><i class="icon fa fa-check"></i>{{$ntf->table_hardwares->LABEL_HARDWARE}}, {{$ntf->NOTIF}}</h4>
                </div>
                @endif
            @endforeach
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
@endsection
