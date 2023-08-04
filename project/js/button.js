const defaultButton = document.querySelector("#default_button");
const img = document.querySelector("#img_img");

defaultButton.addEventListener("change", function(event){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        var extension = file.name.split('.').pop().toLowerCase();
        reader.onload = function(){
            const result = reader.result;
            img.src = result;
            
            if(extension === "png") {
                document.querySelector(".img_wrapper .image").style.background = "white";
            }
            else{
                document.querySelector(".img_wrapper .image").style.background = "none";
            }
        }   
        reader.readAsDataURL(file);
    }
    return false;
});

document.querySelector(".cancel_button").addEventListener("click", function(event){
    event.preventDefault();
    img.src = "";
    document.querySelector(".img_wrapper .image").style.background = "none";
});