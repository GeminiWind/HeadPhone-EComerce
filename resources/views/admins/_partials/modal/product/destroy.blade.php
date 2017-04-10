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
                <form action="{{route('category.destroy', $category->id)}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <input name="_method" type="hidden" value="DELETE">
                        <div class="modal-body">
                            Are you sure to delete category {{ $category->name }}
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">
                                Yes, I m sure
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