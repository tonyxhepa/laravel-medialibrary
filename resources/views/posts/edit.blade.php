<x-main>
    <div class="max-w-6xl mx-auto mt-12">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
                    <div class="mt-1">
                        <input type="text" id="title" name="title" value="{{ $post->title }}"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Post Image </label>
                    <div class="mt-1">
                        <input type="file" id="image" name="image"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Post Image Download </label>
                    <div class="mt-1">
                        <input type="file" id="image" name="download"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <div class="sm:col-span-6 pt-5">
                    <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                    <div class="mt-1">
                        <textarea id="body" rows="3" name="body"
                            class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        {{ $post->body }}
                        </textarea>
                    </div>
                </div>
                <div class="sm:col-span-6 pt-5">
                    <button type="submit" class="px-4 py-2 rounded bg-indigo-500 hover:bg-indigo-700">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-main>
