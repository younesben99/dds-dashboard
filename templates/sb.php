<html>
    <head><title>
        SB
    </title>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <script src='https://unpkg.com/tesseract.js@4.0.0/dist/tesseract.min.js'></script>


    <script>

(function($) {

$(document).ready(function(){

  console.log(("hey"));

});



})(jQuery);    



    </script>
</head>

    <body>
    <form onsubmit="mindeeSubmit(event)" >
    <input type="file" id="my-file-input" name="file" />
    <input type="submit" />
</form>

<script type="text/javascript">
    const mindeeSubmit = (evt) => {
        evt.preventDefault()
        let myFileInput = document.getElementById('my-file-input');
        let myFile = myFileInput.files[0]
        if (!myFile) { return }
        let data = new FormData();
        data.append("document", myFile, myFile.name);

        let xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                console.log(this.responseText);
            }
        });

        xhr.open("POST", "https://api.mindee.net/v1/products/digiflow/car_document/v1/predict");
        xhr.setRequestHeader("Authorization", "Token e490c81a14737aabc97f72ac27ca8fe4");
        xhr.send(data);
    }
</script>



    </body>
</html>