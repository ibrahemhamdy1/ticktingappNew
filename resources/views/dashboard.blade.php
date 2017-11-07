@extends('admin.main')
@section('content')
<div class="contianer" style="margin-top:10%">
  <div class="row" >
    <!--  Users-->
      <div class="col-md-4 text-center box" >
          <div class="panel-body bg-tertiary">
            <div class="widget-summary">
              <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                  <i class="fa  fa-user"></i>
                </div>
              </div>
              <div class="widget-summary-col ">
                <div class="summary text-center">
                  <h4 class="title">Users </h4>
                  <div class="info">
                    <strong class="amount">{{$users}}</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--  Clients-->
      <div class="col-md-4 text-center box">
          <div class="panel-body bg-secondary">
            <div class="widget-summary">
              <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                  <i class="fa fa-user-circle"></i>
                </div>
              </div>
              <div class="widget-summary-col box">
                <div class="summary text-center">
                  <h4 class="title">Clients </h4>
                  <div class="info">
                    <strong class="amount">{{$clients}}</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--  network-->
      <div class="col-md-4 text-center box">
          <div class="panel-body bg-primary">
            <div class="widget-summary">
              <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                  <i class="fa fa-podcast"></i>
                </div>
              </div>
              <div class="widget-summary-col box ">
                <div class="summary text-center">
                  <h4 class="title">ISP </h4>
                  <div class="info">
                    <strong class="amount">{{$networks}}</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- Catrgory -->
      <div class="col-md-4 text-center box">
          <div class="panel-body bg-quaternary">
            <div class="widget-summary">
              <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                  <i class="fa fa-tag"></i>
                </div>
              </div>
              <div class="widget-summary-col box ">
                <div class="summary text-center">
                  <h4 class="title">Catrgory </h4>
                  <div class="info">
                    <strong class="amount">{{$categorys}}</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- packets -->
      <div class="col-md-4 text-center box ">
          <div class="panel-body bg-tertiary greenBox">
            <div class="widget-summary">
              <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                  <i class="fa fa-tachometer"></i>
                </div>
              </div>
              <div class="widget-summary-col box ">
                <div class="summary text-center">
                  <h4 class="title">Packages </h4>
                  <div class="info">
                    <strong class="amount">{{$packages}}</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- tickets -->
      <div class="col-md-4 text-center box">
          <div class="panel-body bg-tertiary orangBox">
            <div class="widget-summary">
              <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                  <i class="fa fa-ticket"></i>
                </div>
              </div>
              <div class="widget-summary-col box ">
                <div class="summary text-center">
                  <h4 class="title">tickets </h4>
                  <div class="info">
                    <strong class="amount">{{$ticket}}</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection