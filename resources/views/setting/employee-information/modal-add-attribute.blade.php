{{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#attributeCreate" data-whatever="@mdo"><i class="fas fa-check"></i> Assign</button>
<div class="modal" id="attributeCreate" tabindex="-1" role="dialog" aria-labelledby="attributeCreateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="attributeCreateLabel">Add an attribute to {{ $section->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="complete" action="{{ route('setting.attribute.store') }}" accept-charset="UTF-8" style="display:inline">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                                <input class="form-control" type="text" name="attribute" id="attribute" placeholder="Name your attribute">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <select class="select-chosen form-control" placeholder="What type of attribute is this?">
                                <option value="" disabled selected>What type of attribute is this?</option>
                                @foreach ($section->attributeType() as $i => $attributeType)
                                <option value="{{ $i }}">{{ $attributeType }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <div class="_333holGKf6kP50GkaibUzr">
                                <label class="uniqueid">Unique Id</label>
                                <input data-test-id="edit-attribute-restriction-is-unique" type="checkbox">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="section_id" value="{{ $section->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit" class="btn btn-primary float-right">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}