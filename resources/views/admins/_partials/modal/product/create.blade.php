<!-- Modal New -->
@push('js-head')
    <script language="javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@endpush
<div aria-labelledby="myModalLabel" class="modal fade" id="addNewProduct" role="dialog" tabindex="-1">
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

                <form action=" {{ route('products.store') }}" enctype="multipart/form-data" method="POST" role="form">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">
                                Product Name
                            </label>
                            <input class="form-control" id="name" name="name" placeholder="Name of product" type="text" value="{{ old('name' )}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="category_id">
                                Category
                            </label>
                            <select name="category_id" class="form-control">
                                @foreach ($categoryList as $category)
                                <option value="{{ $category->id}}">
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                           <div class="form-group">
                            <label for="brand_id">
                                Brand
                            </label>
                            <select name="brand_id" class="form-control">
                                @foreach ($brandList as $brand)
                                <option value="{{ $brand->id}}">
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>                
                        <div class="form-group">
                            <label for="description">
                                Description
                            </label>
                            <textarea id="description" name="description" id="description" rows="8" class="form-control">
                            </textarea>
                            @push('script')
                             <script>
                               CKEDITOR.replace( 'description' );
                           </script>    
                        @endpush
                        </div>
                        <div class="form-group">
                            <label for="price">
                                Price
                            </label>
                            <input class="form-control" id="price" name="price" placeholder="Enter Unit" type="number" value="{{ old('proce' )}}" >
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="import_price">
                                Import Price
                            </label>
                            <input class="form-control" id="" name="import_price"  type="number" value="{{ old('import_price' )}}">
                            </input>
                        </div>
                           <div class="form-group">
                            <label for="quantity">
                                Quantity
                            </label>
                            <input class="form-control" id="" name="quantity"  type="number" value="{{ old('quantity' )}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="guarantee_duration">
                                Guaranee Duration
                            </label>
                            <input class="form-control" id="price" name="guarantee_duration" placeholder="Enter Unit" type="number" value="">
                            </input>
                        </div>
                        <div class="form-group">
                  
                            <div class="row">
                            <div class="col-md-4">
                                <div class="radio">
                                <label>
                                    <input checked="" id="" name="is_hot" type="radio" value="0">
                                        No Hot
                                    </input>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input id="" name="is_hot" type="radio" value="1">
                                        Hot
                                    </input>
                                </label>
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="radio">
                                <label>
                                    <input checked="" id="" name="is_new" type="radio" value="0">
                                        No New
                                    </input>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input id="" name="is_new" type="radio" value="1">
                                        New
                                    </input>
                                </label>
                            </div>
                            </div>
                            <div class="col-md-4">
                              <div class="radio">
                                <label>
                                    <input checked="" id="" name="is_available" type="radio" value="0">
                                        Not Available
                                    </input>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input id="" name="is_available" type="radio" value="1">
                                        Available
                                    </input>
                                </label>
                            </div>
                            </div>
                        </div>
                        </div>
                          <div class="form-group">
                            <label for="image">
                                Image
                            </label>
                            <input class="form-control" id="image" name="file" type="file">
                            </input>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">
                                Submit
                            </button>
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