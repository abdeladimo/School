<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group">
        <label class="form-label">Salaire</label>
        <input type="number" step="0.01" min="0" class="form-control"
            value="{{ ($employee->salaire != null) ? $employee->salaire : '' }}" name="salaire">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="form-group">
        <label class="form-label">Date d'embauche</label>
        <input type="date" class="datepicker-default form-control"
            value="{{ ($employee->date_embauche != null) ? $employee->date_embauche : \Carbon\Carbon::now()->toDateString() }}" id="date-embauche"
            name="date_embauche">
    </div>
</div>
