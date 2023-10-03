<x-layout>
    <form  action="/comments/update/{{$comment->id}}" method="POST" class="container">
        @csrf
        @method('put')

        @csrf

        <label for="">Comment Here</label>
        <textarea name="body" class="form-control" id="" cols="30" rows="10">{{$comment->body}}</textarea>
        @error('body')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-3">Update Comment</button>
    </form>
</x-layout>