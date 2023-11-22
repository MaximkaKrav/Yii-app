const links = document.querySelectorAll("a[data-target=\'modal\']");
const modal = document.getElementById("modal");
const modalBody = modal.querySelector(".modal-body");

if(modal){
    console.log('modal object found');
    modalBody = modal.querySelector(".modal-body");
}else{
    console.log('modal object not found');
}

$(modal).click(function (event){

    event.preventDefault();
    const name_store = this.getAttribute("data-name-store");

    fetch("index.php?r=list-devices/stores&name_store=" + name_store)
        .then(response => response.text())
        .then(data => {
            if(modal && modalBody){
                modalBody.innerHTML = data;
                modal.style.display = "block";
                modal.classList.remove('hidden'); // Show the modal
            }
        });

})




if(modal){
    modal.querySelector(".close-button").addEventListener("click", function() {
        modal.style.display = "none";
        modal.classList.add('hidden'); // Hide the modal
    });
}
