<div class="flex items-center justify-center shadow-lg my-5">
    <form 
        action="/comment" 
        method="POST" 
        enctype="multipart/form-data"
        class="w-full max-w-xl bg-white rounded-lg px-4 pt-2"
    >
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea 
                    class="bg-gray-100 rounded border border-gray-400 
                    leading-normal resize-none w-full h-20 py-2 px-3 font-medium
                    placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="comment" 
                    placeholder="Type Your Comment">
                </textarea>
            </div>
            <div class="-mr-1">
                <button 
                    class="bg-white text-gray-700 font-medium py-1 
                    px-4 border border-gray-400 rounded-lg tracking-wide mr-1
                    hover:bg-gray-100"
                    type="submit">
                    Post Comment
                </button>
            </div>
        </div>
    </form>
</div>

{{-- Comment List --}}

<div class="mx-auto max-w-screen-sm">
    <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>


    @foreach ($comments as $comment)
    <div class="space-y-4">
        <div class="flex">
            <div class="felx-shrink-0 mr-3">
                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
            </div>
            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                <strong>{{ $comment->user->name }}</strong>
                <span class="text-xs text-gray-400">3:35 PM</span>
                <p class="text-sm">
                    {{ $comment->comment }}
                </p>
 
                @if (count($comment->replies) > 0)
                <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>
                    @foreach ($comment->replies as $reply)
                    <div class="space-y-4 mb-2">
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                            </div>
                            <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4
                            leading-relaxed">
                            <strong></strong>
                            <span class="text-xs text-gray-400">3:35 PM</span>
                            <p class="text-sm">
                                Reply Body
                            </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

                
                
            </div>
        </div>
    </div>
    @endforeach
  

</div>