@extends('layouts.sidebar')
@section('title', 'Manage Users')
@section('contents')
    <div id="main">
        <header class="mb-3">
            
        </header>
        <style>
            /* Custom CSS to center modal vertically */
            .modal-dialog {
                display: flex;
                align-items: center;
                min-height: calc(100% - 2.5rem);
                margin: 0 auto;
            }
        </style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
            <section id="form-and-scrolling-components">
       
                                <!-- Button trigger for login form modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addUserModal">
                            ADD SOLICITOR
                        </button>



                        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="text-center" >USER INFORMATION</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Your form to add user goes here -->
                                        <!-- Example form -->
                                        <form method="POST" action="{{ route('solicitors.store') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                               
                                                <!-- First column -->
                                                <div class="col-md-12">
                                                    <label>Fullname</label>
                                                    <div class="form-group">
                                                        <input type="text" name="fullname" placeholder="Type the name here" class="form-control">
                                                </div>
                                        
                                                    <label>Address</label>
                                                    <div class="form-group">
                                                        <input type="text" name="address" placeholder="Type the address here" class="form-control">
                                                </div>
                                                
                                                    <label>Contact Number</label>
                                                    <div class="form-group">
                                                        <input type="text" name="contact_no" placeholder="Type the contact number here" class="form-control">
                                                </div>
                                           
                                                <label>Purpose</label>
                                                    <div class="form-group">
                                                        <input type="text" name="purpose" placeholder="Type the purpose here" class="form-control">
                                                </div>
                                                    
                                        
                                                </div>
                                            </div>
                                            <!-- Add more fields as needed -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Submit</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                                               
</section>  
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Solicitors</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    
    <section class="section">
        <div class="row" id="table-responsive">
            <div class="col-12">
            <div class="table-responsive">
                <table class="table mb-0" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FULLNAME</th>
                            <th>ADDRESS</th>       
                            <th>CONTACT NUMBER</th>
                            <th>PURPOSE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse($solicitors as $solicitor)
                                            <tr>
                                                <td>{{ $counter ++}}</td>
                                                <td>{{ $solicitor->fullname }}</td>
                                                <td>{{ $solicitor->address }}</td>
                                                <td>{{ $solicitor->contact_no }}</td>
                                                <td>{{ $solicitor->purpose }}</td>
                                                <td>
                                            
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $solicitor->id }}">
                                                        <i class="bi bi-pencil"></i> <!-- Example using Bootstrap Icons -->
                                                    </button>
                                                    <form action="{{ route('solicitors.destroy', $solicitor->id) }}" method="POST" style="display: inline;" id="deleteForm{{ $solicitor->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger delete-btn" data-user-id="{{ $solicitor->id }}">
                                                            <i class="bi bi-trash"></i> <!-- Example using Bootstrap Icons -->
                                                        </button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>







                                            <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal{{ $solicitor->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $solicitor->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editUserModalLabel{{ $solicitor->id }}">Edit User</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit user form -->
                <form method="POST" action="{{ route('solicitors.update', $solicitor->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Form fields pre-filled with existing solicitor data -->
                    <div class="form-group">
                        <label>FULLNAME</label>
                        <input type="text" name="fullname" value="{{ $solicitor->fullname }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ADDRESS</label>
                        <input type="text" name="address" value="{{ $solicitor->address }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>CONTACT NUMBER</label>
                        <input type="text" name="contact_no" value="{{ $solicitor->contact_no }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PURPOSE</label>
                        <input type="text" name="purpose" value="{{ $solicitor->purpose }}" class="form-control">
                    </div>
                    <!-- Add more fields as needed -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                        @empty
                        <tr>
                            <td colspan='5'> No solicitors found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
        </div>
        
    </section>
        </div>
    </div>
</div>
@endsection

