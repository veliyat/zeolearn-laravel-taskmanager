<form action="/tasks" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="task" class="col-form-label">Add Task</label>
        <input type="text" name="title" id="task" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}">
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    </div>
    
    <button class="btn btn-primary">Add Task</button>
</form>