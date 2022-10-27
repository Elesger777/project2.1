@extends('layouts.app')

@section('title')
Brand
@endsection


@section('brand')


@if($errors->any())
  @foreach($errors->all() as $sehv)
    <div class="alert alert-dark" role="alert">
      {{$sehv}}
    </div>
  @endforeach
@endif
<br>


@isset($bsil_id)
  <div class="alert alert-dark" role="alert">
    Brandi silmeyə eminsizmi?<br>
  </div>
    <a href="{{route('bdelete',$bsil_id)}}"><button class="btn btn-primary" style="height:36px; width:40px;" title="Hə"> <i class="bi bi-check"></i></button></a>
    <a href="{{route('brend')}}"><button class="btn btn-danger" style="height:36px; width:40px;" title="Yox"> <i class="bi bi-x"></i></button></a><br><br>
@endisset


@if(session('mesaj'))
  <div class="alert alert-dark" role="alert">
    {{session('mesaj')}}
  </div>
@endif

<br><br>


@isset($beditdata) 
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h2>Qeydiyyat</h2>
            </div>
            <div class="card-body">
                <div class="basic-form">
                  <form method="post" action="{{route('update')}}">
                    @csrf
                    Ad:<br>
                    <div class="form-group">
                        <input type="text" class="form-control input-rounded" name="ad" value="{{$editdata->ad}}">
                    </div>
                    Ad:<br>
                    <div class="form-group">
                        <input type="text" class="form-control input-rounded" name="soyad" value="{{$editdata->soyad}}">
                    </div>
                    Ad:<br>
                    <div class="form-group">
                        <input type="email" class="form-control input-rounded" name="email" value="{{$editdata->email}}">
                    </div>
                    <input type="hidden" name="id" value="{{$editdata->id}}"><br>
                    <button type="submit" class="btn btn-primary" style="height:36px; width:40px;" title="Yenilə"> <i class="bi bi-arrow-clockwise"></i></button>
                    <a href="{{route('seyfe1')}}"><button type="button" class="btn btn-danger" style="height:36px; width:40px;" title="Imtina"> <i class="bi bi-x-square"></i></button></a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset



@empty($beditdata)
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h2>BRAND</h2>
            </div>
            <div class="card-body">
                <div class="basic-form">
                  <form method="post" action="{{route('gonder')}}">
                    @csrf
                    Ad:<br>
                    <div class="form-group">
                        <input type="text" class="form-control input-rounded" name="ad" placeholder="Adinizi daxil edin">
                    </div>
                    Soyad:<br>
                    <div class="form-group">
                        <input type="text" class="form-control input-rounded" name="soyad" placeholder="Soyadinizi daxil edin">
                    </div>
                    Email:<br>
                    <div class="form-group">
                        <input type="text" class="form-control input-rounded" name="email" placeholder="Email adresinizi daxil edin">
                    </div>
                    <button type="submit" class="btn btn-primary" style="height:36px; width:40px;" title="Daxil et"><i class="bi bi-arrow-down-square"></i></button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endempty
<br><br><br>



  <div class="col-md-14">
    <div class="white_shd full margin_bottom_30">
      <div class="full graph_head">
          <div class="heading1 margin_0">
            <h2>Brands table</h2>
          </div>
      </div>
      <div class="table_section padding_infor_info">
          <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                      <th>#</th>
                      <th>Ad</th>
                      <th>Soyad</th>
                      <th>Email</th>
                      <th>Tarix</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($bdata as $i=>$info)
                  <tr>
                      <td>{{$i+=1}}</td>
                      <td><img style="height:80px; width:95px;" src="{{url($info->image)}}"></td>
                      <td>{{$info->ad}}</td>
                      <td>{{$info->soyad}}</td>
                      <td>{{$info->tarix}}</td>
                      <td>{{$info->created_at}}</td>
                      <td><a href="{{route('sil', $info->id)}}"><button class="btn btn-danger" style="height:36px; width:40px;" title="Sil"> <i class="bi bi-trash"></i></button></a></td>
                      <td><a href="{{route('edit', $info->id)}}"><button class="btn btn-info" style="height:36px; width:40px;" title="Redaktə et"> <i class="bi bi-pencil"></i></button></a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>


@endsection