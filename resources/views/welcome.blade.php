@extends('layouts.app')

@section('content')
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-heading">
                {{ $app->appname }}
            </div>
        </div>
        <div class="panel-body">
            <div class="links">                    
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('admin.login') }}" class="fa-links">
                            <div class="thumbnail tile tile-medium tile-orange">
                                <i class="fa fa-5x fa-laptop"></i>
                                <p>ADMIN PORTAL </p>  
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="thumbnail tile tile-medium tile-purple">
                            <a href="{{ route('agent.login') }}" class="fa-links">
                                <i class="fa fa-5x fa-briefcase  "></i>
                                MARKETER / AGENT PORTAL   
                            </a>
                        </div>
                    </div> --}}
                    <div class="col-md-4">
                        <a href="{{ route('login') }}" class="fa-links">
                            <div class="thumbnail tile tile-medium tile-pink">
                                <i class="fa fa-5x fa-mortar-board"></i>
                                <p>STUDENT PORTAL</p> 
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.login') }}" class="fa-links">
                            <div class="thumbnail tile tile-medium tile-emerald">
                                <i class="fa fa-5x fa-users"></i>
                                <p>LECTURER PORTAL</p>   
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

