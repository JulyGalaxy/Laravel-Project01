<x-admin-layout>
    <form action="/admin/blogs/{{$blog->slug}}/update" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Title</label>
            <input value="{{old('title',$blog->title)}}" name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Slug</label>
            <input value="{{old('slug',$blog->slug)}}" name="slug" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Intro</label>
            <input value="{{old('intro',$blog->intro)}}" name="intro" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('intro')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Body</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{old('body',$blog->body)}}" </textarea>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Categories</label>
            <select name="category_id" class="form-control" name="" id="">
                @foreach($categories as $category)
                <option {{$category->id == old('category_id', $blog->category_id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-admin-layout>