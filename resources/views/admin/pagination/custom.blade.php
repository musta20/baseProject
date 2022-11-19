@if ($paginator->hasPages())


    <div class="row mt-1" >
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="basic-datatable_info" role="status" aria-live="polite">
                {{ 'عرض ' . $paginator->currentPage() . '    من  ' . $paginator->lastPage() . ' صفحة ' }}
            </div>
        </div>
        <div class="col-sm-12 col-md-7 overflow-hidden">


            <div class="dataTables_paginate paging_simple_numbers" id="basic-datatable_paginate">
                <ul class="pagination pagination-rounded">

                    @if ($paginator->onFirstPage())
                        <li class="paginate_button page-item next disabled"
                         id="basic-datatable_previous">
                            <a href="#" aria-controls="basic-datatable" data-dt-idx="0" tabindex="0"
                                class="page-link">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="paginate_button page-item next " id="basic-datatable_previous">
                            <a href="{{ $paginator->previousPageUrl() }}" aria-controls="basic-datatable"
                                data-dt-idx="0" tabindex="0" class="page-link">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                        </li>
                    @endif



                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled">{{ $element }}</li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="basic-datatable" 
                                        data-dt-idx="1" tabindex="0"
                                            class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="paginate_button page-item ">
                                        <a href="{{ $url }}" aria-controls="basic-datatable" 
                                        data-dt-idx="2"
                                            tabindex="0" class="page-link">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach





                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="paginate_button page-item  previous" id="basic-datatable_next"><a
                                href="{{ $paginator->nextPageUrl() }}" aria-controls="basic-datatable" data-dt-idx="7"
                                tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                    @else
                        <li class="paginate_button page-item previous disabled" id="basic-datatable_next"><a href="#"
                                aria-controls="basic-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i
                                    class="mdi mdi-chevron-left"></i></a></li>
                    @endif


                </ul>
            </div>



        </div>
    </div>




















@endif
