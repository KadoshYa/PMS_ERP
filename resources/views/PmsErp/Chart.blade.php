@extends('pmsErp.layouts.PmsErp')
@section('title','Create New Task')
@section('content')

<div >
  <div >
    <div >
      <div >
        <div >Chart Demo</div>

        <div >
          {!! $chart->html() !!}
        </div>
      </div>
    </div>
  </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection