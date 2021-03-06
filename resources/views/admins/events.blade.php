@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('js-head')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
@extends('layouts.admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 901px;">
   <div style="padding: 0px; background: white; z-index: 999999; font-size: 16px; font-weight: 600;">
   </div>
   <section class="content">
      @if (count($errors)>0)
      <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
         {{ $error}}
         @endforeach
      </div>
      @endif
      <div class="row">
         <div class="col-xs-12">
            <div class="box-header">
               <h3 class="box-title">
                  Event Management
                  <button class="btn btn-primary pull-primary" data-target="#addNewEvent" data-toggle="modal" style="margin-right: 5px;" type="button">
                     <i class="fa fa-plus">
                     </i>
                     Add new events
                  </button>
                  <!-- Modal New -->
               @include('admins._partials.modal.event.create')
               </h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
               <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                  <thead>
                     <tr role="row">
                        <th aria-controls="example1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" class="sorting_asc" colspan="1" rowspan="1" style="width: 135px;" tabindex="0">
                           No
                        </th>
                        <th aria-controls="example1" aria-label="Browser: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 170px;" tabindex="0">
                           Rate
                        </th>
                          <th aria-controls="example1" aria-label="Browser: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 170px;" tabindex="0">
                           Begin At
                        </th>
                          <th aria-controls="example1" aria-label="Browser: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 170px;" tabindex="0">
                           End At
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Description
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Options
                        </th>
                        <th aria-controls="example1" aria-label="Engine version: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 115px;" tabindex="0">
                           Created At
                        </th>
                        <th aria-controls="example1" aria-label="CSS grade: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 81px;" tabindex="0">
                           Last Updated
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     @php($i=0)
                     @foreach($events as $event)
                     <tr class="{{($i%2==0)? 'odd': 'even'}}" role="row">
                        <td class="sorting_1">
                           {{++$i}}
                        </td>
                        <td>
                           {{ $event->rate }}
                        </td>
                        <td>
                           {{ $event->began_at }}
                        </td>
                        <td>
                           {{ $event->ended_at }}
                        </td>
                        <td>
                           {{ $event->description }}
                        </td>
                        <td>
                           <button class="btn btn-danger pull-right" data-target="#deleteEventId{{ $event->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                              <i class="fa fa-trash">
                              </i>
                              Delete
                           </button>
                           <button class="btn btn-info pull-right" data-target="#editEventId{{ $event->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                              <i class="fa fa-pencil">
                              </i>
                              Edit
                           </button>
                        </td>

                        <!-- Modal Update -->
                        @include('admins._partials.modal.event.edit', ['event' => $event])
                        <!-- End Modal Update -->

                        <!-- Modal Delete -->
                        @include('admins._partials.modal.event.destroy', ['event' => $event])
                        <!-- End Modal Delete -->
                        <td>
                           {{$event->created_at->diffForHumans()}}
                        </td>
                        <td>
                           {{$event->updated_at->diffForHumans()}}
                        </td>
                     </tr>
                     @endforeach
                     <tfoot>
                        <tr>
                           <th colspan="1" rowspan="1">
                              No
                           </th>
                           <th colspan="1" rowspan="1">
                              Rate
                           </th>
                            <th colspan="1" rowspan="1">
                              Began At
                           </th>
                            <th colspan="1" rowspan="1">
                              Ended At
                           </th>
                           <th colspan="1" rowspan="1">
                              Description
                           </th>
                           <th colspan="1" rowspan="1">
                              Actions
                           </th>
                           <th colspan="1" rowspan="1">
                              Create At
                           </th>
                           <th colspan="1" rowspan="1">
                              Last Updated
                           </th>
                        </tr>
                     </tfoot>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
@stop
@push('js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}">
</script>
@endpush
@push('script')
<script>
 $(function () {
  $("#example1").DataTable();
});
</script>
@endpush