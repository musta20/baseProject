
<div id="OpenDeleteModel" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h2>  حذف العنصر</h2>

        <i class="fa-solid fa-xmark close"></i>
      </div>
      <div id="itemToDelete" class="modal-body">
      </div>
     {{--  <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div> --}}
    </div>
  
  </div>


  <script>
    function OpenDeleteModel(e) {

        let span = document.getElementsByClassName("close")[0];
        let modal = document.getElementById("OpenDeleteModel");
        let itemToDelete = document.getElementById("itemToDelete");
        
        itemToDelete.innerHTML=e;

        modal.style.display = "block";
        span.onclick = function() {
        modal.style.display = "none";
        
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}
    </script>    