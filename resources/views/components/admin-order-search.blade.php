<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

    <div class="p-1 w-75">
        <div class=" px-3 pt-3 pb-0">
            <div class="mb-2">
                <label for="msgto" class="form-label">الاسم</label>
           <div class="conversation-text">{{ $resault->name }}</div>
            </div>

        </div>
        <div class=" px-3 pt-3 pb-0">
            <div class="mb-2">
                <label for="msgto" class="form-label">البريد الاك</label>
           <div class="conversation-text">{{ $resault->id }}</div>
            </div>

        </div>

        <div class=" px-3 pt-3 pb-0">
            <div class="mb-2">
                <label for="msgto" class="form-label">عنوان الرسالة</label>
           <div class="conversation-text">{{ $message->title }}</div>
            </div>

        </div>
        <div class="px-3 pt-3 pb-0">
            <label class="form-label"> نص الرسالة</label>
        <div class="conversation-text"  >{{ $message->message }}</div>
        <hr>
    </div>

</div>