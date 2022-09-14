@extends('layouts.header')

@section('content')
<div class="container">
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex py-5">
            <div class="user justify-content-between d-flex">
                @php
                    $user = Auth::user($comment->user_id);
                    // dd($user);
                    $username = $user->name;
                    // $userimg = $user->profile_img;
                    
                @endphp
                <div class="thumb px-3">
                    <img src="{{asset('assets/img/blog/c1.jpg')}}" alt="">
                </div>
                <div class="desc">
                
                    <h5><a href="#">{{$username}}</a></h5>
                    <p class="date">{{$comment->created_at}} </p>
                    <p class="comment h4">
                        {{$comment->body}}
                    </p>
                </div>
            </div>

        </div>
    </div>
    <hr>
    <div class="comment-form mb-5">
        <h4>Reply Comment</h4>
        <form action="{{url('store/comment')}}" method="post">
          @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <input type="hidden" name="prev_url" value="{{$prevUrl}}">
            <div class="form-group">
                <textarea name ="body" class="form-control mb-10" rows="5" type="text" name="body" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
            </div>
            <button type="submit" class="primary-btn submit_btn" >Post Comment Reply</button>	
        </form>
    </div>
</div>
@endsection
