@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main guideMain aboutMain">
    <div style="background-image: url('{{asset('/images/about/about_bg.jpg.webp')}}');" class="aboutMain-1">
        <h1>Home\About us</h1>
        <span>
            We are EasyTravel, your gateway to extraordinary adventures. With a passion for
            exploration and a commitment to personalized travel, we curate unique experiences tailored to your
            preferences.
        </span>
    </div>
    <div class="aboutMain-2">
        <div class="main-2-content-1">
            <div class="PlusContainer">
                <img src="{{asset('/images/about/customar_bg.png.webp')}}" class="customar" alt="">
            </div>
            <div class="main2ImageContainer">
                <img src="{{asset('/images/about/Rectangle 587.png')}}" alt="">
            </div>
            <div class="heartBeatContainer">
                <h1>
                    10 Years of Experience
                </h1>
            </div>
        </div>
        <div class="main-2-content-2">
            <span>About our company</span>
            <h1>Make the customer the hero of your story</h1>
            <p class="embark">
                Embark on unforgettable adventures with our travel company, where wanderlust becomes a way of
                life.At our travel company, we're not just selling trips; we're crafting stories and memories that
                last a lifetime
            </p>
        </div>
    </div>
    <div style="background-image: url('{{asset('/images/about/bg_3.jpg.webp')}}');" class="aboutMain-3">
        <div class="main-3-1">
            <i class="fa-solid fa-plane-departure"></i>
            <div class="numberContainer">
                <span>
                    Success tours
                </span>
                <span class="numberIncreasing" id="increasingSpan1"></span>

            </div>
        </div>
        <div class="main-3-1">
            <i class="fa-brands fa-glide-g"></i>
            <div class="numberContainer">
                <span>
                    Guides
                </span>
                <span class="numberIncreasing" id="increasingSpan2"></span>
            </div>
        </div>
        <div class="main-3-1">
            <i class="fa-solid fa-hotel"></i>
            <div class="numberContainer">
                <span>
                    Hotels
                </span>
                <span class="numberIncreasing" id="increasingSpan3"></span>
            </div>
        </div>
    </div>
    <div class="aboutMain-4">
        <div class="main4Header">
            <span class="ourTeam">
                Our Team
            </span>
            <span class="subtitle">
                Amazing staff
            </span>
            <h1>Meet Our Team</h1>
        </div>
        <div class="staffContainer">
            <div class="staffCards">
                <div class="staffs">
                    <div class="stafUserImage">
                        <img src="{{asset('/images/about/Rectangle 566.png')}}" alt="">
                        <a href="">
                            <div class="stafUserInstagram">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="stafUserFace">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="stafUserX">
                                <i class="fa-brands fa-x-twitter"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <h3>Aygun Narimanova</h3>
                        <span>admin</span>
                    </div>
                    <div>
                        <span>
                            Information security of the system в компании Aral Plaza

                        </span>
                    </div>
                </div>
                <div class="staffs">
                    <div class="stafUserImage">
                        <img src="{{asset('/images/about/user.png')}}" alt="">
                        <a href="">
                            <div class="stafUserInstagram">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="stafUserFace">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="stafUserX">
                                <i class="fa-brands fa-x-twitter"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <h3>Nihad Karimov</h3>
                        <span>admin</span>
                    </div>
                    <div>
                        <span>
                            Greetings, I'm Nihad, an enthusiastic learner and aspiring developer. My coding journey began with C programming, laying a strong foundation for my passion in web development. I've since honed my skills in HTML, CSS,JavaScript,PHP, and MySQL, and I've found my stride working with the Laravel framework. 
                        </span>
                    </div>
                </div>
                <div class="staffs">
                    <div class="stafUserImage">
                        <img src="{{asset('/images/about/Rectangle 570.png')}}" alt="">
                        <a href="">
                            <div class="stafUserInstagram">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="stafUserFace">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="stafUserX">
                                <i class="fa-brands fa-x-twitter"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <h3>Saleh Nasirov</h3>
                        <span>admin</span>
                    </div>
                    <div>
                        <span>
                            I specialize in troubleshooting and resolving IT issues swiftly, ensuring seamless user experiences. Committed to providing top-notch technical support, I excel in diagnosing and solving complex problems, minimizing downtime, and maximizing productivity.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-image: url('{{asset('/images/about/manuel-moreno-DGa0LQ0yDPc-unsplash.jpg')}}');" class="aboutMain-5">
        <form action="">
            <input type="text" placeholder="Subscribe">
            <button type="submit">Join us</button>
        </form> 
    </div>
</div>
<script src="{{asset('/client/js/scriptAbout.js')}}"></script>
@include('client.clientParts.footer')