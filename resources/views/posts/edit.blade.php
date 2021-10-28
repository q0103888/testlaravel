<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글수정하기') }}
            </h2>
            <button onclick=location.href="{{ route('posts.show', ['post'=>$post->id]) }}" type="button" class="btn btn-info hover:bg-blue-700 font-bold text-white">
                자세히보기
            </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
        <form id="editForm" class="row g-3" action="{{ route('posts.update', ['post'=>$post->id]) }}"
                    method="post"
                    enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="col-12 m-2">
                <label for="title" class="form-label">제조회사</label>
                <input type="text" name="made" class="form-control" id="made"  value="{{ $post->made }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">자동차 이름</label>
                <input type="text" name="carname" class="form-control" id="carname"  value="{{ $post->carname }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">제조년도</label>
                <input type="text" name="makeyear" class="form-control" id="makeyear"  value="{{ $post->makeyear }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">가격</label>
                <input type="text" name="price" class="form-control" id="price"  value="{{ $post->price }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">차종</label>
                <input type="text" name="carmodel" class="form-control" id="carmodel"  value="{{ $post->carmodel }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">외형</label>
                <input type="text" name="appearance" class="form-control" id="appearance"  value="{{ $post->appearance }}">
            </div>












            {{-- <div class="col-12 m-2">
                <label for="content" class="form-label">글 내용</label>
                <textarea class="form-control"
                name="content"
                id="content">{{$post->content }}</textarea>
                @error('content')
                <div class="text-red-800">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div> --}}


            <div class="col-12 m-2">
                @if($post->image)
                <div class="flex">
                    <img class="w-20 h-20 rounded-full" src="{{'/storage/images/'.$post->image }}"
                    class="card-img-top" alt="my post image">
                    <button onclick="return deleteImage({{ $post->id }})" class="btn btn-danger  h-10 mx-2 my-2">이미지 삭제</button>
                </div>
                @else
                    <span>첨부 이미지 없음</span>
                @endif

                <label for="image" class="form-label">첨부 이미지</label>
                <input type="file" name="image" class="form-control"
                            id="image">
            </div>
            <div class="col-12 m-2">
            <button type="submit" class="btn btn-primary">글수정</button>
            </div>
        </form>

    </div>
</x-app-layout>
