<div class="panel panel-info">
    <div class="panel-heading">Student Performance</div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-5">  
                [<b>{{ $currentMarks->count() }}/{{ $studentUnits->count() }}</b> Units]: Credited Hours = <b>{{ $uh = $studentUnits->sum('unit_hours') }}</b>
            </div>
            <div class="col-md-4">
                Cumulative Points = <b>{{ $tt = $currentMarks->sum('m_gp') }}</b>
            </div>
            <div class="col-md-3">
                Cumulative G.P.A = <b>{{ @round(($tt/$uh),4) }}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"> 
                {!! $chart->html() !!}
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}