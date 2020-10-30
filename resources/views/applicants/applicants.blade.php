@extends('layouts.header')
@section('title','Applicants')
@section('breadcrumb')
<ol class="breadcrumb pull-right text-primary">
  <li><i class="fa fa-home"> Home</i></li>
  <li class="active"><i class="fa fa-file-text-o"> Applicants</i></li>
</ol>
@endsection
@section('content')
@include('applicants.popups.register')
@include('applicants.popups.newApplicant')
@include('applicants.popups.importModal')
@include('applicants.popups.message')
@component('components.loading')
    <h2>Please Wait...</h2>
@endcomponent
<div class="appendApplicants">
 <div class="panel panel-info">
   <div class="panel-heading">
     Applicants Base - <strong>{{ $applicants->count() }} Applicants</strong>
     <a data-toggle="modal" data-target="#importModal" class="btn btn-danger btn-flat btn-sm pull-right">Import File</a>
     

     <a name="btn_add" id="btn_add" data-target="#myModal" data-toggle="modal" class="btn btn-primary btn-flat btn-sm pull-right">New Applicant</a>
     <div hidden="hidden" class="alert alert-danger" id="deletedApplicants" data-dismiss="alert">
       <span class="close">&times;</span>
     </div>
     @if (session('import'))
     @component('components.alert')
         @slot('type')
             success
         @endslot
         {{session('import')}}
     @endcomponent
     @endif
     @if (session('info'))
     @component('components.alert')
         @slot('type')
             success
         @endslot
        {{session('info')}}
     @endcomponent
     @endif
     @if (session('response'))
     @component('components.alert')
         @slot('type')
             success
         @endslot
        {{session('response')}}
     @endcomponent
     @endif
   </div>
   <form method="post" action="">
     <div class="panel-body" id="refreshPanel">
      <div>
        <div id="printDiv" class="table-responsive">
          <table class="table table-hover table-striped table-condensed" id="datatable" >
            <thead>
              <tr>
               <th><input type="checkbox" id="check_all"></th>
               <th>No</th>
               <th>Name / Form Serial</th>
               <th>Gender</th>
               <th>Campus</th>
               <th>Contacts</th>
               <th>Agent</th>
               <th>Date Applied</th>
               <th>Status</th>
             </tr>
           </thead>
           <tbody>
            @php
            $i=1;
            @endphp
            @foreach($applicants as $applicant)
            <tr>
              <td><input type="checkbox" name="chkbox[]" class="checkbox" data-id="{{$applicant->student_id}}"></td>
              <td>{{ $i++ }}</td>
              <td>{{ $applicant->s_surname.', '.$applicant->s_othernames.' ('.$applicant->s_applicationno.')' }}</td>
              <td>{{ $applicant->s_gender=='F'?'Female':'Male' }}</td>
              <td>{{ $applicant->college_name }}</td>
              <td>{{ $applicant->s_contacts }}</td>
              <td>{{ $applicant->agent->name or null }}</td>
              <td>{{ $applicant->date_applied }}</td>
              <td>
                <p id="status" style="display: none;"></p> 
                @if($applicant->s_approved==0)
                <p id="pending" style="background: yellow"> <i>Pending</i></p>
                @elseif($applicant->s_approved==2)
                <p id="rejected" style="background: red;color: white;"> <i>Rejected<i/></p>
                  @else
                  <p id="registered" style="background: green;color:white;"> <i>Registered</i></p>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel-footer">
     <div class="row">
       <div class="col-md-2">
         <a class="btn btn-success btn-flat" id="edit-selected" data-edit="edit">Edit selected</a>
       </div>
       <div class="col-md-2">
         <a class="btn btn-danger btn-flat" id="delete-selected" data-delete="delete">Delete selected</a>
       </div>
       <div class="col-md-2">
         <a id="reject-selected" data-reject="reject" class="btn btn-warning btn-flat">Reject / Undo</a>
       </div>
       <div class="col-md-2">
         <a id="approve-selected" data-approve="approve" class="btn btn-info btn-flat">Approve Pending</a>
       </div>
       <div class="col-md-2">
         <a id="sms-selected" data-sms="sms" class="btn btn-primary btn-flat">Send SMS</a>
       </div>
     </div>
   </div>
 </form>
</div>
</div>

@endsection
@push('bottom')
@include('scripts.sendmessage')
@include('scripts.classpopup')
@include('applicants.scripts.applicantScript')
@endpush