{{-- Comments --}}
<div class="comments-area">
    @if (isset($comments))
        @foreach ( $comments as $comment)
            <div class="comment-list" @if($comment->parent_id != null) class="left-padding" @endif>
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        @php
                            $user = Auth::user($comment->user_id);
                            // dd($user);
                            $username = $user->name;
                            // $userimg = $user->profile_img;
                        @endphp
                        
                        <div class="thumb">
                            <img src="{{asset('assets/img/blog/c1.jpg')}}" alt="">
                        </div>
                        <div class="desc">
                        
                            <h5><a href="#">{{$username}}</a></h5>
                            <p class="date">{{$comment->created_at}} </p>
                            <p class="comment">
                                {{$comment->body}}
                            </p>
                        </div>
                    </div>
                    <div class="reply-btn">
                           <a href="{{'comment/reply/' . $post_id ."/" .$comment->id}}" class="btn-reply text-uppercase">reply</a> 
                    </div>
                </div>
            </div>
            @if (isset($comment->parent_id))
                {{-- @if ($comment->parent_id = $comment->id) --}}
                    @include('partials.commentRepliesDisplay', ['comments' => $comment->replies, 'post_id' => $post->id])
                {{-- @endif --}}
                
            @endif
        @endforeach
        	
    @endif
    
    {{-- <div class="comment-list left-padding">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="img/blog/c2.jpg" alt="">
                </div>
                <div class="desc">
                    <h5><a href="#">Elsie Cunningham</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                        Never say goodbye till the end comes!
                    </p>
                </div>
            </div>
            <div class="reply-btn">
                   <a href="" class="btn-reply text-uppercase">reply</a> 
            </div>
        </div>
    </div>	
    <div class="comment-list left-padding">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="img/blog/c3.jpg" alt="">
                </div>
                <div class="desc">
                    <h5><a href="#">Annie Stephens</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                        Never say goodbye till the end comes!
                    </p>
                </div>
            </div>
            <div class="reply-btn">
                   <a href="" class="btn-reply text-uppercase">reply</a> 
            </div>
        </div>
    </div>	
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="img/blog/c4.jpg" alt="">
                </div>
                <div class="desc">
                    <h5><a href="#">Maria Luna</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                        Never say goodbye till the end comes!
                    </p>
                </div>
            </div>
            <div class="reply-btn">
                   <a href="" class="btn-reply text-uppercase">reply</a> 
            </div>
        </div>
    </div>	
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="img/blog/c5.jpg" alt="">
                </div>
                <div class="desc">
                    <h5><a href="#">Ina Hayes</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                        Never say goodbye till the end comes!
                    </p>
                </div>
            </div>
            <div class="reply-btn">
                   <a href="" class="btn-reply text-uppercase">reply</a> 
            </div>
        </div>
    </div>	                                             				 --}}
</div>