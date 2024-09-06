
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="menu-footer mb-3 text-center">
			<a href="#" class="font-12 text-white px-3">Careers</a>
			<a href="#" class="font-12 text-white px-3">Media</a>
			<a href="#" class="font-12 text-white px-3">Procurement</a>
			<a href="#" class="font-12 text-white px-3">Targeting Tax Crime</a>
			<a href="#" class="font-12 text-white px-3">Glossary</a>
			<a href="#" class="font-12 text-white px-3">Terms and Conditions</a>
			<a href="#" class="font-12 text-white px-3">Site Map</a>
			<a href="#" class="font-12 text-white px-3">National Treasury</a>
			<a href="#" class="font-12 text-white px-3">Davis Tax Committee</a>
			<a href="#" class="font-12 text-white px-3">Office of the Tax Ombud</a>
		</div>
		<div class="logo-f text-center mb-3 mt-4">
			<img src="assets/images/logo.png">
		</div>
		<div class="copy-right text-center">
			<p>© 2024 All rights reserved</p>
		</div>
	</div>
</div>
<!-- footer -->

<script>
	// This function prevents non-numeric characters from being typed
	function preventNonNumeric(event) {
		const key = event.key;

		// Allow only numeric characters, backspace, and delete keys
		if (!/^[0-9]$/.test(key) && key !== "Backspace" && key !== "Delete") {
			event.preventDefault();
		}
	}

	function validateInput() {
		const inputField = document.getElementById("card-num");
		const errorMessage = document.getElementById("error-message");
		const cardNumber = inputField.value;

		// Display error if length exceeds 16 characters
		if (cardNumber.length > 16) {
			errorMessage.style.display = "block";
		} else {
			errorMessage.style.display = "none";
		}
	}
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
	crossorigin="anonymous"></script>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navToggle = document.querySelector('.nav-toggle');
        const navMenu = document.querySelector('.nav-menu');

        navToggle.addEventListener('click', function () {
            navMenu.classList.toggle('active');
        });
    });
</script>
<script src="./script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>




<script src="assets/js/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.payform.min.js" charset="utf-8"></script>
<script src="assets/js/script.js"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {

        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'fr,de,it,ro,en'
        }, 'google_translate_element');
        setTimeout(function () {
            $("#google_translate_element select").val("de");
            document.querySelector('#google_translate_element select').dispatchEvent(new Event(
                "change")); // or whatever the event type might be
        }, 1000)


    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>


<script>
    // $(document).ready(function(){
    // $(".lang").on("click",function(){

    //     $("#google_translate_element select").val($(this).attr('lang'));
    //     console.log("hello");
    //     //$("").trigger("click");
    //     document.querySelector('#google_translate_element select').dispatchEvent(new Event("change")); // or whatever the event type might be
    // });    

    // });




    document.getElementById("loader").style.display = "none";

    var counter = 0;
    var list = $("#loader_text").children();
    var messagerefresher = setInterval(function () {

        $(list).addClass("hide");
        $(list[counter++]).removeClass("hide");

        if (counter == list.length) {
            counter = 0;
        }


    }, 3000);
</script>