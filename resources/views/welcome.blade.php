<x-app-layout>
    <div @class(['container', 'py-4'])>

        <div @class(['mb-4', 'd-flex', 'gap-2'])>
            <a href="{{ route('user.avatar') }}" @class(['btn', 'btn-primary'])>Add Avatar</a>
            <a href="{{ route('create.index') }}" @class(['btn', 'btn-success'])>Add Post</a>
            
           @if(auth()->user()->primary == 1)
                <a href="{{ route('roles-permissions') }}" @class(['btn', 'btn-warning'])>
                    Create user
                </a>
            @endif

        </div>

        <div @class(['d-flex', 'align-items-center', 'mb-3', 'gap-3'])>
            @if($user->useravatar && $user->useravatar->picture)
                @php
                    $avatars = json_decode($user->useravatar->picture->picture, true);
                @endphp

                @foreach($avatars as $avatar)
                    <img src="{{ asset('storage/'.$avatar) }}"
                         @class(['rounded-circle', 'border'])
                         style="width:70px;height:70px;object-fit:cover;">
                @endforeach
            @else
                <div @class(['rounded-circle', 'bg-secondary'])
                     style="width:70px;height:70px;"></div>
            @endif

            <h5 @class(['mb-0'])>{{ $user->name }}</h5>
        </div>

        @forelse ($user->posts as $post)
            <div @class(['card', 'mb-4', 'shadow-sm'])>
                <div @class(['card-body'])>

                    <h6>Title: {{ $post->title }}</h6>
                    <p>Description: {{ $post->desc }}</p>

                    @if($post->picture)
                        @php
                            $images = json_decode($post->picture->picture, true);
                        @endphp

                        <div @class(['d-flex', 'flex-wrap', 'gap-2'])>
                            @foreach($images as $img)
                                <img src="{{ asset('storage/'.$img) }}"
                                    @class(['img-thumbnail'])
                                    style="width:120px;height:120px;object-fit:cover;">
                            @endforeach
                        </div>
                    @endif

                    <small @class(['text-muted'])>
                        Published: {{ $post->status }}
                    </small>

                </div>
            </div>
        @empty
            <p @class(['text-muted'])>Դու դեռ post չունես</p>
        @endforelse


    </div>
</x-app-layout>
