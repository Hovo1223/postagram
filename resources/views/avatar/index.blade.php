<x-app-layout>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{route('avatar.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mb-4">
                            <input type="file" name="picture[]" class="image" multiple>
                            <div class="review" ></div>
                        </div>
                        <div class='d-flex justify-center'>
                            <button type="submit" class='btn btn-primary'>Create avatar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>


<script>
$('.image').on('change', function () {
    $('.review').html('');

    let file = this.files[0];

    let preview = URL.createObjectURL(file);

    $('.review').html(`<img src="${preview}" class="img-fluid rounded mt-2">`);
});


</script>

<style>
    .review {
        display:flex;
        justify-content:center;
        padding-top:20px;
    }

    .review img {
        border-radius:100px !important;
        width: 150px;
        height: 150px;;
    }
</style>
