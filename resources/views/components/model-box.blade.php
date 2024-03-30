@vite('resources/css/model.css')
<div id="OpenDeleteModel" class="modal ">

  <!-- Modal content -->
  {{-- bg-slate-50 w-1/2 p-2 mx-auto transition ease-in-out delay-150 --}}
  <div class="  modal-content rounded-lg">
    <div class=" bg-slate-100 p-3 flex justify-between rounded-lg">
      <h4> حذف العنصر</h4>

      <button class="close">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>


      </button>

    </div>
    <div id="itemToDelete" class="modal-body m-1 p-2">
    </div>
    {{-- <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div> --}}
  </div>

</div>




<script>
  function showModel(name, uri) {

  return `<form method='POST' 
  class='flex flex-col gap-3 py-2 mx-auto'
            action='${uri}' >
            @method('DELETE')
            @csrf
            <div class='' >
            <label> هل انت متأكد من حذف العنصر :</label>
            <br>
            
            <h3 class='text-xl py-3'>${name}</h3>
            <hr>
            <button type='submit' 
            class='my-2 bg-red-500 flex gap-2 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded'

            >حذف</button>
            </div>
        </form>`

}










    function OpenDeleteModel(e) {

        let span = document.getElementsByClassName("close")[0];
        let modal = document.getElementById("OpenDeleteModel");
        let itemToDelete = document.getElementById("itemToDelete");
        
        itemToDelete.innerHTML=e;

        modal.style.display = "block";
        span.onclick = function() {
        modal.style.display = "none";
        
    }
    

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}
</script>