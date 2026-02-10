<x-app-layout>
    <div class='d-flex container' style='width:100%'>
        {{-- user --}}
        <form action="{{ route('create_user') }}" method="post">
            @csrf
            <div class="form user-reg container pt-2">
                <h1 class='d-flex justify-content-center'>User</h1>
                <div class="group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter User Name" class='form-control'
                        required>
                </div>

                <div class="group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter User Email"
                        class='form-control' required>
                </div>

                <div class="group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter User password"
                        class='form-control' required>
                </div>

                <div class="group">
                    <label for="conf_password">conf Password</label>
                    <input type="password" id="conf_password" name="password_confirmation"
                        placeholder="Enter User password" class='form-control' required>
                </div>

                <div class='pt-3'>
                    <button type="submit" class='btn border'>Create User</button>
                </div>
            </div>
        </form>

        <div class='d-flex flex-column justify-content-between' style="width:100%">
            {{-- role --}}
            <form action="{{ route('create_role') }}" method="post">
                @csrf
                <div class="form container pt-2">
                    <h1 class='d-flex justify-content-center'>Roles</h1>
                    <div class="group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Role Name"
                            class='form-control' required>
                    </div>


                    <div class='pt-3'>
                        <button type="submit" class='btn border'>Create Role</button>
                    </div>
                </div>
            </form>

            {{-- permission --}}
            <form action="{{ route('create_permission') }}" method="post">
                @csrf
                <div class="form container pt-2">
                    <h1 class='d-flex justify-content-center'>Permission</h1>
                    <div class="group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Permission Name"
                            class='form-control' required>
                    </div>
                    <div class='pt-3'>
                        <button type="submit" class='btn border'>Create Permission</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
        @if (!empty($users))
            <div class='pt-4 container'>
                <table class='table'>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                    </tr>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>


                        </tr>
                    @endforeach
                </table>
            </div>
        @endif

    <style>
        form {
            display: block;
            padding-left: 20px;
            width: 100%;
        }

        .form {
            border: solid 1px;
            padding: 10px
        }

        .group {
            padding-top: 20px;
        }
    </style>
</x-app-layout>
