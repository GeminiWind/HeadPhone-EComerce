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
                <form action="{{route('category.update', $category->id)}}" method="POST" role="form">
                    {!! csrf_field() !!}
                                       {{-- {!! method_field('PUT') !!} --}}
                    <input name="_method" type="hidden" value="PUT">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="description">
                                    Description
                                </label>
                                <textarea class="form-control" name="description" placeholder="Nhap mo ta cho Category">
                                    {{$category->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">
                                Xác nhận
                            </button>
                            <button class="btn btn-default" data-dismiss="modal" type="button">
                                Close
                            </button>
                        </div>
                    </input>
                </form>
            </div>
        </div>
    </div>
</div>