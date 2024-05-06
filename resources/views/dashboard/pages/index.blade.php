@extends('dashboard.layouts.master')
@section('title')Dashboard @endsection
@section('header')Dashboard @endsection
@section('content')
 <div class="container-fluid">
        <div class="row">

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-primary rounded color-white">
              <a href="user.html" class="quick-text">
                All Users
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-secondary rounded color-white">
              <a href="profile.html" class="quick-text">
                Profile
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick  bg-gradient-warning rounded color-white">
              <a href="trainer.html" class="quick-text">
                Trainer
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="member.html" class="quick-text">
                Total Projects
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-danger rounded color-white">
              <a href="package.html" class="quick-text">
                Total Clients
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-warning rounded color-white">
              <a href="payment.html" class="quick-text">
                Make Payment
              </a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-primary rounded color-white">
              <a href="health-checkup.html" class="quick-text">Total Employers</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-danger rounded color-white">
              <a href="transaction.html" class="quick-text">Clients</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="report.html" class="quick-text">Report</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="add-member.html" class="quick-text">Add Client</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="add-trainer.html" class="quick-text">Add Employers</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="add-user.html" class="quick-text">Add User</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-info rounded color-white">
              <a href="add-package.html" class="quick-text">Add Projects</a>
            </div>
          </div>

          <!-- -- ------- Quick view item ----- -- -->
          <div class="quick-view p-2">
            <div class="quick bg-gradient-primary rounded color-white">
              <a href="#" class="quick-text">Logout</a>
            </div>
          </div>
          <br>

        </div>
      </div>
      <hr>

      <!---- --------- quick-view end --------- -- -->


      <!-- ---------- Report content ------------->



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
                        <span id="product" class="text-white">45</span>
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
                        <span id="product" class="text-white">45</span>
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
                        <span id="product" class="text-white">45</span>
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
                        <span id="product" class="text-white">45</span>
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
                        <span id="product" class="text-white">450512</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Payable Amount</p>
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
                        <span id="product" class="text-white">44855</span>
                      </h5>
                      <p class="mb-0 text-sm text-white">Total Income</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>

@endsection
