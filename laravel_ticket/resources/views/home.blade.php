@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Welcome to the Ticket System</h1>
      <div class="text-center">
          <img src="{{ asset('img/ticket.jpg') }}" alt="" height="250" width="550">
      </div>
      <a type="button" href="{{ url('user') }}" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#exampleModalCente">Create Ticket</a>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Want to go to Create Ticket?!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>So you've managed so far until now ! Congratulations !!!</p>
                <img src="{{ asset('img/well.png') }}" alt="" height="135" width="135">
                <br><br>
                <p>Want to Go to create your ticket or Stay and look at the pictures ?</p>
              </div>
              
              <div class="modal-footer">
                <a type="button" class="btn btn-secondary" href="{{ url('user') }}">Go</a>
                <a type="button" class="btn btn-primary" href="{{ asset(' ') }}">Stay</a>
                
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>



@endsection

