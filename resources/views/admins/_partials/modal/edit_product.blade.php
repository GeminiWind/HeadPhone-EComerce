<!-- Modal Update -->
                        <div aria-labelledby="myModalLabel" class="modal fade" id="editProductId{{ $product->id }}" role="dialog" tabindex="-1">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                    ×
                                    </span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                       Edit
                                    </h4>
                                 </div>
                                 <div class="modal-body">
                                   <form role="form" action="{{ route('products.edit',['id' => $product->id]) }}" method="GET" enctype="multipart/form-data">
                                    <input name="_method" type="hidden" value="PUT">
                                 {!! csrf_field() !!}
                                 <div class="box-body">
                                    <div class="form-group">
                                       <label for="name">Product Name</label>
                                       <input type="text" class="form-control" id="name" name="name"
                                          placeholder="Name of product" value="{{ $product->name}}">
                                    </div>
                                      <div class="form-group">
                 <label for="category_id">Category</label>
                 <select name="category_id">
                 @foreach ($categoryList as $category)
                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                 @endforeach
                    
                 </select>
                </div>
                                     <div class="form-group">
                 <label for="description">Description</label>
                 <textarea name="description" id="description" rows="8">{{ $product->description}}</textarea>
                </div>
                
                                     <br>
                                     <div>
                                     <div class="form-group">
                                       <label for="unit">Unit</label>
                                       <input type="text" class="form-control" id="unit" name="unit"
                                          placeholder="Enter Unit" value="{{ $product->unit }}">
                                    </div>
                                    <div class="form-group">
                                       <label for="price">Price</label>
                                       <input type="number" class="form-control" id="price" name="price"
                                          placeholder="Enter Unit" value="{{ $product->price }}">
                                    </div>
                                       
                                     <br>

                                    <div>
                                    <div class="form-group">
                 



                  <div class="radio">
                    <label>
                      <input name="is_available" id="" value="1" {{ ($product->is_available) ? 'checked' : ''}} type="radio">
                       Available
                    </label>
                  </div>
                  <div class="radio">
                   <label>
                      <input name="is_available" id="" value="0" {{ (!$product->is_available) ?'checked' : ''}} type="radio">
                      No Available
                    </label>
                  </div>



                  <div class="radio">
                    <label>
                      <input name="is_hot" id="" value="1" {{ ($product->is_hot) ? 'checked' : ''}} type="radio">
                       Hot
                    </label>
                  </div>
                  <div class="radio">
                   <label>
                      <input name="is_hot" id="" value="0" {{ (!$product->is_hot) ?'checked' : ''}} type="radio">
                      No Hot
                    </label>
                  </div>
                </div>
                        <div class="form-group">
                  <div class="radio">
                    <label>
                      <input name="is_new" id="" value="1" {{ ($product->is_new) ? 'checked' : ''}} type="radio">
                       New
                    </label>
                  </div>
                  <div class="radio">
                   <label>
                      <input name="is_new" id="" value="0" {{ (!$product->is_new) ? 'checked' : ''}} type="radio">
                      No New
                    </label>
                  </div>
                                      
                                    </div>
                  <div>
                   <br> 
                  </div>
                </div>
              
               
                                    <div class="form-group">
                                       <label for="image">Image</label>
                                       <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="box-footer">
                                       <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                 </div>
                              </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal" type="button">
                                    Close
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>