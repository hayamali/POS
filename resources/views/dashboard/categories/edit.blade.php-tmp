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
            <form role="form" action="{{route('dashboard.categories.update',$category->id)}}" method="post"  enctype="multipart/form-data">
               {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="box-body">

               @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $category->translate($locale)->name }}">
                            </div>
                        @endforeach



                <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.edit')</button>
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