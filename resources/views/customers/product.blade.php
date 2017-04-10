@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('plugns/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('js-head')
    <script src="{{ asset('plugns/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
@extends('layouts.admin.master')
@section('content')
 @if (session('statusCreateProduct')=='success' || session('statusUpdateProduct')=='success' || session('statusDeleteProduct')=='success')
  <script type="text/javascript">
  swal({
    title: "Success!",
    text: "Action Success !",
    type: "success",
    timer:1000,
    confirmButtonText: "OK"
  });
  </script>
   @endif
   @if( count($errors) >0 )
   <script type="text/javascript">
  swal({
    title: "Whoops!",
    text: "Look like something went wrong !",
    type: "error",
    confirmButtonText: "OK"
  });
  @endif
  </script>
<div class="content-wrapper" style="min-height: 901px;">
   <div style="padding: 0px; background: white; z-index: 999999; font-size: 16px; font-weight: 600;">
   </div>
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box-header">
               <h3 class="box-title">
                  Product Management
                  <button class="btn btn-primary pull-primary" data-target="#addNewProduct" data-toggle="modal" style="margin-right: 5px;" type="button">
                  <i class="fa fa-plus">
                  </i>
                  Add new prdouct
                  </button>

               @include('admins._partials.modal.create_product')
               </h3>
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                {{ $err }}
                    <br>
                        {{-- expr --}}
                @endforeach
                    </br>
                </div>
                @endif
            @if (session('thongbao'))
            <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>

              {{-- expr --}}
            @endif
            <!-- /.box-header -->
            <div class="box-body">
               <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                  <thead>
                     <tr role="row">
                        <th aria-controls="example1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" class="sorting_asc" colspan="1" rowspan="1" style="width: 135px;" tabindex="0">
                           No
                        </th>
                        <th aria-controls="example1" aria-label="Browser: activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 170px;" tabindex="0">
                           Img
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Name
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Category
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Price
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Unit
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Hot
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           New
                        </th>
                       {{--  <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Sale
                        </th> --}}
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Description
                        </th>
                        <th aria-controls="example1" aria-label="Task : activate to sort column ascending" class="sorting" colspan="1" rowspan="1" style="width: 148px;" tabindex="0">
                           Tool
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
                     <?php $i=0?>
                     @foreach($products as $product)
                     <tr class="{{($i%2==0)? 'odd': 'even'}}" role="row">
                        <td class="sorting_1">
                           {{++$i}}
                        </td>
                        <td>
                           <img src="{{ asset($product->url_image) }}" width="100px" height="100px">
                        </td>
                        <td>
                           {{ $product->name }}
                        </td>
                         <td>
                           {{ $product->category->name }}
                        </td>
                         
                         <td>
                           {{ $product->price }}
                        </td>
                         <td>
                           {{ $product->unit }}
                        </td>
                         <td>
                           {{ ($product->is_hot) ? 'Hot' : 'No' }}
                        </td>
                         <td>
                           {{ ($product->is_new) ? 'New' : 'No' }}
                        </td>
                          {{-- <td>
                           {{ $product->isAloneSaleNow() ? 'On Sale'.$product->getRateAloneSaleNow()->rate :'No Sale'   }}
                        </td> --}}
                         <td>
                           {{ str_limit($product->description, $limit = 100, $end = "...") }}
                        </td>
                        
                        <td>
                          <button class="btn btn-success pull-right" data-target="#markAsSaleFromNow{{ $product->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                           <i class="fa fa-gift">
                           </i>
                           </button>


                           <button class="btn btn-info pull-right" data-target="#editProductId{{ $product->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                           <i class="fa fa-pencil">
                           </i>
                           </button>



                           {{--  <button class="btn btn-danger pull-right" data-target="#editProductId1{{ $product->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                           <i class="fa fa-trash">
                           </i>
                           </button> --}}
                           <button class="btn btn-danger pull-right" data-target="#deleteProductId{{ $product->id }}" data-toggle="modal" style="margin-right: 5px;" type="button">
                           <i class="fa fa-trash">
                           </i>
                           </button>
                           
                           
                           @include('admins._partials.modal.delete_product', ['product' => $product ])
                           @include('admins._partials.modal.create_alone_sale',['product' => $product ])
                          @include('admins._partials.modal.edit_product', ['product' => $product ])
                          {{-- @include('admins._partials.modal.delProduct', ['product' => $product ]) --}}
                          
                          
                        </td>
                        <td>
                           {{ str_limit($product->created_at, $limit = 100, $end = "...") }}
                        </td>
                         <td>
                           {{ str_limit($product->updated_at, $limit = 100, $end = "...") }}
                        </td>
                        {{-- <td>
                           {{$product->created_at->diffForHumans()}}
                        </td>
                        <td>
                           {{$product->updated_at->diffForHumans()}}
                        </td> --}}
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
                           Tool
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