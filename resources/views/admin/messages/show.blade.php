<x-admin-layout>

    <div class="row">
        <div class="page-title-box"> 
            تفاصيل الرسالة
        </div>
    </div>

    <x-admin-contaner>
        <div class="p-1 w-75">
            <div class=" px-3 pt-3 pb-0">       
                <div class="mb-2">
                    <label for="msgto" class="form-label">من</label>    
               <div class="conversation-text">{{ $message->fromm->name }}</div> 
                </div>

            </div>
            <div class=" px-3 pt-3 pb-0">       
                <div class="mb-2">
                    <label for="msgto" class="form-label">الى</label>    
               <div class="conversation-text">{{ $message->too->name }}</div> 
                </div>

            </div>  

            <div class=" px-3 pt-3 pb-0">       
                <div class="mb-2">
                    <label for="msgto" class="form-label">عنوان الرسالة</label>    
               <div class="conversation-text">{{ $message->title }}</div> 
                </div>

            </div>  
            <div class="write-mdg-box mb-3">
                <label class="form-label"> نص الرسالة</label>
            <div class="conversation-text"  >{{ $message->message }}</div>
        </div>

        <div class="px-3 pb-3">
    

            <a type="button" href="{{ url('admin/inbox/1') }}" class="btn btn-light">عودة</a>
        </div>
    </x-admin-contaner>
</x-admin-layout>
