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
              @if(auth()->user()->hasPermission('create_products'))

               <a href="{{route('dashboard.products.create')}}" class="btn btn-info" role="button">{{trans('site.create')}}</a>
               @else
                  <a href="" class="btn btn-info disabled" role="button">{{trans('site.create')}}</a>
               @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                                <th>@lang('site.name')</th>


                                <th>@lang('site.purchase_price')</th>
                                <th>@lang('site.sale_price')</th>
                                <th>@lang('site.profit_percent') %</th>
                                <th>@lang('site.stock')</th>
                                 <th>@lang('site.category')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($products as $product)
                                <tr>

                                    <td>{{ $product->name }}</td>



                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->profit_percent }} %</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                     @if(auth()->user()->hasPermission('update_products'))
                    <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                    @else
                     <a href="" class="btn btn-primary disabled">Edit</a>

                    @endif
                    @if(auth()->user()->hasPermission('delete_products'))


                <form action="{{ route('dashboard.products.destroy', $product->id)}}" method="post"style="display: inline-block;">
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