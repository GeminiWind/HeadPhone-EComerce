@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('js-head')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="js/admin/myscript.js"></script>
@endpush
@extends('layouts.admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 901px;">
   <div style="padding: 0px; background: white; z-index: 999999; font-size: 16px; font-weight: 600;">
   </div>

   <section class="content">
      @if (Session::has('flash_message'))
      <div class="alert alert-success">
         {{session('flash_message')}}
      </div>

      @endif
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
                  Category Management
                  <button class="btn btn-primary pull-primary" data-target="#addNewCategory" data-toggle="modal" style="margin-right: 5px;" type="button">
                     <i class="fa fa-plus">
                     </i>
                     Add new category
                  </button>
                  <!-- Modal New -->
                  <div aria-labelledby="myModalLabel" class="modal fade" id="addNewCategory" role="dialog" tabindex="-1">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                 <span aria-hidden="true">
                                    ×
                                 </span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel">
                                 Add new category
                              </h4>
                           </div>
                           <div class="modal-body">
                              <form role="form" action="{{route('category.store')}}" method="POST">
                                 {!! csrf_field() !!}
                                 <div class="box-body">
                                    <div class="form-group">
                                       <label for="name">Category Name</label>
                                       <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Nhập tên thể loại" value="{{ old('name' )}}">
                                    </div>
                                    <div class="form-group">
                                       <label for="name">Description</label>
                                       <textarea class="form-control" placeholder="Nhap mo ta cho Category" name="description" >{{ old('description' )}}</textarea>
                                    </div>
                                    <div class="box-footer" style="text-align: right;">
                                       <button type="submit" class="btn btn-primary">Xác nhận</button>
                                       <button class="btn btn-default" data-dismiss="modal" type="button"> Close </button>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                 </div>
                              </form>
                           </div>
                           
                        </div>

                     </div>
                  </div>
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
                           Name
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
                     @foreach($cateData as $category)
                     <tr class="{{($i%2==0)? 'odd': 'even'}}" role="row">
                        <td class="sorting_1">
                           {{++$i}}
                        </td>
                        <td>
                           {{ $category->name }}
                        </td>
                        <td>
                           {{ $category->description }}
                        </td>
                        <td>
                           <button class="btn btn-danger pull-right" data-target="#deleteCategoryId{{ $category->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                              <i class="fa fa-trash">
                              </i>
                              Delete
                           </button>
                           <button class="btn btn-info pull-right" data-target="#editCategoryId{{ $category->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                              <i class="fa fa-pencil">
                              </i>
                              Edit
                           </button>
                        </td>

                        <!-- Modal Update -->
                        <div aria-labelledby="myModalLabel" class="modal fade" id="editCategoryId{{ $category->id }}" role="dialog" tabindex="-1">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                       <span aria-hidden="true">
                                          ×
                                       </span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                       Edit Category Description
                                    </h4>
                                 </div>
                                 <div class="modal-body">
                                    <form role="form" action="{{route('category.update', $category->id)}}" method="POST">
                                       {!! csrf_field() !!}
                                       {{-- {!! method_field('PUT') !!} --}}
                                       <input name="_method" type="hidden" value="PUT">
                                       <div class="box-body">
                                          <div class="form-group">
                                             <label for="description">Description</label>
                                             <textarea class="form-control" placeholder="Nhap mo ta cho Category" name="description">
                                                {{$category->description}}
                                             </textarea>
                                          </div>
                                       </div>
                                       
                                       <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">
                                             Xác nhận
                                          </button>
                                          <button class="btn btn-default" data-dismiss="modal" type="button">
                                             Close
                                          </button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End Modal Update -->

                        <!-- Modal Delete -->
                        <div aria-labelledby="myModalLabel" class="modal fade" id="deleteCategoryId{{ $category->id }}" role="dialog" tabindex="-1">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                       <span aria-hidden="true">
                                          ×
                                       </span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                       Warning
                                    </h4>
                                 </div>
                                 <div class="modal-body">
                                    <form role="form" action="{{route('category.destroy', $category->id)}}" method="POST">
                                       {!! csrf_field() !!}
                                       <input name="_method" type="hidden" value="DELETE">
                                       <div class="modal-body">
                                          Are you sure to delete category {{ $category->name }}
                                       </div>
                                       <div class="modal-footer">

                                          <button type="submit" class="btn btn-primary" >
                                             Yes, I m sure
                                          </button>
                                          <button class="btn btn-default" data-dismiss="modal" type="button">
                                             Close
                                          </button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End Modal Delete -->
                        <td>
                           {{$category->created_at->diffForHumans()}}
                        </td>
                        <td>
                           {{$category->updated_at->diffForHumans()}}
                        </td>
                     </tr>
                     @endforeach
                     <tfoot>
                        <tr>
                           <th colspan="1" rowspan="1">
                              No
                           </th>
                           <th colspan="1" rowspan="1">
                              Name
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