<!-- Modal Delete -->
<div aria-labelledby="myModalLabel" class="modal fade" id="deleteEventId{{ $event->id }}" role="dialog" tabindex="-1">
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
                <label for="name">
                    Delete  this event ?
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <form accept-charset="utf-8" action="{{route('events.destroy',['id' => $event->id])}}" method="POST">
                
               
                     <button class="btn btn-default " data-dismiss="modal" type="button">
                    Close
                </button>
                 <input name="_method" type="hidden" value="DELETE">
                    {!! csrf_field() !!}
                    <input class="btn btn-danger" type="submit" value="Ok">
                    </input>
            </form>
        </div>
    </div>
</div>
