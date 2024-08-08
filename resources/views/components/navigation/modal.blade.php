<div class="modal fade" id="{{$id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Information sur le Document <b>#{{($document)->nom}}</b></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-border-style table-hover">
                @php
                $content = $content?:[];
                @endphp
                @foreach($document->fields()->get() as $key=>$val)
                        <tr>
                            <th>
                                {{$val->label}}
                            </th>
                            <td>
										 {{$val->pivot->content}}
{{--                                {{$val}}--}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="ti ti-x"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>
