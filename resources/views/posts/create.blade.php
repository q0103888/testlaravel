<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('포스트 작성.') }}
        </h2>
        <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-info hover:bg-blue-700 font-bold text-white">
            목록으로 돌아가기
        </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
        <form class="row g-3" action="{{ route('posts.store') }}"
                    method="post" 
                    enctype="multipart/form-data">
            @csrf
            <div class="col-12 m-2">
                <label for="title" class="form-label">제조사</label>
                <input type="text" name="made" class="form-control" id="made" 
                            placeholder="제조사 입력"
                            value="{{ old('made') }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">자동차 이름</label>
                <input type="text" name="carname" class="form-control" id="carname" 
                            placeholder="자동차 명 입력 "
                            value="{{ old('carname') }}">   
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">제조년도</label>
                <input type="text" name="'makeyear" class="form-control" id="'makeyear" 
                            placeholder="제조년도 입력"
                            value="{{ old('makeyear') }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">가격</label>
                <input type="text" name="price" class="form-control" id="price" 
                            placeholder="가격입력"
                            value="{{ old('price') }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">차종</label>
                <input type="text" name="carmodel" class="form-control" id="carmodel" 
                            placeholder="차종 입력"
                            value="{{ old('carmodel') }}">
            </div>

            <div class="col-12 m-2">
                <label for="title" class="form-label">외형</label>
                <input type="text" name="appearance" class="form-control" id="appearance" 
                            placeholder="외형 입력"
                            value="{{ old('appearance') }}">
            </div>

            <div class="col-12 m-2">
                <label for="image" class="form-label">첨부 이미지</label>
                <input type="file" name="image" class="form-control" 
                            id="image" value="{{ old('image') }}">
            </div>    
            <div class="col-12 m-2">
            <button type="submit" class="btn btn-primary">글저장</button>
            </div>
        </form>
    </div>
    </x-app-layout>