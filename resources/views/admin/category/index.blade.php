<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            <b style="color: red;"><i class="far fa-folder-open"></i>&nbsp;All Categories!</b>
            <b style="float: right;">Total Categories: <span><i class="far fa-folder-open"></i></span>
                <span class="badge rounded-pill badge-notification bg-danger" style="color: #fff;"></span><span
                    class="badge rounded-pill badge-notification bg-danger"
                    style="color: #fff;">{{count($categories)}}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-dark text-white border-primary">
                        @if(session('storesuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><i class="fas fa-thumbs-up"></i> {{ session('storesuccess') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header bg-primary"> Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp">

                                    @error('category_name')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror


                                </div>

                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>

                        </div>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card bg-dark text-white border-primary">

                        <div class="card-header border-primary bg-primary"> All Category</div>
                        <div class="card-body">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($latest as $cat)
                                    <tr>
                                        <th scope="row">{{$latest->firstItem()+$loop->index}}</th>
                                        <td>{{$cat->category_name}}</td>
                                        <td>{{$cat->user->name}}</td>
                                        <td>{{$cat->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{url('category/edit/'.$cat->id)}}" title="Edit"
                                               class="btn btn-info"><i
                                                    class="fas fa-trash-restore"></i></a>
                                            <a href="{{url('softdelete/category/'.$cat->id)}}" title="Soft Delete"
                                               class="btn btn-danger"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfooter>

                                </tfooter>
                            </table>
                            <div class="card-footer bg-transparent border-success text-light">{{$latest->links()}}</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{--        Soft Delete Area--}}
        @if(count($trash))
            <div class="container mt-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-dark text-white border-primary">

                            <div class="card-header border-primary bg-primary"> Trash Category List</div>
                            <div class="card-body">
                                <table class="table table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($trash as $cate)
                                        <tr>
                                            <th scope="row"> {{$i++}} </th>
                                            <td> {{ $cate->category_name }} </td>
                                            <td> {{ $cate->user->name }} </td>
                                            <td>
                                                @if($cate->created_at == NULL)
                                                    <span class="text-danger"> No Date Set</span>
                                                @else
                                                    {{ $cate->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/restore/'.$cate->id) }}"
                                                   class="btn btn-warning" title="Restore"><i
                                                        class="fas fa-trash-restore"></i></a>
                                                <a href="{{ url('pdelete/category/'.$cate->id) }}"
                                                   class="btn btn-success" title="Confirm Delete"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfooter>

                                    </tfooter>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
