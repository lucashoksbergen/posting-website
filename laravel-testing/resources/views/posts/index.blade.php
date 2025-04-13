<x-layout>
    <x-slot:title>Posts</x-slot:title>
    <x-slot:heading>
        Posts
    </x-slot:heading>

    @auth
        <form method="POST" action="/posts">
            @csrf

            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Create new
                Post</label>
            <x-input-field name="title" rows="1"></x-input-field>
            <x-input-field name="content" rows="4"></x-input-field>

            <div class="mt-2 mb-2 flex items-center justify-start">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    @endauth
    
    @guest
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Log In or Register to create a
            new
            Post</label>
    @endguest

    <ul>
        @foreach ($posts as $post)
            <a href="/posts/{{ $post['id'] }}" class="hover:underline">
                <h1 class="text-lg">{{ $post['title'] }}</h1>
                <p>{{ $post['content'] }}</p>
                <p class="text-xs">{{ $post->user['first_name'] }}</p>
                <p class="text-xs">{{ $post['updated_at'] }}</p>
            </a>
            <br>
        @endforeach
    </ul>



</x-layout>