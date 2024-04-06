@extends('layouts.app')

@section('header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Users
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Create new user
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row row-cards">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Data</h3>
                    <div class="card-actions btn-actions">
                        <a href="{{ route('admin.users.index') }}" class="btn-action" title="Refresh"
                            data-bs-toggle="tooltip" data-bs-placement="top">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                            </svg>
                        </a>
                        <a href="{{ route('admin.users.export') }}" class="btn-action" title="Export"
                            data-bs-toggle="tooltip" data-bs-placement="top">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-file-export">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    Total : {{ $users->total() }}
                </div>
                <div class="table-responsive">
                    <table class="table table-hover card-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Date Of Birth</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                            <tr>
                                <form action="">

                                    <td></td>
                                    <td>
                                        <input type="text" id="name" class="form-control form-control-sm"
                                            placeholder="Press Enter To Search" name="name"
                                            value="{{ request('name') }}" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Press Enter To Search" name="email"
                                            value="{{ request('email') }}" />
                                    </td>
                                    <td class="text-nowrap">
                                        <select name="gender" id="gender" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option value="">All</option>
                                            <option value="Male" @selected(request('gender') === 'Male')>Male</option>
                                            <option value="Female" @selected(request('gender') === 'Female')>Female</option>
                                        </select>
                                    </td>
                                    <td></td>

                                    <td class="text-nowrap">
                                        <select name="role" id="role" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option value="" @selected(request('role') === '')>All</option>
                                            <option value="user" @selected(request('role') === 'user')>User</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" hidden></button>
                                    </td>
                                    <td></td>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}</td>
                                    <td class="text-nowrap">{{ $user->name }}</td>
                                    <td class="text-nowrap">{{ $user->email }}</td>
                                    <td class="text-nowrap">{{ $user->gender }}</td>
                                    <td class="text-nowrap">
                                        {{ (new \Carbon\Carbon($user->date_of_birth))->format('d M Y') }}</td>
                                    <td class="text-nowrap">
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-nowrap">{{ $user->created_at->format('d M Y H:i:s') }}</td>
                                    <td class="text-nowrap">{{ $user->updated_at->format('d M Y H:i:s') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn border-0 btn-icon" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.users.edit', $user->id) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf

                                                        <button class="dropdown-item" type="submit">Delete</button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {!! $users->appends(['name' => request('name'), 'email' => request('email'), 'role' => request('role')])->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
