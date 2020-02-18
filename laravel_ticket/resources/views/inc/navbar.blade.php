
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" data-toggle="modal" href="#exampleModalCenter"><img src="{{ asset('img/brand.png') }}" alt="" height="30" width="55"></a>

      <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">The T Brand - Ticket to space! </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/brand.png') }}" alt="" height="400" width="650">
            </div>
          </div>
        </div>
      </div>


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ asset(' ') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('user') }}">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('list') }}">List Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('ticket') }}">View Tickets</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

