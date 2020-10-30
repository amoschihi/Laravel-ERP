<div class="alert alert-warning" style="height: 66px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="btn btn-primary btn-flat">
                <i class="fa fa-user fa-fw"></i> User: {{ Auth::user()->name.', Role: '.session('whoIsLoggedIn') }} 
            </div>
            @yield('breadcrumb')
        </div>
    </div>
</div>