<x-layout>
  <!-- singloe blog section -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <img src="https://i.pinimg.com/originals/a2/40/d2/a240d2f715ab072d9256faf6d9a962ed.jpg" class="card-img-top" alt="..." />
        <h3 class="my-3">{{$blog->title}}</h3>
        <div>
          <div>
            @auth
            <form action="{{route('blogs.toggle',$blog->slug)}}" method="POST">
              @csrf
              @if($blog->isSubscribed())
              <button class="btn btn-danger">Unsubscribe</button>
              @else
              <button class="btn btn-warning">Subscribe</button>
              @endif
            </form>
            @endauth
          </div>
          <div>Author - <a href="/authors/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
          <div><a href="/categories/{{$blog->category->slug}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a></div>
          <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
        </div>
        <p class="lh-md mt-3">
          {{$blog->body}}
        </p>
      </div>
    </div>
  </div>

  @auth
  <div class="container">
    <div class="col-md-8 mx-auto">
      <form action="/blogs/{{$blog->slug}}/comments" method="POST">

        @csrf

        <label for="">Comment Here</label>
        <textarea name="body" class="form-control" id="" cols="30" rows="10"></textarea>
        @error('body')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-3">Comment</button>
      </form>
    </div>
  </div>
  @endauth
  <x-comments :comments="$blog->comments()->latest()->get()" />
  <x-subscribe />
  <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />

</x-layout>