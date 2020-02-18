@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Ticket System Project - Ticket Page</h1>
    <hr>
    <br>
      <h2>Messages From Customers</h2>
    <br>
      <div class="container">
          <div class="row"></div>
          <div class="card bg-light offset-md-4" style="max-width: 25rem;">
              <div class="card-header"><h4>Search Form</h4></div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <form action="{{ url('searchticket') }}" method="GET">
                            @csrf
                            <div class="form-group row">
                                <label for="reference" class="col-sm-3 col-form-label">Reference</label>
                                <div class="col-sm-5">
                                  <input type="search" name="search_ticket" class="form-control" id="reference" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleinfo">Info</button>

                                 <!-- Modal -->
                                 <div class="modal fade" id="exampleinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fab fa-wordpress fa-3x"></i> Search information!</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>So you want to search for a reference !?</h5>
                                            <p>In the search bar input either a reference you know that is of type <br><b>"xx-yyy"</b> or you must search for <b>"sales/techical" !</b></p>
                                            <p>Have fun !!!</p><i class="fab fa-phoenix-framework fa-3x"></i>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                           </div>
                        </form>
                    </div>{{-- d-flex justify-content-center --}}
    
                </div>{{-- card-body --}}
            </div>{{-- card bg-light mb-3 --}}
          </div>{{-- row--}}

            <br>

          <div class="row">
              <div class="col-sm offset-md-3" style="max-width: 35rem;">
                <section>
                        {{-- @foreach($posts as $post) --}}
                            <ul class="list-group">
                                <li class="list-group-item active text-left">ID : {{ $posts->number }}</li>
                                <li class="list-group-item text-left list-group-item-info">
                                  State Ticket : 
                                        @if ($status == '["Opened"]')
                                           <button type="button" class="btn btn-success btn-sm">Opened</button>
                                        @elseif ($status == '["Closed"]')
                                           <button type="button" class="btn btn-secondary btn-sm">Closed</button>
                                        @else
                                           <button type="button" class="btn btn-secondary btn-sm">Closed</button>   
                                        @endif
                                </li>
                                <li class="list-group-item text-left list-group-item-info">Department : {{ $posts->department }}</li>
                                <li class="list-group-item text-left list-group-item-info">Email : {{ $posts->email }}</li>
                                <li class="list-group-item text-left list-group-item-info">Subject : {{ $posts->subject }}</li>
                                <li class="list-group-item text-left list-group-item-info">Message : {{ $posts->message }}</li>
                            </ul>
                        {{-- @endforeach    --}}
                            <div class="card-footer text-muted">
                                  @include('inc.errors')        
                                      <form method="POST" action="{{ url("/posts/$posts->id/comments")}}">
                                          @csrf
                                        <div class="form-group row">
                                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Comments:</label>
                                            <div class="col-sm-8"> 
                                              <input type="text" name="comment" class="form-control" id="formGroupExampleInput" placeholder="Enter Comment">
                                            </div>
                                            <button type="submit" class="btn btn-secondary">Go</button>
                                          </div>
                                        </div>
                                      <br>
                                      <form>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                          <a type="submit" href="{{ url('list') }}" class="btn btn-primary">Back To List</a>
                                        </div>
                                      </div>
                                  </form>
                                </div> {{--  card-footer text-muted --}}
                              </div> {{-- col-sm offset-md-3 --}}
                            </div> {{-- row --}}
                    <hr>
                
                    <div class="container" style="width:530px;">
                            @foreach($comments as $comment) 
                                      <ul class="list-group" style="margin-bottom:5px;">
                                            <li class="list-group-item list-group-item-success font-weight-bold" style="margin-bottom:5px;">{{ $comment->comment }}</li>
                                            <div class="container">
                                                  <div class="row">
                                                      <div class="col-sm-0">
                                                        <form action="" method="POST">
                                                            @csrf
                                                          <button type="button" class="btn p-1 mb-1 bg-success text-white" href="">Reply</button>
                                                        </form>
                                                      </div>
                                                      <div class="col-sm-0">
                                                        <form action="{{ route('comments.destroy', $comment->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')  
                                                          <button type="submit" class="btn p-1 mb-1 bg-danger text-white" href="">Delete</button>
                                                        </form>
                                                      </div>
                                                      <div class="col-sm-0">
                                                          <form class="form-inline">
                                                              <input type="text" class="form-control" name="comment" id="formGroupExampleInput" placeholder="Enter Comment">
                                                              <button type="submit" class="btn btn-secondary">Go</button>
                                                              <span class="close">x</span>
                                                        </form>
                                                      </div>
                                                  </div>{{-- row --}}
                                            </div>{{-- container --}}
                                      </ul>
                                      

                                            <div class="row offset-md-1"> 
                                                <div class="container">
                                                      <ul class="list-group" style="margin-bottom:5px;">
                                                                <li class="list-group-item list-group-item-dark font-weight-bold"  style="width:450px;margin-bottom:5px;">dsadsa</li>
                                                                <div class="container">
                                                                          <div class="row">
                                                                                  <div class="col-sm-0">
                                                                                    <form action="" method="POST">
                                                                                        @csrf
                                                                                      <button type="button" class="btn p-1 mb-1 bg-success text-white" href="">Reply</button>
                                                                                    </form>
                                                                                  </div> 
                                                                                    <div class="col-sm-0">      
                                                                                      <form action="" method="POST">
                                                                                          @csrf
                                                                                          @method('DELETE')  
                                                                                        <button type="submit" class="btn p-1 mb-1 bg-danger text-white" href="">Delete</button>
                                                                                      </form>
                                                                                    </div>
                                                                                      <div class="col-sm-0">
                                                                                          <form class="form-inline">
                                                                                              <input type="text" class="form-control" name="comment" id="formGroupExampleInput" placeholder="Enter Comment">
                                                                                              <button type="submit" class="btn btn-secondary">Go</button>
                                                                                              <span class="close">x</span></div>
                                                                                          </form>
                                                                                      </div>
                                                                                </div>{{-- row --}}   
                                                            </ul>{{-- list-group --}}
                                                      </div>{{-- container --}}   
                                              </div>{{-- row offset-md-1 --}}

                                              <div class="row offset-md-2"> 
                                                  <div class="container">
                                                        <ul class="list-group" style="margin-bottom:5px;">
                                                                  <li class="list-group-item list-group-item-info font-weight-bold"  style="width:410px;margin-bottom:5px;">dsadsa</li>
                                                                  <div class="container">
                                                                            <div class="row">
                                                                                    <div class="col-sm-0">
                                                                                      <form action="" method="POST">
                                                                                          @csrf
                                                                                        <button type="button" class="btn p-1 mb-1 bg-success text-white" href="">Reply</button>
                                                                                      </form>
                                                                                    </div> 
                                                                                      <div class="col-sm-0">      
                                                                                        <form action="" method="POST">
                                                                                            @csrf
                                                                                            @method('DELETE')  
                                                                                          <button type="submit" class="btn p-1 mb-1 bg-danger text-white" href="">Delete</button>
                                                                                        </form>
                                                                                      </div>
                                                                                        <div class="col-sm-0">
                                                                                            <form class="form-inline">
                                                                                                <input type="text" class="form-control" name="comment" id="formGroupExampleInput" placeholder="Enter Comment">
                                                                                                <button type="submit" class="btn btn-secondary">Go</button>
                                                                                                <span class="close">x</span></div>
                                                                                            </form>
                                                                                        </div>
                                                                                  </div>{{-- row --}}   
                                                              </ul>{{-- list-group --}}
                                                        </div>{{-- container --}}   
                                                </div>{{-- row offset-md-1 --}}
                                 @endforeach
                        
                          </div>{{-- container --}} 
                   </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
