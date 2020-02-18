@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row ">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Ticket System Project - User Page</h1>
      <hr>
      <br>
    <div class="container">
      <div class="row">
            <div class="card bg-light offset-md-4" style="max-width: 25em;">
                <div class="card-header"><h3>Ticket Form</h3></div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <form method="POST" action="{{ route('posts.store')}}">
              
                            @csrf 

                            @if ($flash = session('success'))
                                  <div class="alert alert-success">
                                    {{ $flash }}
                                  </div>
                            @endif
                            
                                @include('inc.errors')

                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-5 col-form-label">Department</label>
                                <div class="col-sm-12">
                                  <select name="department" class="form-control" id="exampleFormControlSelect1">
                                    <option name="technical">Technical</option>
                                    <option name="sales">Sales</option>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-date-input" class="col-3 col-form-label">Date</label>
                                <div class="col-sm-12">
                                  <input class="form-control" name="created_at" type="date" id="example-date-input">
                                </div>
                              </div>    
              
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-12">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                              </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="formGroupExampleInput" class="col-sm-4 col-form-label">Subject</label>
                                  <div class="col-sm-12">
                                    <input type="text" name="subject" class="form-control" id="formGroupExampleInput" placeholder="Subject">
                                  </div>
                            </div>
                    
                            <div class="form-group row">
                              <label for="exampleFormControlTextarea1" class="col-sm-4 col-form-label">Message</label>
                              <div class="col-sm-12">
                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                              </div>
                            </div>
                        
                            <div class="form-group row">
                              <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Create Ticket</button>
                              </div>
                                </div>
                              </div>
                          </form>
                    </div> {{-- d-flex justify-content-center --}}

                </div>{{-- card-body --}}
              </div>{{-- card bg-light mb-3 --}}
      </div>{{-- row--}}
      <br>
      <div class="row"></div>
        <div class="card bg-light offset-md-4" style="max-width: 25rem;">
            <div class="card-header"><h4>Search Form</h4></div>
              <div class="card-body">
                  <div class="d-flex justify-content-center">
                  <form action="{{ url('search') }}" method="GET">
                        @csrf
                        
                          <div class="form-group row">
                              <label for="reference" class="col-sm-3 col-form-label">Reference</label>
                              <div class="col-sm-4">
                                <input type="search" name="search" class="form-control" id="reference" placeholder="Search">
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

  </div>{{-- container --}}



      <br>
      
  
@endsection
