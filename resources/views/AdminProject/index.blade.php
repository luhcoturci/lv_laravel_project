@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-center mt-5">Index (Admin)</h1>
    <hr>

    <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Gitub Link</th>
            <th scope="col">YouTube Link</th>
            <th scope="col">Skills</th>
            
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($projects as $project)

                <tr>

                    <th scope="row">{{$project->id}}</th>
                    <td>{{$project->title}}</td>
                    <td>{{$project->category->name}}</td>
                    <td>{{$project->description}}</td>
                    <td><img style="height: 150px; width: 200px;" src="/images/{{$project->thumbnail}}" /></td>
                    <td>{{$project->github_link}}</td>
                    <td>{{$project->youtube_link}}</td>
                    <td>{{$project->skills}}</td>
                    
                    <td>
                    <a class="btn btn-primary" href="{{route('admin.projects.edit', $project->id)}}">Edit</a>
                    
                        <div>
                            <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger" />
                            </form>
                        </div>
                    </td>


                </tr>

          @endforeach

        </tbody>
      </table>



                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    
