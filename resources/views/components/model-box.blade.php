
@vite('resources/css/model.css')
<div id="OpenDeleteModel" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h4>  حذف العنصر</h4>

        <i class=" close btn-close btn-close-white ms-auto"></i>
      </div>
      <div id="itemToDelete" class="modal-body m-1 p-2">
      </div>
     {{--  <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div> --}}
    </div>
  
  </div>




  <script>


 function showModel(name, uri) {
return `<form method='POST' 
            action='${uri}' >
            @method('DELETE')
            @csrf
            <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${name}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
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