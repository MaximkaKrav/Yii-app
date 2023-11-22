// const links = document.querySelectorAll("a[data-target=\'modal\']");
// const modal = document.getElementById("modal");
// const modalBody = modal.querySelector(".modal-body");
//
//
// $(modal).click(function (event){
//
//     event.preventDefault();
//     const name_store = this.getAttribute("data-name-store");
//
//     fetch("index.php?r=devices/stores&name_store=" + name_store)
//         .then(response => response.text())
//         .then(data => {
//             if(modal && modalBody){
//                 modalBody.innerHTML = data;
//                 modal.style.display = "block";
//                 modal.classList.remove('hidden'); // Show the modal
//             }
//         });
//
// })
//
//
//
//
// if(modal){
//     modal.querySelector(".close-button").addEventListener("click", function() {
//         modal.style.display = "none";
//         modal.classList.add('hidden'); // Hide the modal
//     });
// }



const links = document.querySelectorAll("a[data-target=\'modal\']");
const modal = document.getElementById("modal");
const modalBody = modal.querySelector(".modal-body");

links.forEach(function(link) {
    link.addEventListener("click", function (event) {
        event.preventDefault();

        const name_store = this.getAttribute("data-name-store");

        fetch("index.php?r=devices/stores-list&name_store=" + name_store)
            .then(response => response.text())
            .then(data => {
                modalBody.innerHTML = data;
                modal.style.display = "block";
            });
    });
});
if(modal){
    modal.querySelector(".close-button").addEventListener("click", function() {
        modal.style.display = "none";
        modal.classList.add('hidden'); // Hide the modal
    });
}