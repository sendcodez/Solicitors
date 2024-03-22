@extends('layouts.sidebar')
@section('title', 'Dashboard')
@section('contents')

<div id="main">
<center><h1 style="color:green;"> MONTHLY OVERVIEW </h1></center>
    <div class="page-content" style="margin-top:3%;">
    
        <div class="row">
          
            <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow-1">
                
          
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                          <h1 class="card-title mb-0" style="font-size:2.5rem;">TOTAL SOLICITS</h1>
                          <div class="dropdown mb-2">
                            <!-- <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a> -->
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item d-flex align-items-center" href=""><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-md-12 col-xl-7">
                            <h3 class="mb-2"></h3>
                            <p class="text-success" style="font-size:2.5rem;">
                              <span>1</span>
                                
                              </p>
                            <div class="mt-md-3 mt-xl-0"></div>
                          </div>
                          <div class="col-6 col-md-12 col-xl-5">
                            <a href="" class="img-link">
                              
                            </a>
                            <div class="d-flex align-items-baseline">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
  
  
  
                <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline">
          <h6 class="card-title mb-0" style="font-size:2.5rem;">RELEASED SOLICITS</h6>
        </div>
        <div class="row">
          <div class="col-6 col-md-12 col-xl-7">
            <h3 class="mb-2"></h3>
            <p class="text-success" style="font-size:2.5rem;">
              <span>1</span>
                
              </p>
            <div class="mt-md-3 mt-xl-0"></div>
          </div>
          <div class="col-6 col-md-12 col-xl-5">
           
            <div class="d-flex align-items-baseline">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline">
          <h6 class="card-title mb-0" style="font-size:2.5rem;">TOTAL SPENT</h6>
          <div class="dropdown mb-2">
            <!-- <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a> -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item d-flex align-items-center" href=""><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-md-12 col-xl-7">
            <h3 class="mb-2"></h3>
            <p class="text-success" style="font-size:2.5rem;">
              <span>P 1,000</span>
                
              </p>
            <div class="mt-md-3 mt-xl-0"></div>
          </div>
          <div class="col-6 col-md-12 col-xl-5">
            <a href="" class="img-link">
            
            </a>
            <div class="d-flex align-items-baseline">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <center> <h2>SUKI TRACKER</h2> </center>
                    </div>
                    <div class="card-body">
                        <div id="line"></div>
                    </div>
                </div>
            </div>
</div>
@endsection