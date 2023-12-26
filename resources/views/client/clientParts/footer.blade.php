<footer>
    <div class="footerContainer">
        <div class="footerContent-1">
            <img src="{{asset("/images/mainLogo.svg")}}" alt="">
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's.
            </p>
            <div class="icons">
                <div>
                    <i class="fa-brands fa-facebook-f"></i>
                </div>
                <div>
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
        </div>
        <div class="footerContent-2">
            <ul>
                <li><a href="">About us</a></li>
                <li><a href="">FAQs</a></li>
                <li><a href="">Blogs</a></li>
                <li><a href="">Help</a></li>
                <li><a href="">Trust & Safety</a></li>
            </ul>
        </div>

        <div class="footerContent-2">
            <ul>
                <li><a href="">Travel</a></li>
                <li><a href="">Properties</a></li>
                <li><a href="">Guide</a></li>
                <li><a href="">Packages</a></li>
                <li><a href="">Terms and conditions</a></li>
            </ul>
        </div>
        <div class="footerContent-2 footerContent-3">
            <ul>
                <li>Contact :</li>
                <li>Email: <a href="">nkerimov@std.beu.edu.az</a></li>
                <li>Phone: <a href="">+994-077-395-53-03</a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success')) 
<script>
    toastr.options={
        'progressBar':true
    }
    toastr.success("{{Session::get('success')}}")
</script>
 @endif
@if($errors->any())
@foreach($errors->all() as $error)
<script>
    toastr.options={
        'progressBar':true,
        'closeButton':true
    }
    toastr.error("{{$error}}")
</script>
@endforeach
@endif
<script src="{{asset('/client/js/phoneMenu.js')}}"></script>
<script src="{{asset("/client/js/searchBar.js")}}"></script>
<script src="{{asset("/client/js/myJs.js")}}"></script>
<script src="{{asset("/client/js/nav.js")}}"></script>
<div id="scrollBtn" class="hidden"><i class="fa-solid fa-arrow-up"></i></div>
</main>
</body>

</html>