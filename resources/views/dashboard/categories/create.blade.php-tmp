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
              <h3 class="box-title">{{trans('site.categories')}}</h3>
           </div>
            <!-- /.box-header -->
            <!-- form start -->
  <form action="{{route('dashboard.categories.store')}}" method="post">

       {{ csrf_field() }}
      {{ method_field('post') }}

        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ old($locale . '.name') }}">
                            </div>
                        @endforeach


              <!-- /.box-body -->

                  <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

            </form>
          </div>

          <!-- Form Element sizes -->

      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->

</div>


@endsection