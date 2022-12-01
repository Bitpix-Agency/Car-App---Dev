<div>
    <div class="row mt-5 mb-5" id="account">
        <div class="col-md-12">
            <div class="bg-light-grey p-5 border-radius-20">
                <h5>Users attached to your account</h5>
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="border-0">
                    @foreach($invitedUsers as $user)
                        <tr class="py-5">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a wire:click="remove({{$user->id}})" class="text-orange">Remove</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
