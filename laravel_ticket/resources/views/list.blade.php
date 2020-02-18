@extends('layouts.app')

@section('content')


  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Ticket System Project - List Table</h1>
      <br><br>
      @if ($flash = session('successticket'))
              <div class="alert alert-success" style="max-width: 200px;">
                {{ $flash }}
              </div>
      @endif
      @if  ($flash = session('errorticket'))
            <div class="alert alert-danger" style="max-width: 200px;">
              {{ $flash }}
            </div>       
       @endif
       @if ($message = session('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="col-sm-12">
          @if(session()->get('success'))
            <div class="alert alert-success" style="max-width: 200px;">
              {{ session()->get('success') }}  
            </div>
          @endif
        </div> 
        <div class="col-sm-12">
            @if(session()->get('open'))
              <div class="alert alert-success" style="max-width: 200px;">
                {{ session()->get('open') }}  
              </div>
            @endif
          </div> 
          <div class="col-sm-12">
              @if(session()->get('close'))
                <div class="alert alert-success" style="max-width: 200px;">
                  {{ session()->get('close') }}  
                </div>
              @endif
            </div> 
        <div class="table-responsive-sm">            
       <table class="table table-striped">
          <thead>
              <tr>
                  <th scope="col">Ref</th>
                  <th scope="col">Email</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Department</th>
                  <th scope="col">View</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Status</th>
                  <th scope="col">Details</th>
              </tr>
          </thead>
            <tbody>
                @foreach($posts as $post)
                      <tr>
                        <th scope="row">{{ $post->number }}</th>
                          <td>{{ $post->email }}</td>
                          <td>{{ $post->subject }}</td>
                          <td>{{ $post->department }}</td>
                          <td>
                            <a href="{{ URL::to('ticket/view/' . $post->id) }}" class="btn btn-secondary">View</a>
                          </td>
                          <td><a href="{{ URL::to('ticket/edit/' . $post->id) }}" class="btn btn-primary">Edit</a></td>
                          <td>
                              <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  
                                  <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                          </td>
                          
                          <td>
                              {{-- @foreach($state as $states)
                                  @if($states->status_id === $post->id)
                                  {{$states->id}}
                                    {{$states->state}}
                                    {{$states->status_id}}
                                    {{$post->id}}
                                  @endif
                              @endforeach --}}
                                  @foreach($state as $states)
                                        <div class="btn-group" role="group">
                                            <div class="row">
                                                @if($states->status_id == $post->id && $states->state == "Opened")
                                                  <div class="btn-group">
                                                      <button class="btn btn-success" type="button">Open</button>
                                                  
                                                      <button id="btnGroupDrop1" type="submit" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>                                  
                                                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                              <form action="{{URL::to('list/open/'.$post->id)}}" method="POST">
                                                                  @csrf
                                                                  <button class="dropdown-item" href="#" type="submit">Opened</button>
                                                              </form>
                                                              <form action="{{ URL::to('list/close/'.$post->id)}}" method="POST">
                                                                    @csrf
                                                                  <button class="dropdown-item" href="#" type="submit">Closed</button>
                                                              </form>
                                                        </div>                                      
                                                      @elseif($states->status_id == $post->id && $states->state == "Closed")
                                                          <div class="btn-group">
                                                            <button class="btn btn-secondary" type="button">Closed</button>
                                                         
                                                          <button id="btnGroupDrop1" type="submit" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                              <form action="{{URL::to('list/open/'.$post->id)}}" method="POST">
                                                                  @csrf
                                                                  <button class="dropdown-item" href="#" type="submit">Opened</button>
                                                              </form>
                                                              <form action="{{ URL::to('list/close/'.$post->id)}}" method="POST">
                                                                    @csrf
                                                                  <button class="dropdown-item" href="#" type="submit">Closed</button>
                                                              </form>
                                                        </div>

                                                          @endif  
                                                          {{-- @else
                                                        <button class="btn btn-secondary" type="button">{{ $states->state }}</button>
                                                            
                                                          <button id="btnGroupDrop1" type="submit" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                              <form action="{{URL::to('list/open/'.$post->id)}}" method="POST">
                                                                  @csrf
                                                                  <button class="dropdown-item" href="#" type="submit">Opened</button>
                                                              </form>
                                                              <form action="{{ URL::to('list/close/'.$post->id)}}" method="POST">
                                                                    @csrf
                                                                  <button class="dropdown-item" href="#" type="submit">Closed</button>
                                                              </form>
                                                          </div> 
                                                      @endif  --}}
                                                                    
                                                      </div>  {{-- class="row" --}}
                                                  </div> {{-- class="btn-group" --}}
                                                      
                                                    @endforeach
                                        </td>
                                      
                                    
                                      <td>
                                        <button type="button" id="popupinfo" class="btn btn-info" data-html="true" data-container="body" data-toggle="popover" data-placement="top" 
                                        data-content="Reference : {{ $post->number }}<br>
                                        @foreach($state as $states)  
                                        @if($states->id === $post->id) Status : {{$states->state}}@endif 
                                        @endforeach <br>
                                        Department : {{ $post->department }}<br>
                                        Date : {{ $post->created_at }}<br>
                                        Email : {{ $post->email }}<br>
                                        Subject : {{ $post->subject }}<br>
                                        Message : {{ $post->message }}<br>
                                        ">Info</button>
                                      </td>
                                    
                                    </tr>
                      @endforeach  


        
              </tbody>
       </table>
      </div> 
       <div class="row justify-content-center">
         <span>{{ $posts->links() }}</span>
        </div>
    </div>
  </div>
  


@endsection
