const links = document.querySelectorAll("a[data-target='modal']");
let modal = document.getElementById("modal");
let modalBody;

if(modal){
    console.log('modal object found');
    modalBody = modal.querySelector(".modal-body");
}else{
    console.log('modal object not found');
}

$(modal).click(function (){

    event.preventDefault();
    const device_id = this.getAttribute("data-device-id");

    fetch("listDevices.php?device_id=" + device_id)
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
