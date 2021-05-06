@extends('master')

@section('title','تبلیغات')
@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">تبلیغات</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success add-advertising" data-url="{{ route('advertising.create') }}">ثبت تبلیغات</button>
                    </div>
                </div>
                <hr>
               <div class="row">
               @if($advertisings->count())
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-info">
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>لینک</th>
                                <th>تصویر</th>
                                <th>مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($advertisings as $advertising)
                            <tr>
                                <td>{{ ($advertisings->currentPage() - 1) * $advertisings->perPage() + $loop->iteration }}</td>
                                <td>{{ $advertising->title }}</td>
                                <td><a href="{{ $advertising->link }}">لینک</a></td>
                                <td>
                                    <img src="{{ url('storage/'.$advertising->path) }}" width="100px" height="100px" alt="">
                                </td>
                                <td>
                                    <a class="text-danger delete-advertising" data-url="{{ route('advertising.destroy',$advertising->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="col-md-12">
                        @include('partials.empty_table')
                    </div>
                @endif
               </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('click','.add-advertising',function(){
            httpGetRequest($(this).attr('data-url')).done(function(response){
                if(response.status === 200){
                    showModal({
                        title:'ثبت تبلیغات',
                        body:response.data
                    });
                    setTimeout(function(){ window.location.reload() },2000);
                }
                removeContentLoading();
            })
        });

        $(document).on('click','.store-inf',function(){
            setModalLoading();
            httpFormPostRequest($(this)).done(function(response){
                if(response.status === 200){
                    successAlert(response.msg)
                }
                removeModalLoading();
            })
        });

        $(document).on('click','.delete-advertising',function(){
            httpPostRequest($(this).attr('data-url'),{_method:'delete'}).done(function(response){
                if(response.status === 200){
                    successAlert(response.msg)
                    setTimeout(function(){ window.location.reload() },2000);
                }

            });
        }); 
    </script>
@endsection
