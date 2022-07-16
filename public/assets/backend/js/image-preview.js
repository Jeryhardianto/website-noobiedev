//* Preview image
function previewProject() {
    document.getElementById("gambarProjectPrev").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("gambarProject").files[0]);

    oFReader.onload = function(oFREvent) {
        document.getElementById("gambarProjectPrev").src = oFREvent.target.result;
    };
};

function previewDProject() {
    document.getElementById("gambarDProjectPrev").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("gambarDProject").files[0]);

    oFReader.onload = function(oFREvent) {
        document.getElementById("gambarDProjectPrev").src = oFREvent.target.result;
    };
};


