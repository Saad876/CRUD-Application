<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            <b>Greetings ! {{\Illuminate\Support\Facades\Auth::user()->name}}</b>
            <b style="float: right;"><span><i class="fas fa-users fa-lg"></i></span>
                <span class="badge rounded-pill badge-notification bg-danger"
                      style="color: #fff;">{{count($users)}}</span>
            </b>
        </h2>
    </x-slot>

    <div class="container mt-10">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 1)
            @foreach($users as $key)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$key->name}}</td>
                    <td>{{$key->email}}</td>
                    <td>{{Carbon\Carbon::parse($key->created_at)->diffForHumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
