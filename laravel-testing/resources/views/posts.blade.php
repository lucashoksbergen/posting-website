<x-layout>
    <x-slot:title>Posts</x-slot:title>
    <x-slot:heading>
        Posts
    </x-slot:heading>

    <ul>
        @foreach ($posts as $post)
            <h1 class="text-lg">{{ $post['title'] }}</h1>
            <p>{{ $post['content'] }}</p>
            <p class="text-xs">{{ $post['updated_at'] }}</p>
            <br>

        @endforeach
    </ul>
</x-layout>