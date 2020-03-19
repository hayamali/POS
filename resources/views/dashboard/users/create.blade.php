@extends('layouts.dashboard.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

@include('partials._errors')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{trans('site.users')}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('dashboard.users.store')}}" method="post"  enctype="multipart/form-data">
              <div class="box-body">

              <div class="form-group">
              	      <input type="hidden" value="{{csrf_token()}}" name="_token" />
                  <label for="exampleInputName">First Name</label>
                  <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" placeholder="Enter FirstName">
                </div>

                 <div class="form-group">
                  <label for="exampleInputName">Last Name</label>
                  <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="Enter LastName">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" value="{{old('password')}}"id="exampleInputPassword1" placeholder="Password">
                </div>

                        <div class="form-group">
                            <label>@lang('site.permissions')</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['users', 'categories', 'products', 'clients', 'orders'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                <label><input type="checkbox" name="permissions[]" value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->

                            </div><!-- end of nav tabs -->

                        </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection