@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @include('include.messages')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Add Bookmark
                    </button>
                        <hr>
                        <h3>My Bookmarks</h3>
                        <ul class="list-group">
                          @foreach($bookmarks as $bookmark)
                            <li class="list-group-item clearfix">
                              <a href="{{$bookmark->url}}" target="_blank" style="position:absolute;top:30%">{{$bookmark->name}} <span class="label label-default">{{$bookmark->description}}</span></a>
                              <span class="pull-right button-group">
                                 <button data-id="{{$bookmark->id}}" type="button" class="delete-bookmark btn btn-danger" name="button"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                              </span>
                            </li>
                          @endforeach
                        </ul>
                        
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('bookmarks.store') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Bookmark Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Bookmark URL</label>
                                        <input type="text" class="form-control" name="url">
                                    </div>
                                    <div class="form-group">
                                        <label>Website Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
