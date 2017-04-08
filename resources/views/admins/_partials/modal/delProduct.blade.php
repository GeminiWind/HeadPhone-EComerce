<!-- Modal Update -->
                        <div aria-labelledby="myModalLabel" class="modal fade" id="editProductId1{{ $product->id }}" role="dialog" tabindex="-1">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                    ×
                                    </span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                       Delete
                                    </h4>
                                 </div>
                                 <div class="modal-body">
                Are you sure to delete category {{ $product->name }}
            </div>
            <div class="modal-footer">
                
                <form action="{{route('products.destroy',['id' => $product->id])}}" method="_method" accept-charset="utf-8">
                <button class="btn btn-default " data-dismiss="modal" type="button">
                    Close
                </button>
                    <input type="hidden" name="_method" value="DELETE">
                    {!! csrf_field() !!}
                    <input type="submit" class="btn btn-danger" value="Ok">
                    
                </a>
                </form>

            </div>
                                