@extends('panel.layout.app')
@section('title', 'Edit Google Adsense')

@section('content')
    <div class="page-header">
        <div class="container-xl">
            <div class="row g-2 items-center">
                <div class="col">
					<a href="{{ LaravelLocalization::localizeUrl( route('dashboard.index') ) }}" class="page-pretitle flex items-center">
						<svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z"/>
						</svg>
						{{__('Back to dashboard')}}
					</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body pt-6">
        <div class="container-xl">
			<div class="row">
				<div class="col-md-12 mx-auto">
					<div class="card overflow-hidden border-0">
						<div class="card-header">
							<h3 class="card-title">{{__('Edit Google Adsense Code')}}: <span class="font-weight-bold text-primary">{{$adsense->header}}</span></h3>
						</div>
						<div class="card-body pt-5">
							<form action="{{route('dashboard.admin.adsense.update', $adsense->id)}}" method="POST" enctype="multipart/form-data">
								@method('PUT')
								<div class="row mt-2">
									<div class="col-lg-12 col-md-6 col-sm-12">
										<div class="input-box">
											<label class="form-check form-switch ps-0">
												<span class="form-check-label ms-0 me-2">Adsense Status</span>
												<input class="form-check-input" name="status" type="checkbox" id="hosting_type" value="1" @if ($adsense->status == 1) checked @endif>
											</label>
											@error('status')
												<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>

								<div class="row mt-2">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="input-box">
											<h6>Adsense Code <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>
											<textarea class="form-control" name="code" rows="12" id="richtext">{{$adsense->code}}</textarea>
											@error('code')
												<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
									</div>
								</div>
						
								<div class="border-0 text-left mb-2 mt-3">
									<a href="{{route('dashboard.admin.adsense.index')}}" class="btn btn-cancel mr-2">Cancel</a>
									<button class="btn btn-primary">
										{{__('Save')}}
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/assets/js/panel/user.js"></script>
@endsection
