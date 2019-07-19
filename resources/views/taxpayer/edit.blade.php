@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card mt-5">
            <div class="card-header text-center">
                Edit Data Restoran
            </div>
            <div class="card-body">
                <a href="/taxpayer/{{$taxpayer->id}}" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>
                {{ Form::open(['action' => ['TaxpayerController@update', $taxpayer->id], 'method' => 'put'])}}
                
                {{ Form::token() }}
                
                <div class="form-group">
                    {{ Form::label('name','Name') }}
                    {{ Form::text('name', $taxpayer->name, ['class' => 'form-control', 'placeholder' => 'Nama']) }}                  
                    
                    @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
                
                <div class="form-group">
                    {{ Form::label('alamat','Alamat') }}
                    {{ Form::textarea('address', $taxpayer->address, ['class' => 'form-control', 'placeholder' => 'Alamat', 'value' => $taxpayer->address]) }}                  
                    @if($errors->has('address'))
                    <div class="text-danger">
                        {{ $errors->first('address') }}
                    </div>
                    @endif
                    
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('latitude','Latitude') }}
                            {{ Form::number('lat', $taxpayer->lat, ['class' => 'form-control', 'placeholder' => 'Latitude', 'value' => $taxpayer->lat, 'id' => 'latitude', 'step' => 'any']) }}                                              
                            @if($errors->has('lat'))
                            <div class="text-danger">
                                {{ $errors->first('lat') }}
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('Longitude') }}
                            {{ Form::number('long', $taxpayer->long, ['class' => 'form-control', 'placeholder' => 'Longitude', 'value' => $taxpayer->long, 'id' => 'longitude', 'step' => 'any']) }}                                              
                            @if($errors->has('long'))
                            <div class="text-danger">
                                {{ $errors->first('long') }}
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
                
                <div id="mapid" class="rounded"></div>
                <hr>
                
                <div class="form-group">
                    {{ Form::label('Information') }}
                    {{ Form::textarea('information', $taxpayer->information, ['class' => 'form-control', 'placeholder' => 'information', 'value' => $taxpayer->information, 'id' => 'editor', 'rows' => '6']) }} 
                    @if($errors->has('information'))
                    <div class="text-danger">
                        {{ $errors->first('information') }}
                    </div>
                    @endif
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>
                
                {{ Form::close() }}
                
            </div>
        </div>
    </div>
</div>

@include('inc.ckeditor')
@include('inc.map')
@endsection