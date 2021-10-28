<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('리스트입니다.') }}
    </h2>
    <button onclick=location.href="{{ route('posts.create') }}" type="button" class="btn btn-info hover:bg-blue-700 font-bold text-white">
        글쓰기
        <!-- 글을 작성할 수 있는 폼으로 이동 -->
    </button>
    </div>
    </x-slot>
    <x-posts-list :posts="$posts" />
    <!-- posts-list.blade를 index창에 표시해줌 컴포넌트에 balde파일이 있으면 이렇게 바로 쓰기 쌉가능-->
</x-app-layout>