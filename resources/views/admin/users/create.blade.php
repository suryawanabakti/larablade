@extends('layouts.app')

@section('header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Users / Create
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            Back
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
                    <h3>Form create a user</h3>
                </div>
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label required">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Input name...">
                            @error('name')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label required">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="">Choose a role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @error('role')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="form-label required">Date of birth</label>
                            <div class="row g-2">
                                <div class="col-5">
                                    <select name="user[month]" class="form-select">
                                        <option value="">Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select name="user[day]" class="form-select">
                                        <option value="">Day</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="user[year]" class="form-select">
                                        <option value="">Year</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('date_of_birth')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Gender</label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="gender" value="Male" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-mars">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                            <path d="M19 5l-5.4 5.4" />
                                            <path d="M19 5l-5 0" />
                                            <path d="M19 5l0 5" />
                                        </svg>
                                        Male</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="gender" value="Female" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                            <path d="M12 14v7" />
                                            <path d="M9 18h6" />
                                        </svg>
                                        Female</span>
                                </label>
                            </div>
                            @error('gender')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label ">Photo</label>
                            <input type="file" class="form-control" name="photo"
                                accept="image/png, image/jpeg, image/jpg, image/webp">

                            @error('photo')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Input email...">
                            @error('email')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Password</label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" id="password" class="form-control"
                                    autocomplete="off">
                                <span class="input-group-text">
                                    <a href="javascript:void(0)" id="showPassword" onclick="togglePassword('password')"
                                        class="link-secondary" data-bs-toggle="tooltip" aria-label="Show Password"
                                        data-bs-original-title="Show Password">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>


                                </span>
                            </div>
                            @error('password')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Password confirmation</label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" autocomplete="off">
                                <span class="input-group-text">
                                    <a href="javascript:void(0)" id="showPassword"
                                        onclick="togglePassword('password_confirmation')" class="link-secondary"
                                        data-bs-toggle="tooltip" aria-label="Show Password"
                                        data-bs-original-title="Show Password">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>


                                </span>
                            </div>
                            @error('password_confirmation')
                                <x-input-error :messages="$message" />
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function togglePassword(element) {

            var x = document.getElementById(element);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endpush
