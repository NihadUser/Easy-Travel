@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main guideMain">
    <div class="tourPlan-1">
        <h1 class="tour3MainText">
            <img src="{{asset('/images/tour3.svg')}}" alt="">
            Your tour plan has successfully added
        </h1>
            <div class="progressBarContainer">
                <div class="progeressBar">
                    <div class="bar-1 bar-1-2">
                        <div class="bar1Inner bar1Inner-2">
                        </div>
                    </div>
                    <div class="bar-2 bar-2-3">
                        <div class="bar2Inner bar2Inner-3">
                            <img src="{{asset('/images/whiteTour.svg')}}" alt="">
                        </div>
                        <div class="bar4Inner bar3Inner-3">
                            <img src="{{asset('/images/whiteTour.svg')}}" alt="">
                        </div>
                    </div>

                </div>
            </div>
        <div class="tour3ContentContainer">
            <div class="tour3Content">
                <button id="copy-url-button" class="tour3ContentBtn"><img src="{{asset('/images/share.svg')}}" alt="">Share</button>
                <a href="{{route('home')}}" class="homeBackLink">Back to Home</a>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const copyUrlButton = document.getElementById("copy-url-button");

        copyUrlButton.addEventListener("click",async function  () {
            const currentURL = window.location.href;

            // Create a temporary input element to copy the URL to the clipboard
            const tempInput = document.createElement("input");
            tempInput.value = currentURL;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            let image=document.createElement('img');
            img.src="{{asset('/images/share.svg')}}"
            // Provide user feedback (optional)
            copyUrlButton.innerHTML = "URL Copied!";
            await setTimeout(function () {
                copyUrlButton.innerHTML = image+"Share";
            }, 2000);
        });
    });
</script>
@include('client.clientParts.footer')
