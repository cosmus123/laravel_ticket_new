@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="mt-5">Ticket System Project - Edit Page</h1>
            <br>
            <div class="container">
                        <div class="col-sm-8 offset-sm-3">
                                @if ($errors->any())
                                    <div class="alert alert-danger" style="max-width: 500px;list-style-type: none;">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                          </div>
                        <div class="col-sm-12">
                                @if(session()->get('success'))
                                  <div class="alert alert-success" style="max-width: 200px;">
                                    {{ session()->get('success') }}  
                                  </div>
                                @endif
                          </div>
                        <br /> 
                       
                      <div class="card bg-light offset-md-4" style="max-width: 25em;">
                          <div class="card-header"><h3>Ticket Form</h3></div>
                          <div class="card-body">         
                                <div class="d-flex justify-content-center">
                                    {{-- @foreach($posts as $post)  --}}
                                        <form method="POST" action="{{ route('posts.update', $posts->id) }}">

                                          @method('PATCH')  

                                            @csrf 

                                            @if ($flash = session('success'))
                                                <div class="alert alert-success">
                                                {{ $flash }}
                                            </div>
                                            @endif

                                            <div class="form-group row">
                                                <label for="exampleFormControlSelect1" class="col-sm-5 col-form-label">Department</label>
                                                <div class="col-sm-12">
                                                  <select class="form-control" name="department" value={{ $posts->department }} id="exampleFormControlSelect1">
                                                    <option>Technical</option>
                                                    <option>Sales</option>
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                              <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                                              <div class="col-sm-12">
                                                <input type="email" value={{ $posts->email }} name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                              </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                                <label for="formGroupExampleInput" class="col-sm-4 col-form-label">Subject</label>
                                                  <div class="col-sm-12">
                                                    <input type="text" value={{ $posts->subject }} name="subject" class="form-control" id="formGroupExampleInput" placeholder="Subject">
                                                  </div>
                                            </div>
                                    
                                            <div class="form-group row">
                                              <label for="exampleFormControlTextarea1" class="col-sm-4 col-form-label">Message</label>
                                              <div class="col-sm-12">
                                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Message">{{ $posts->message }}</textarea>
                                              </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                              <div class="col-sm-8">
                                                <button type="submit" class="btn btn-primary">Edit Ticket</button>
                                                <a type="submit" href="{{ url('list') }}" class="btn btn-primary">Back</a>
                                              </div>
                                            </div>
                                          </form>
                                          {{-- @endforeach --}}
                                    </div>
                                  </div>
                                </div>
                                </div>

</div>
</div>
</div>

@endsection