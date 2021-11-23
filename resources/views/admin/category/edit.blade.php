<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            <b style="color: red;"><i class="far fa-folder-open"></i>&nbsp;All Categories!</b>
            <b style="float: right;">Total Categories: <span><i class="far fa-folder-open"></i></span>
                <span class="badge rounded-pill badge-notification bg-danger" style="color: #fff;"></span></b>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark text-white border-primary">
                        @if(session('storesuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><i class="fas fa-thumbs-up"></i> {{ session('storesuccess') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header bg-primary"> Update Category</div>
                        <div class="card-body">
                            <form action="{{url('category/update/'.$edit->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="{{$edit->category_name}}">

                                    @error('category_name')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror


                                </div>

                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>

                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>
</x-app-layout>
