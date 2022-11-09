@if(session()->has('messages'))



<style>

.flash {
    top: -3%;
    z-index: 100;

  position: absolute;
/*   background-color: greenyellow;
  padding: 2em;
   color: green;
 */  text-align: center;
  left: 0;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  width: 30%;
}

.hideMeAfter5Seconds {
  -webkit-animation: hideAnimation 5s ease-in 5s;
          animation: hideAnimation 5s ease-in 5s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes hideAnimation {
  to {
    opacity: 0;
  }
}

@keyframes hideAnimation {
  to {
    opacity: 0;
  }
}
</style>







<div 
class="flash alert alert-success hideMeAfter5Seconds"
>
{{session("messages")}}
</div>

    
@endif
