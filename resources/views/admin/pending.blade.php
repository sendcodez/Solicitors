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
            <h1> PENDING SOLICITS </h1>
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
                                        <h2 class="text-center" >INFORMATION</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Your form to add user goes here -->
                                        <!-- Example form -->
                                        <form method="POST" action="{{ route ('pending.store') }} ">
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
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse($pending as $pending)
                                            <tr>
                                                <td>{{ $counter ++}}</td>
                                                <td>{{ $pending->fullname }}</td>
                                                <td>{{ $pending->address }}</td>
                                                <td>{{ $pending->contact_no }}</td>
                                                <td>{{ $pending->purpose }}</td>
                                                <td>
    @if($pending->status == 1)
        <span class="badge bg-warning">Pending</span>
    @endif
</td>

                                                <td>

                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $pending->id }}">
                                                        <i class="bi bi-pencil"></i> <!-- Example using Bootstrap Icons -->
                                                    </button>
                                                    <form action="{{ route('pending.destroy', $pending->id) }}" method="POST" style="display: inline;" id="deleteForm{{ $pending->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger delete-btn" data-user-id="{{ $pending->id }}">
                                                            <i class="bi bi-trash"></i> <!-- Example using Bootstrap Icons -->
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>







                                            <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal{{ $pending->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $pending->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editUserModalLabel{{ $pending->id }}">Edit User</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit user form -->
                <form method="POST" action="{{ route('pending.update', $pending->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Form fields pre-filled with existing pendingdata -->
                    <div class="form-group">
                        <label>FULLNAME</label>
                        <input type="text" name="fullname" value="{{ $pending->fullname }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ADDRESS</label>
                        <input type="text" name="address" value="{{ $pending->address }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>CONTACT NUMBER</label>
                        <input type="text" name="contact_no" value="{{ $pending->contact_no }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PURPOSE</label>
                        <input type="text" name="purpose" value="{{ $pending->purpose }}" class="form-control">
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
                            <td colspan='5'> No pending found.</td>
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
