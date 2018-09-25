@if(count($tasks))
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item">
                {{$task->title}}
                <form action="{{ url('tasks/'.$task->id) }}" method="post">
                    {{ csrf_field() }}
                    @method('DELETE')

                    <button class="btn btn-danger float-right">X</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <div class="card bg-light">
        <div class="card-body">No tasks to show.</div>
    </div>
@endif