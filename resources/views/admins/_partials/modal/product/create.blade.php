<!-- Modal New -->
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
                            <select name="category_id">
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
                            <select name="brand_id">
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
                            <textarea id="description" name="description" rows="8">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">
                                Price
                            </label>
                            <input class="form-control" id="price" name="price" placeholder="Enter Unit" type="number" value="{{ old('proce' )}}">
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
                        <div class="form-group">
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
                        <div class="form-group">
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
        <form action="/product/images/upload" class="dropzone" id="product-images" enctype="multipart/form-data">
                          <div>
                <h3>Upload Product Image For Products. </h3>
                <small>The first will be used as main image</small>
            </div>
        </form>
        @push('script')
            <script type="text/javascript">
                    Dropzone.options.productImages = {
                        maxFilesize         :       2,
                        acceptedFiles: ".jpeg,.jpg,.png,.gif"
                    };
            </script>
        @endpush
    </div>
</div>