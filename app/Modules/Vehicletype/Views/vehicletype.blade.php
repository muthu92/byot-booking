@extends('layouts.app')
@section('menu')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Vehicletype</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Vehicletype</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Vehicletype List</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="vehicletype/vehicletype_add" class="btn btn-sm btn-neutral">New</a>
               
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Vehicletype List</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="vehicletype">
                <thead class="thead-light">
                  <tr>
				   <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="name">Vehicle Type</th> 
					  		
					<th scope="col" class="sort" data-sort="completion">Status</th>					
                    <th scope="col" class="sort" data-sort="completion">Created Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
				@foreach ($vehicletype_list as $key=>$vehicle)
                  <tr>
          <td><span class="status">{{ $key+1 }}</span></td>
                    <td>                     
                      <span class="status">{{ $vehicle->name }}</span>
                    </td>
					
					 
					 <td>                     
                      <span class="status">@if ($vehicle->status==0||$vehicle->status==1) Active @else In Active @endif</span>
                    </td>
					 
					<td>                     
                      <span class="status">{{ \Carbon\Carbon::createFromTimestamp(strtotime($vehicle->created_at))->format('d-m-Y h:m')}}
</span>
                    </td>
                     
                   
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="vehicletype/vehicletype_edit?vehicletype_id={{$vehicle->id}}">Edit</a>
						  <a class="dropdown-item" href="vehicletype/delete?id={{$vehicle->id}}">Delete</a> 
                          
                        </div>
                      </div>
                    </td>
                  </tr>
				   @endforeach
                  
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              {{ $vehicletype_list->links() }}
            </div>
          </div>
        </div>
      </div>       
	   
@endsection

@section('script')

<script>
    $(function () {
        $('#vehicletype').DataTable();
    });
</script>

@endsection