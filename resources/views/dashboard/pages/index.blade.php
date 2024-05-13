@extends('dashboard.layouts.master')
@section('title')Dashboard @endsection
@section('header')Dashboard @endsection
@section('content')
@if (auth()->user()->user_type === 'admin')
 <div class="container-fluid">

        <div class="row">

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-primary rounded color-white">
              <a href="{{route('user.view')}}" class="quick-text">
                All Users
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-secondary rounded color-white">
              <a href="{{route('user.view')}}" class="quick-text">
                Profile
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick  bg-gradient-warning rounded color-white">
              <a href="{{route('add.user')}}" class="quick-text">
                Add User
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="{{url('dashboard/project')}}" class="quick-text">
                Total Projects
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-danger rounded color-white">
              <a href="{{url('dashboard/client')}}" class="quick-text">
                Total Clients
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-warning rounded color-white">
              <a href="{{url('dashboard/collection')}}" class="quick-text">
                Make Payment
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-primary rounded color-white">
              <a href="{{url('dashboard/employer')}}" class="quick-text">Total Employers</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-danger rounded color-white">
              <a href="{{url('dashboard/client')}}" class="quick-text">Clients</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="{{url('dashboard/expense')}}" class="quick-text">Expense</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="{{url('dashboard/client/create')}}" class="quick-text">Add Client</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="{{url('dashboard/employer/create')}}" class="quick-text">Add Employers</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="{{url('dashboard/expense/create')}}" class="quick-text">Add Expense</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="{{url('dashboard/project/create')}}" class="quick-text">Add Projects</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-primary rounded color-white">
              <a href="{{url('dashboard/task')}}" class="quick-text">Task</a>
            </div>
          </div>
          <br>

        </div>
 </div>
      <hr>
@endif
      <!---- --------- quick-view end --------- -- -->


      <!-- ---------- Report content ------------->

@if (auth()->user()->user_type === 'admin')

      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-primary">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-person das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$user}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Total Users</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-warning">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-person-video3 das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$member}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Total Employers</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-secondary">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-people das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$client}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Total Clients</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-danger">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-bag das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$project}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Total Projects</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-info">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-currency-dollar das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$collection}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Total Collection</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-success">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-currency-dollar das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$expense}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Total Expense</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>

@else

      <div class="container-fluid">

        <div class="row">

            <b>Welcome : </b> <p>{{auth()->user()->name}}</p>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-success">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-person-video3 das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$project}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">My Project</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn  p-2">
            <div class="card card-plain bg-warning">
              <div class="py-5">
                <div class="row">
                  <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                    <div class="icon icon-shape  bg- shadow float-end border-radius-md">
                      <span class="bi bi-person-video3 das-icone"></span>
                    </div>
                  </div>
                  <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                    <div>
                      <h5 class="mb-0 text-capitalize font-weight-bold">
                        <span id="product" class="text-white">{{$task}}</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">My Task</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
@endif
@endsection
