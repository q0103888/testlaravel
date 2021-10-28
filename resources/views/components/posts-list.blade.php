<div class="m-4 p-4">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">제조회사</th>
                <th scope="col">자동차 명</th>
                <th scope="col">제조년도</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
              <tr>
                <td><a href="{{ route('posts.show',['post'=>$post->id]) }}">{{ $post->made }}</a></td>
                <td>{{ $post->carname }}</td>
                <td>{{ $post->makeyear}}</td>
              </tr>
            @endforeach
            <div class="mt-5">
              {{ $posts->links() }}
          </div>
          </tbody>
        </table>
  </div>