<!-- Modal New -->
<div aria-labelledby="myModalLabel" class="modal fade" id="editEventId{{ $event->id }}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Edit Event
                </h4>
            </div>
            <div class="modal-body">
                <form action="{{route('events.update', $event->id)}}" enctype="multipart/form-data" method="POST" role="form">
                    {!! method_field('PUT')!!}
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_id">
                                Product
                            </label>
                            <select name="product_id">
                                @foreach ($productList as $product)
                                <option value="{{ $product->id}}" {{ ($event->product->id==$product->id) ? 'selected' : ''}}>
                                    {{$product->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rate">
                                Rate
                            </label>
                            <input class="form-control" id="qty" name="rate" placeholder="Enter qty" type="number" value="{{ $event->rate }}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="began_at">
                                Began At
                            </label>
                            <input class="form-control" id="began_at" name="began_at"  type="date" value="{{ $event->began_at}}">
                            </input>
                        </div>
                       <div class="form-group">
                            <label for="ended_at">
                                End At
                            </label>
                            <input class="form-control" id="ended_at" name="ended_at"  type="date" value="{{ $event->ended_at }}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="description">
                                Description
                            </label>
                            <textarea name="description" rows="10">{{ $event->description }}</textarea>
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