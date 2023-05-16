@extends('layouts.admin')

@section('content')
    @include('partials.header',[
      'title' => 'ویرایش دوره',
    ])

    <hr>

    <form method="POST" action="{{route('admin.course.update' ,  $course)}}">
        @csrf
        <div class="form-group row align-items-center justify-content-center">
            <label for="staticEmail" class="col-sm-2 col-form-label">قیمت</label>
            <div class="col-sm-8">
                <input type="text" name="price" class="form-control"  value="{{ $course->price}}" placeholder="قیمت" autocomplete="off">
            </div>
        </div>

        <div class="form-group row align-items-center justify-content-center">
            <div class="col-10">
                <button type="submit" name="btn" class="btn btn-primary">
                    <i class="fa fa-check mr-1"></i>بروز رسانی
                </button>
            </div>
        </div>
    </form>

@endsection
