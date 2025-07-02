<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $currentPage ?? 'Dashboard' }}</h3>
            </div>


            <div class="col-sm-6">
                @if(isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs))
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end mb-0">
                        @foreach($breadcrumbs as $breadcrumb)
                        @if(!empty($breadcrumb['url']))
                        <li class="breadcrumb-item">
                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                        </li>
                        @else
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $breadcrumb['name'] }}
                        </li>
                        @endif
                        @endforeach
                    </ol>
                </nav> @endif
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>