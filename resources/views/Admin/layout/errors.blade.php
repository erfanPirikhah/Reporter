
<div id="divError">
    @if ($errors->any())
        <div class="alert alert-danger alert-styled-left alert-bordered" >
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <ul>
                @foreach($errors->all() as $error )
                    <li>  {{$error}}</li>
                @endforeach
            </ul>

        </div>


    @endif
</div>


<script >
   const error = document.querySelector('#divError')
    setTimeout(()=>{
       error.remove();
    },6000)
</script>




