@extends('frontend.layouts.app')

@section('content')
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('frontend.partials.home_customer_search_form')
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 mt-2">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yeni kayıt <small>Hızlı kayıt</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>

                        <form method="POST" action="{{ route("frontend.crm-customers.store") }}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" name="first_name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Ad">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" name="last_name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Soyad">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input class="form-control date" type="date" name="birthday" id="birthday" value="{{ old('birthday') }}">
                                    <span class="fa fa-birthday-cake form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="email" class="form-control has-feedback-left" name="email" id="inputSuccess2" placeholder="email">
                                    <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" name="phone" id="inputSuccess2" placeholder="Telefon">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" name="address" id="inputSuccess2" placeholder="Adres">
                                    <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label for="aciklama">Açıklama</label>
                                    <textarea class="form-control" name="description" id="aciklama"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <button type="submit" class="btn btn-danger btn-block">kaydet</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 mt-2">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Son Kayıtlar <small>son kaydedilen kullanıcılar</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>işlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($customers as $customer)
                            <tr>
                                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>
                                    <a type="button" class="btn btn-sm btn-outline-danger" title="{{ trans('global.view') }}" onclick="view(this)" data-url="{{ route('frontend.crm-customers.show', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-file" title="{{ trans('global.view') }}"></i>
                                    </a>

                                    <a type="button" class="btn btn-sm btn-outline-primary" title="{{ trans('cruds.randevu.title') }}" onclick="view(this)" data-url="{{ route('frontend.randevus.quick_randevu', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-calendar-check-o" title="{{ trans('cruds.randevu.title') }}"></i>
                                    </a>

                                    <a type="button" class="btn btn-sm btn-outline-info" title="{{ trans('global.edit') }}" onclick="view(this)" data-url="{{ route('frontend.crm-customers.edit', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-edit" title="{{ trans('global.edit') }}"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse

                            </tbody>
                        </table>
                        <span class="text-left"> <a href="{{ route('frontend.crm-customers.index') }}"> Tüm Liste</a></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 mt-2">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bugünki Randevular<small> {{ date('d-m-Y H:s:i') }} </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Randevu</th>
                                <th>Açıklama</th>
                                <th>işlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($randevular as $customer)
                                <tr @if($customer->date < date('d-m-Y H:s:i')) class="bg-success" @endif>
                                    <td>{{ $customer->customer->first_name }} {{ $customer->customer->last_name }}</td>
                                    <td>{{ $customer->customer->phone }}</td>
                                    <td>{{ $customer->date }}</td>
                                    <td>{{ $customer->description }}</td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-outline-danger" title="{{ trans('global.view') }}" onclick="view(this)" data-url="{{ route('frontend.randevus.show', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-file" title="{{ trans('global.view') }}"></i>
                                        </a>

                                        <a type="button" class="btn btn-sm btn-outline-primary" title="{{ trans('cruds.randevu.title') }}" onclick="view(this)" data-url="{{ route('frontend.randevus.quick_randevu', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-calendar-check-o" title="{{ trans('cruds.randevu.title') }}"></i>
                                        </a>

                                        <a type="button" class="btn btn-sm btn-outline-info" title="{{ trans('global.edit') }}" onclick="view(this)" data-url="{{ route('frontend.randevus.edit', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-edit" title="{{ trans('global.edit') }}"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                            </tbody>
                        </table>
                        <span class="text-left"> <a href="{{ route('frontend.crm-customers.index') }}"> Tüm Liste</a></span>
                    </div>
                </div>
            </div>
        </div>



@endsection

@section('script')
    <script>
        function clearInput(){
            $('#name_sr').val("");
            $('#lastname_sr').val("");
            $('#phone_sr').val("");
            $('#table_body').empty();
            $('#customer_table').hide();
        };

        $('#name_sr').empty();
        $('.input-search').keyup(function (){
            const name=$("#name_sr").val();
            const lastname=$("#lastname_sr").val();
            const phone=$("#phone_sr").val();
            var formData = {
                name: name,
                lastname: lastname,
                phone: phone,
                _token:$('#token').val()
            };
            if (name.length >= 3 || lastname.length >= 3 || phone.length >= 3 ){
                $.ajax({
                    type: "POST",
                    url: "{{route('frontend.get_customer')}}",
                    data:formData,
                    success: function (res){
                        $('#customer_table').show();
                        if (res == false){

                        }
                        $('#table_body').empty();
                        $('#table_body').append(res)

                    }
                });
            }else if (name.length < 3 || lastname.length < 3 || phone.length < 3 ){
                $('#table_body').empty();
                $('#customer_table').hide();
            }

        });
    </script>

@endsection
