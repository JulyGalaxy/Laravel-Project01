<x-admin-layout>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <th scope="row">{{$blog->id}}</th>
                <td>{{$blog->title}}</td>
                <td>{{$blog->body}}</td>
                <td><button class="btn btn-warning"><a href="admin/blogs/{{$blog->slug}}/edit">Edit</a></button></td>
                <form action="/admin/blogs/{{$blog->slug}}/destroy" method="POST">
                    @csrf
                    @method('delete')
                    <td><button class="btn btn-danger">Delete</button></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$blogs->links()}}
</x-admin-layout>