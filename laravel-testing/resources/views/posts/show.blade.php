<x-layout>
    <x-slot:title>Post</x-slot:title>
    <x-slot:heading>
        Post
    </x-slot:heading>

    <!-- Post -->
    <div class="border-2 border-solid rounded-md pt-8 pl-8 pr-8">
        <h2 class="font-bold text-lg">{{ $post['title'] }}</h2>

        <p class="text-xl"> {{ $post['content'] }}</p>
        <p> {{ $post->user->first_name }}</p>
        <p> {{ $post['updated_at'] }}</p>

        <br>
        @can('edit', $post)
            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method('PATCH')

                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <x-input-field name="title" placeholder="{{ $post->title }}"></x-input-field>
                    @error('title')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                    @enderror
                    <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                    <x-input-field name="content" placeholder="{{ $post->content }}" rows="4"></x-input-field>
                    @error('content')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message}}</p>
                    @enderror
                </div>
                <div class="mt-6 flex items-center justify-between gap-x-6 pb-4">
                    <div class="flex items-center">
                        <x-delete-button form="delete-post">Delete Post</x-delete-button>
                        </div>

                    <div class="flex items-center gap-x-6">
                        <x-submit-button>Save</x-submit-button>
                        </div>
                        </div>
            </form>
        @endcan

    </div>

    <!-- Comments -->
    <ul id="comments">
        @foreach ($post->comments as $comment)
            <div class="border-2 border-solid rounded-md p-2 ml-4 mt-2">
                <p>{{ $comment['content'] }}</p>
                <p class="text-xs">
                    {{ $comment->user->first_name }}
                    <br> {{ $comment['updated_at'] }}
                    @can('editcomment', $comment)
                        <div class="flex justify-end">
                            <form method="POST" action="{{ route('comments.destroy', [$post->id, $comment->id]) }}">
                                @csrf
                                @method('DELETE')
                                <x-delete-button>Delete Comment</x-delete-button>
                            </form>
                        </div>
                    @endcan

                </p>
            </div>
        @endforeach
    </ul>

    <!-- Tags -->
    <ul id="tags">
        @foreach ($post->tags as $tag)
            <p class="border-2 border-solid rounded-sm p-2 ml-4 mt-2">{{ $tag['name'] }}</p>
        @endforeach
    </ul>

    <!-- Create Comment -->
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        <h2 class="text-base/7 font-semibold text-gray-900 pt-6">Comment</h2>
        <div class="sm:col-span-4">
            <div class="mt-2">
                <div
                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input type="text" name="content" id="content"
                        class="block min-w-0 grow py-1.5 pr-3 px-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                        placeholder="..." required>
                </div>
                @error('content')
                    <p class=" text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror

            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>

    <!-- These forms are linked to a Save and a Delete button earlier on the page through matching ids -->
    <form method="POST" action="{{ route('posts.destroy', $post->id)}}" id="delete-post" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <form method="POST" action="/posts/ {{ $post->id }}" id="edit-post" class="hidden">
        @csrf
        @method('PATCH')
    </form>

</x-layout>