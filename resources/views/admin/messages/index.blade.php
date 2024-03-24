<x-admin-layout>

    <div class="row">
        <div class="page-title-box">
     
            <div class="page-title">
                @if ($type == 1)
                    <h3>الرسائل المرسلة </h3>
                @else
                    <h3>صندوق الوارد</h3>
                @endif
            </div>
<hr>
    
    
        </div>
    </div>

    <x-admin-contaner>

        <div class="page-aside-left">
            <div class="d-grid">
                <a type="button" class="btn btn-danger" 
                href="{{ route('admin.Messages.create') }}"
                > ارسال رسالة</a>
            </div>
            <div class="email-menu-list mt-3">
                <a
                href="{{ url('/admin/inbox/1') }}"
                
                 class={{$type==1 ? "text-danger fw-bold" : ""}}>
                 
                    <i class="ri-inbox-line me-2">
                        
                    </i>صندوق الوارد
{{--                     <span class="badge badge-danger-lighten float-end ms-2">7</span>
 --}}                </a>
               
                <a
                href="{{ url('/admin/inbox/2') }}"
                class={{$type==2 ? "text-danger fw-bold" : ""}}>

                <i class="ri-mail-send-line me-2"></i>الرسائل المرسلة</a>
{{--                 <a
                href="{{ url('/admin/inbox/3') }}"
                class={{$type==3 ? "text-danger fw-bold" : ""}}

                 ><i class="ri-delete-bin-line me-2"></i>سلة المحذوفات</a> --}}

            </div>

          


        </div>
        <div class="page-aside-right">

{{--             <div class="btn-group">
                <button type="button" class="btn btn-secondary"><i class="mdi mdi-archive font-16"></i></button>
                <button type="button" class="btn btn-secondary"><i class="mdi mdi-alert-octagon font-16"></i></button>
                <button type="button" class="btn btn-secondary"><i class="mdi mdi-delete-variant font-16"></i></button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-folder font-16"></i>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-header">Move to:</span>
                    <a class="dropdown-item" href="javascript: void(0);">Social</a>
                    <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                    <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                    <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-label font-16"></i>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-header">Label as:</span>
                    <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                    <a class="dropdown-item" href="javascript: void(0);">Social</a>
                    <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                    <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-horizontal font-16"></i> More
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-header">More Options :</span>
                    <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>
                    <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                    <a class="dropdown-item" href="javascript: void(0);">Add Star</a>
                    <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                </div>
            </div> --}}

            <div class="mt-3">
                <ul class="email-list">
                    @foreach ($Messages as $key => $item)

                    <li>

                        <div class="email-sender-info">

{{--                             <div class="checkbox-wrapper-mail">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="mail20">
                                    <label class="form-check-label" for="mail20"></label>
                                </div>
                            </div> --}}


{{--                             <span class="star-toggle mdi mdi-star-outline"></span>
 --}}                            <a href="javascript: void(0);" class="email-title">
                                @if ($type == 1)
                                {{ $item->toUser->name }}
                        @else
                                {{ $item->fromUser->name }}
                        @endif
                            </a>
                        </div>
                        <div class="email-content">
                            <a href="javascript: void(0);" class="email-subject">
                                {{ $item->title }}
                            </a>
                            <div class="email-date">{{ $item->created_at->isoFormat('dddd D') }}</div>
                        </div>
                        <div class="email-action-icons">
                            <ul class="list-inline">
                 
                                <li class="list-inline-item">
                                    <a  onclick="OpenDeleteModel(showModel('{{ $item->title }}','{{ route('admin.Messages.destroy' , $item->id) }}')))" href="javascript: void(0);">
                                        <i class="mdi mdi-delete email-action-icons-item"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ route('admin.Messages.show' , $item->id) }}" href="javascript: void(0);">
                                        <i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                </li>
                           
                            </ul>
                        </div>
                    </li>
                
                    @endforeach

                </ul>
            </div>
            <!-- end .mt-4 -->

            <!-- end row-->
        </div>
        <x-card-message />


        {{ $Messages->links('admin.pagination.custom') }}


    </x-admin-contaner>
    <x-model-box></x-model-box>

</x-admin-layout>
