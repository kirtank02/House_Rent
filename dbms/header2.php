<script src="https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-white align-items-center fw-bold me-4 fs-4 px-lg-3 py-lg-3 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand h-font fs-1 me-4" href="#">RentFlow</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
        <form class="d-flex">
            <button type="button" class="btn btn-outline-dark shadow-sm me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#login">Login</button>
            <button type="button" class="btn btn-outline-dark shadow-sm me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registration">Registration</button>
        </form>
    </div>
  </div>
</nav>

<!-- Modal for Login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center "><i class="bi bi-person-circle fs-3 me-3"></i> User Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-outline-dark shadow-sm me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#ranterModallogin"> Ranter Login</button>
        <button type="button" class="btn btn-outline-dark shadow-sm me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#householderModallogin">House Holder Login</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Ranter Login -->
<div class="modal fade" id="ranterModallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- Ranter Login Form -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-3"></i>User as a House Holder Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control shadow-none">
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control shadow-none">
          </div>
          <div class="d-flex align-items-center justify-content-between mb-2">
          <button type="submit" class="btn btn-dark shadow-none">Login</button>
          <a href="javascript:void(0)">Forgot Password</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for House Holder Login -->
<div class="modal fade" id="householderModallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- House Holder Login Form -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-3"></i>User as a House Holder Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control shadow-none">
          </div>
          <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control shadow-none">
          </div>
          <div class="d-flex align-items-center justify-content-between mb-2">
          <button type="submit" class="btn btn-dark shadow-none">Login</button>
          <a href="javascript:void(0)">Forgot Password</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal for registration -->
<div class="modal fade" id="registration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center "><i class="bi bi-person-circle fs-3 me-3"></i> User registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-outline-dark shadow-sm me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#ranterModalregistration"> Ranter registration</button>
        <button type="button" class="btn btn-outline-dark shadow-sm me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#householderModalregistration">House Holder registration</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Ranter Login -->
<div class="modal fade" id="ranterModalregistration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- Ranter Login Form -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-3"></i>User as a House Holder registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <span class="badge bg-light text-dark rounded-pill mb-3 text-wrap lh-base ">
        Note: Your details must match with your ID (Aadhaar card, passport, driving license, etc.)that will be required during check-in.
        </span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control shadow-none">
                </div>
                <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Phone no:</label>
                <input type="number" class="form-control shadow-none">
                </div>
                <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Birthday date:</label>
                <input type="date" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control shadow-none">
                </div>
                <div class="input-group p-0 mb-3 ps-0">
                <span class="input-group-text">Address</span>
                <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="text-center my-1 mb-3">
                    <button type="submit" class="btn btn-dark shadow-none">Register</button>
                </div>
            </div>
        </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for House Holder Login -->
<div class="modal fade" id="householderModalregistration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- House Holder Form -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-3"></i>User as a House Holder registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <span class="badge bg-light text-dark rounded-pill mb-3 text-wrap lh-base ">
        Note: Your details must match with your ID (Aadhaar card, passport, driving license, etc.)that will be required during check-in.
        </span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control shadow-none">
                </div>
                <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Phone no:</label>
                <input type="number" class="form-control shadow-none">
                </div>
                <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control shadow-none">
                </div>
                
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Birthday date:</label>
                <input type="date" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control shadow-none">
                </div>
                <div class="input-group p-0 mb-3 ps-0">
                <span class="input-group-text">Address</span>
                <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="text-center my-1 mb-3">
                    <button type="submit" class="btn btn-dark shadow-none">Register</button>
                </div>
            </div>
        </div>
        
        </form>
      </div>
    </div>
  </div>
</div>


