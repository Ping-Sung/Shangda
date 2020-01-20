@extends('layouts.backend.master')

@push('CustomJS')
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
@endpush 

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Product Quantities Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="#">{{ __('Product Quantities') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Index') }}</li>
	@endcomponent

	<div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('products.quantities.create') }}" class="btn btn-md btn-primary">
                <i class="fas fa-plus"></i>
                新增商品庫存
			</a>
		</div>
    </div>
	
	<!-- DataTables Example -->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-table"></i>
			商品庫存資料
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
                            <th>編號</th>
                            <th>商品</th>
                            <th>新增庫存量</th>
                            <th>時間</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($pqs as $pq)
							<tr>
                                <td>{{ $pq->id }}</td>
                                <td>{{ $pq->product->name }}</td>
								<td>{{ $pq->quantity }}</td>
								<td>{{ $pq->created_at }}</td>
								<td>
									<a href="{{ route('pqs.show', [$pq->id]) }}" class="btn btn-md btn-info">
										<i class="fas fa-info-circle"></i>
										查看
									</a>
									<a href="{{ route('pqs.edit', [$pq->id]) }}" class="btn btn-md btn-success">
										<i class="fas fa-edit"></i>
										編輯
									</a>
									<a href="#" class="btn btn-md btn-danger" onclick="
										event.preventDefault();
										ans = confirm('確定要刪除此增量嗎?(將會還原至尚未增量之前。)');
										if(ans){
											$('#deleteform-{{ $pq->id }}').submit();
										}
									">
										<i class="far fa-trash-alt"></i>
										刪除
									</a>
									<form id="deleteform-{{ $pq->id }}" action="{{ route('pqs.destroy', [$pq->id]) }}" method="POST" style="displat: none;">
										@csrf
										@method('DELETE')
									</form>
								</td>
							</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted"> {{ __('Last Updated') }} {{ $lastUpdate??'無' }}</div>
	</div>

@endsection
