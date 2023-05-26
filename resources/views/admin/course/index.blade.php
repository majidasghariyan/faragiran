@extends('layouts.admin')

@section('content')

    @include('partials.header',[
        'title' => 'لیست  دوره ها',
    ])

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام دوره</th>
                <th scope="col">قیمت</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->name}}</td>
                    <td>
                        @if(!empty($course->price->price))
                            {{$course->price->price}}
                        @endif

                    </td>
                    <td class="text-center">

                        <a href="{{ route('admin.course.add', $course) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="اضافه کردن درس" data-original-title="ویرایش">
                            <i class="fa fa-plus-square"></i>
                        </a>

                        <a href="{{ route('admin.course.edit', $course) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="ویرایش" data-original-title="ویرایش">
                            <i class="fa fa-pencil-alt"></i>
                        </a>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if($courses instanceof \Illuminate\Pagination\LengthAwarePaginator )
                {{ $courses->onEachSide(1)->links('vendor.pagination.to_pagination', ['class' => 'd-flex justify-content-center align-items-center flex-wrap']) }}
            @endif

        </div>
    </div>

@endsection
