{{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#sectionCreate" data-whatever="@mdo"><i class="fas fa-check"></i> Assign</button> --}}
<div class="modal" id="sectionCreate" tabindex="-1" role="dialog" aria-labelledby="sectionCreateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sectionCreateLabel">Create Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="complete" action="{{ route('setting.section.store') }}" accept-charset="UTF-8" style="display:inline">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input class="form-control" type="text" name="section" id="section" placeholder="Name your section">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit" class="btn btn-primary float-right">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>