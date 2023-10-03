<div class="card d-flex p-3 my-3 shadow-sm">
    <div class="d-flex">
        <div>
            <img src="https://i.pravatar.cc/300" width="50" height="50" class="rounded-circle" alt="">
        </div>
        <div class="ms-3">
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <h6>{{$comment->user->name}}</h6>
                    @can('edit',$comment)
                    <a href="/comments/edit/{{$comment->id}}" class="btn btn-warning">Edit</a>
                    @endcan

                    @can('edit',$comment)
                    <form action="/comments/delete/{{$comment->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
            <p class="text-secondary">{{$comment->created_at->diffForHumans()}}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</div>