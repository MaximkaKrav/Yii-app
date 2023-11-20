const links = document.querySelectorAll("a[data-target=\'modal\']");
const modal = document.getElementById("modal");
const modalBody = modal.querySelector(".modal-body");

links.forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault();

        const store_id = this.getAttribute("data-store-id");

        fetch("index.php?r=list-devices/stores&store_id=" + store_id)
            .then(response => response.text())
            .then(data => {
                modalBody.innerHTML = data;
                modal.style.display = "block";
            });
    });
});

modal.querySelector(".close-button").addEventListener("click", function() {
    modal.style.display = "none";
});