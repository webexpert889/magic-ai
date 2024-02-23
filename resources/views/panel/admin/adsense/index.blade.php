@extends('panel.layout.app')
@section('title', 'Google Adsense')

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
                    <h2 class="page-title mb-2">
                        {{__('Google Adsense')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body pt-6">
        <div class="container-xl">
            <div class="card">
				<div id="table-default" class="card-table table-responsive">
					<table class="table">
						<thead>
						<tr>
                            <th><button class="table-sort" data-sort="sort-name">{{__('Adsense Type')}}</button></th>
                            <th><button class="table-sort" data-sort="sort-group">{{__('Status')}}</button></th>
                            <th><button class="table-sort" data-sort="sort-date">{{__('Updated On')}}</button></th>
                            <th class="!text-end">{{__('Actions')}}</th>
                        </tr>
						</thead>
						<tbody class="table-tbody align-middle text-heading">

                        <!-- TODO DEMO -->
                        @if(env('APP_STATUS') != 'Demo')
                            @foreach($list as $entry)
                                <tr>
                                    <td class="sort-name">{{$entry->header}}</td>
                                    <td class="sort-status">
                                        @if ($entry->status == 1)
                                            <div class="badge bg-success">{{__('Actived')}}</div>
                                        @else
                                            <div class="badge bg-danger">{{__('Deactivated')}}</div>
                                        @endif
                                    </td>
                                    <td class="sort-date" data-date="{{strtotime($entry->created_at)}}">
                                        <span>{{date("d M y H:i A", strtotime($entry->created_at))}}</span>
                                    </td>
                                    <td class="!text-end whitespace-nowrap">
                                        <a href="{{route('dashboard.admin.adsense.edit', $entry->id)}}" class="btn w-[36px] h-[36px] p-0 border hover:bg-[var(--tblr-primary)] hover:text-white" title="{{__('Edit')}}">
                                            <svg width="13" height="12" viewBox="0 0 15 14" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.71875 2.43988L11.9688 5.58995M10.75 11.4963H14M4.25 13.0714L12.7812 4.80248C12.9946 4.59564 13.1639 4.35009 13.2794 4.07984C13.3949 3.8096 13.4543 3.51995 13.4543 3.22744C13.4543 2.93493 13.3949 2.64528 13.2794 2.37504C13.1639 2.10479 12.9946 1.85924 12.7812 1.6524C12.5679 1.44557 12.3145 1.28149 12.0357 1.16955C11.7569 1.05761 11.458 1 11.1562 1C10.8545 1 10.5556 1.05761 10.2768 1.16955C9.99799 1.28149 9.74465 1.44557 9.53125 1.6524L1 9.92135V13.0714H4.25Z" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                               <td colspan="8">User Informations are hidden in demo due to GDPR. See <a href="https://en.wikipedia.org/wiki/General_Data_Protection_Regulation" target="_blank">What is GDPR</a> </td>
                            </tr>
                            <tr>
                                <td class="sort-name">landing-header-section</td>
                                <td class="sort-group">
                                    <div class="badge bg-danger">Deactivated</div>
                                </td>
                                <td class="sort-remaining-words">06 Sep 2023 08:04 AM</td>
                                <td class="!text-end whitespace-nowrap">
                                    <a onclick="return toastr.error('You cannot edit or remove user in demo mode!')" class="btn w-[36px] h-[36px] p-0 border hover:bg-[var(--tblr-primary)] hover:text-white" title="{{__('Edit')}}">
                                        <svg width="13" height="12" viewBox="0 0 15 14" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.71875 2.43988L11.9688 5.58995M10.75 11.4963H14M4.25 13.0714L12.7812 4.80248C12.9946 4.59564 13.1639 4.35009 13.2794 4.07984C13.3949 3.8096 13.4543 3.51995 13.4543 3.22744C13.4543 2.93493 13.3949 2.64528 13.2794 2.37504C13.1639 2.10479 12.9946 1.85924 12.7812 1.6524C12.5679 1.44557 12.3145 1.28149 12.0357 1.16955C11.7569 1.05761 11.458 1 11.1562 1C10.8545 1 10.5556 1.05761 10.2768 1.16955C9.99799 1.28149 9.74465 1.44557 9.53125 1.6524L1 9.92135V13.0714H4.25Z" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="sort-name">landing-features-section-728x900</td>
                                <td class="sort-group">Deactivated</td>
                                <td class="sort-remaining-words">06 Sep 2023 08:04 AM</td>
                                <td class="!text-end whitespace-nowrap">
                                    <a onclick="return toastr.error('You cannot edit or remove user in demo mode!')" class="btn w-[36px] h-[36px] p-0 border hover:bg-[var(--tblr-primary)] hover:text-white" title="{{__('Edit')}}">
                                        <svg width="13" height="12" viewBox="0 0 15 14" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.71875 2.43988L11.9688 5.58995M10.75 11.4963H14M4.25 13.0714L12.7812 4.80248C12.9946 4.59564 13.1639 4.35009 13.2794 4.07984C13.3949 3.8096 13.4543 3.51995 13.4543 3.22744C13.4543 2.93493 13.3949 2.64528 13.2794 2.37504C13.1639 2.10479 12.9946 1.85924 12.7812 1.6524C12.5679 1.44557 12.3145 1.28149 12.0357 1.16955C11.7569 1.05761 11.458 1 11.1562 1C10.8545 1 10.5556 1.05761 10.2768 1.16955C9.99799 1.28149 9.74465 1.44557 9.53125 1.6524L1 9.92135V13.0714H4.25Z" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endif
						</tbody>
						<tfoot>

						</tfoot>
					</table>
                    <div class="flex items-center border-solid border-t border-r-0 border-b-0 border-l-0 border-[--tblr-border-color] px-[--tblr-card-cap-padding-x] py-[--tblr-card-cap-padding-y] [&_.rounded-md]:rounded-full">
						<ul class="pagination m-0 ms-auto p-0"></ul>
                    </div>
				</div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/assets/js/panel/user.js"></script>
@endsection
