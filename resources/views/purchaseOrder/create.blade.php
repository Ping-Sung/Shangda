@extends('layouts.backend.master')

@push('CustomJS')
    <script src="{{ asset('js/orders/purchase.js') }}" defer></script>
@endpush   

@section('content')
				
	@component('components.breadcrumbs')
		<li class="breadcrumb-item">
			<a href="#">{{ __('Orders Management') }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="#">{{ __('Purchase Orders') }}</a>
		</li>
		<li class="breadcrumb-item active">{{ __('Create') }}</li>
	@endcomponent

	<div id="purchase">
		<span id="apiSupplierShowName" style="display: none;">{{ route('api.supplier.showName') }}</span>
		<span id="apiSupplierGetInfo" style="display: none;">{{ route('api.supplier.getInfo') }}</span>
		<span id="createSupplier" style="display: none;">{{ route('suppliers.store') }}</span>
		<span id="createPurchaseOrder" style="display: none;">{{ route('purchase.store') }}</span>
		<purchase-create-form :suppliers="suppliers" :current_supplier="current_supplier" v-on:get-supplier-data="getSupplierData" returnURL="{{ route('purchase.index') }}"></purchase-create-form>
	</div>
	
@endsection