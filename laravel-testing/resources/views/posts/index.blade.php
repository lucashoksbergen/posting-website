<x-layout>
    <x-slot:title>Posts</x-slot:title>
    <x-slot:heading>
        Posts
    </x-slot:heading>

    <ul>
        @foreach ($posts as $post)
            <a href="/posts/{{ $post['id'] }}" class="hover:underline">
                <h1 class="text-lg">{{ $post['title'] }}</h1>
                <p>{{ $post['content'] }}</p>
                <p class="text-xs">{{ $post['updated_at'] }}</p>
            </a>
            <br>
        @endforeach
    </ul>

    

</x-layout>