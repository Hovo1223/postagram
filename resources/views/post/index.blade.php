<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">
        <div class="w-full max-w-xl bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">
                Create Post
            </h2>

            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Title
                    </label>
                    <input type="text" name="title" id="title"
                        class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Enter title">
                    @if ($errors->has('title'))
                        <div class="alert alert-success">{{ $errors->first('title') }}</div>
                    @endif
                </div>

                <div>
                    <label for="desc" class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>
                    <textarea name="desc" id="desc" rows="4"
                        class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Write something..."></textarea>
                    @if ($errors->has('desc'))
                        <div class="alert alert-success">{{ $errors->first('desc') }}</div>
                    @endif
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                        Image
                    </label>
                    <input type="file" name="picture[]" id="image"
                        class="block w-full text-sm text-gray-500
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-lg file:border-0
                               file:text-sm file:font-semibold
                               file:bg-indigo-50 file:text-indigo-700
                               hover:file:bg-indigo-100 image"
                        multiple>
                    <div class="review"></div>
                    @if ($errors->has('picture'))
                        <div class="alert alert-success">{{ $errors->first('picture') }}</div>
                    @endif
                </div>
                    <input type="datetime-local" name="published_at">

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold
                               hover:bg-indigo-700 transition duration-200">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    $('.image').on('change', function() {
        $('.review').html('');
        let files = this.files;

        if (!files.length) return;

        $.each(files, function(index, file) {

            let reader = new FileReader();

            reader.onload = function(e) {
                $('.review').append(
                    `<img src="${e.target.result}"
                      style="width:120px; margin:5px; border:1px solid #ccc;">`
                );
            };

            reader.readAsDataURL(file);
        });
    });
</script>
