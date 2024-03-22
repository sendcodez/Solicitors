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
                            ADD USER
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
                                        <form method="POST" action="{{ route('users.store') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                               
                                                <!-- First column -->
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Name" class="form-control">
                                                </div>
                                        
                                                    <label>Email</label>
                                                    <div class="form-group">
                                                        <input type="email" name="email" placeholder="Email" class="form-control">
                                                </div>
                                                
                                                    <label>Password</label>
                                                    <div class="form-group">
                                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                                </div>
                                                <!--
                                                    <label>Confirm Password</label>
                                                    <div class="form-group">
                                                        <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                                                </div>
                                            -->
                            
                                            <label>User type</label>
                                                    <div class="form-group">
                                                        <select name="usertype" class="form-control">
                                                            <option value="Admin" selected>Admin</option>
                                                            <option value="BHW">BHW</option> 
                                                            <option value="Staff">Staff</option>  
                                                            <option value="Street_sweepers">Street Sweepers</option> 
                                                            <option value="Tanod">Tanod</option>  
                                                      
                                                            
                                                        </select>
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
                        <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
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
                            <th>NAME</th>
                            <th>EMAIL</th>       
                            <th>CREATED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse($users as $user)
                                            <tr>
                                                <td>{{ $counter ++}}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                            
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">
                                                        <i class="bi bi-pencil"></i> <!-- Example using Bootstrap Icons -->
                                                    </button>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" id="deleteForm{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger delete-btn" data-user-id="{{ $user->id }}">
                                                            <i class="bi bi-trash"></i> <!-- Example using Bootstrap Icons -->
                                                        </button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>







                                            <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit user form -->
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Form fields pre-filled with existing user data -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
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
                            <td colspan='5'> No users found.</td>
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

