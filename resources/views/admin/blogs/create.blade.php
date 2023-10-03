<x-admin-layout>
    <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Slug</label>
            <input name="slug" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Photo</label>
            <input name="photo" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" accept="image/*">
            @error('photo')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Intro</label>
            <input name="intro" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('intro')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Body</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Categories</label>
            <select name="category_id" class="form-control" name="" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-admin-layout>