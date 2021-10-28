<div class="container">
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <div class="card" style="width: 100%; margin:10px">
        @if($post->image)
        <img src="{{'/storage/images/'.$post->image }}"
            class="card-img-top" alt="my post image">
        @else
            <span>첨부 이미지 없음</span>
        @endif
        <ul class="list-group list-group-flush">
          <li class="list-group-item">제조회사: {{ $post->made }}</li>
          <li class="list-group-item">자동차명: {{ $post->carname}}</li>
          <li class="list-group-item">제조년도: {{ $post->makeyear}}</li>
          <li class="list-group-item">가격: {{ $post->price }}</li>
          <li class="list-group-item">차종: {{ $post->carmodel }}</li>
          <li class="list-group-item">외형: {{ $post->appearance }}</li>
          <li class="list-group-item">등록일: {{ $post->created_at->diffForHumans() }}</li>
          <li class="list-group-item">변경일: {{ $post->updated_at->diffForHumans() }}</li>
        </ul>
        <div class="card-body flex">
          <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="card-link">수정하기</a>
          <form id="form" class="ml-4" method="post">
              
            @csrf
            @method('delete')
            {{-- <input type="hidden" name="_method" value="delete"> --}}
            <button type="submit">삭제하기</button>
          </form>
        </div>
      </div>
  
      {{-- <div class="card mt-2 mb-5" style="width: 100%; margin:10px">
        <comment-list :post="{{ $post }}"
                  :loginuser="{{ auth()->user()->id }}"/>
      </div> --}}
  </div>
  
  