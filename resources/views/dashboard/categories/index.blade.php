@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<!-- main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="margin-bottom: 15px">{{trans('site.users')}}</h3><br>

                 <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>
           <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
              @if(auth()->user()->hasPermission('create_categories'))

               <a href="{{route('dashboard.categories.create')}}" class="btn btn-info" role="button">{{trans('site.create')}}</a>
               @else
                  <a href="" class="btn btn-info disabled" role="button">{{trans('site.create')}}</a>
               @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>{{trans('site.name')}} </th>
                   <th>@lang('site.products_count')</th>
                    <th>@lang('site.related_products')</th>

                     <th>{{trans('site.action')}}</th>

                </tr>
                @foreach($categories as $category)
                <tr>
                  <td>{{$category->name}}</td>
                 <td>{{ $category->products->count() }}</td>
                <td><a href="{{ route('dashboard.products.index', ['category_id' => $category->id]) }}" class="btn btn-info btn-sm">@lang('site.related_products')</a></td>

                   <td>
                     @if(auth()->user()->hasPermission('update_categories'))
                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                    @else
                     <a href="" class="btn btn-primary disabled">Edit</a>

                    @endif
                    @if(auth()->user()->hasPermission('delete_categories'))


                <form action="{{ route('dashboard.categories.destroy', $category->id)}}" method="post"style="display: inline-block;">
                    {{ csrf_field() }}
                 <input type="hidden" name="_method" value="DELETE" >

                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @else
                   <button class="btn btn-danger disabled" type="submit">Delete</button>

                @endif
            </td>

                </tr>
                @endforeach

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

</div>


@endsection