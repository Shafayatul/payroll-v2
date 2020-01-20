<!-- The Modal -->
<div class="modal fade" id="company-{{ $company->id }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Company</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        {!! Form::model($company, [
            'method' => 'PATCH',
            'url' => route('companies.update', $company->id),
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}

        @include ('companies.form', ['formMode' => 'edit'])

        {!! Form::close() !!}
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>