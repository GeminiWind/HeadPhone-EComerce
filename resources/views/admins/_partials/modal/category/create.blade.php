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
                <form action="{{route('category.store')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">
                                Category Name
                            </label>
                            <input class="form-control" id="name" name="name" placeholder="Nhập tên thể loại" type="text" value="{{ old('name' )}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Description
                            </label>
                            <textarea class="form-control" name="description" placeholder="Nhap mo ta cho Category">
                                {{ old('description' )}}
                            </textarea>
                        </div>
                        <div class="box-footer" style="text-align: right;">
                            <button class="btn btn-primary" type="submit">
                                Xác nhận
                            </button>
                            <button class="btn btn-default" data-dismiss="modal" type="button">
                                Close
                            </button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>