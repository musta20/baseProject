
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


  <style>

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0, 0, 0); /* Fallback color */
  background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
  /* Modal Content */
  /* Add Animation */
  /* The Close Button */
}
.modal .modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
}
@-webkit-keyframes animatetop {
  from {
    top: -300px;
    opacity: 0;
  }
  to {
    top: 0;
    opacity: 1;
  }
}
@keyframes animatetop {
  from {
    top: -300px;
    opacity: 0;
  }
  to {
    top: 0;
    opacity: 1;
  }
}
.modal .close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.modal .close:hover,
.modal .close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.modal .modal-header {
  display: flex;
  justify-content: space-between;
  padding: 1em;
  background-color: #4dd0e1;
  color: white;
}
.modal .modal-body {
  padding: 2px 16px;
}
.modal .modal-footer {
  padding: 2px 16px;
  background-color: #4dd0e1;
  color: white;
}

  </style>

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