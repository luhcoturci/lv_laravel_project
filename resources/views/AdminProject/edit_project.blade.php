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
    <h1 class="text-center mt-5">Edit Project (Admin)</h1>
    <hr>

    <div class="container justify-content-center mt-2 mb-5">

        <form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <img src="/images/{{$project->thumbnail}}" />
            </div>

            <div class="form-group m-2 p-2">
                <label for="Image">Upload Image</label>
                <input class="form-control"  type="file" name="thumbnail">
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_title">Project Title</label>
                <input class="form-control" type="text" name="title" value="{{$project->title}}">
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_description">Project Description</label>
                <textarea class="form-control" name="description" cols="30" rows="10">{{$project->description}}</textarea>
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_github_link">GitHub Link</label>
                <input class="form-control" type="text" name="github_link" value="{{$project->github_link}}">
            </div>

            <div class="form-group m-2 p-2">
                <label for="project_video_link">Video Link</label>
                <input class="form-control" type="text" name="youtube_link" value="{{$project->youtube_link}}">
            </div>

            <div class="form-group m-2 p-2">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group m-2 p-2">
                <label for="project_description">Skills</label>
                <textarea class="form-control" name="skills" cols="30" rows="10">{{$project->skills}}</textarea>
            </div>


            <button class="btn btn-success" type="submit" value="submit">Update Project</button>

        </form>

    </div>

    </div>
            </div>
        </div>
    </div>
</div>
@endsection

    