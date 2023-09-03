<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>user id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th width="20%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php($n=1)
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{$post->user_id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->description}}</td>
                                <td>
                                    <img src="{{asset('/')}}{{$post->image}}" style="width:40px; height:40px; border-radius:50%;" alt="">
                                </td>
                                <td>{{$post->category}}</td>
                                <td>
                                    <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
                                    <a href="{{route('posts.destroy',['id'=>$post->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this post?')"> <i class="fa fa-trash"></i> </a>
                                </td>

                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</x-app-layout>

