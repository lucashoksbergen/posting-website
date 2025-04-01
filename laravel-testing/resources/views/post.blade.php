<x-layout>
    <x-slot:title>Post</x-slot:title>
    <x-slot:heading>
        Post
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $post['title'] }}</h2>

    <p class="text-xl"> {{ $post['content'] }}</p>
    <p> {{ $post->user->first_name }}</p>
    <p> {{ $post['updated_at'] }}</p>
    <br>

    <!-- Comments -->
    <ul id="comments">
        @foreach ($post->comments as $comment)
            <div class="border-2 border-solid">
                <p>{{ $comment['content'] }}</p>
                <p class="text-xs">
                    {{ $comment->user->first_name }}
                    <br> {{ $comment['updated_at'] }}
                </p>
            </div>
            <br>
        @endforeach
    </ul>

    <!-- Tags -->
    <ul id="tags">
        @foreach ($post->tags as $tag)
            <p>{{ $tag['name'] }}</p>
        @endforeach
    </ul>
</x-layout>