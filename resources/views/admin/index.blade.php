@extends('layout.appLayout')
@section('content')
    @include('layout.navbar')
    @include('admin.include.side-bar')

    <div class="p-4 sm:ml-64">
        <div class="mt-3">
            <div class="grid grid-cols-3 gap-4 mb-4">
                @include('admin.include.widget', [
                    'title'=> 'Post Totali',
                    'data' => $totalPosts,
                    'icon' =>'fa-solid fa-paper-plane'

                ])   
                @include('admin.include.widget', [
                    'title' => 'Utenti Totali',
                    'data' => $totalUsers,
                    'icon' =>'fa-solid fa-users'
                ])             
                @include('admin.include.widget', [
                    'title' => 'Commenti Totali',
                    'data' => $totalComments,
                    'icon' =>'fa-solid fa-comments'

                ])             
            </div>       
        </div>
    </div>

@endsection
  
  