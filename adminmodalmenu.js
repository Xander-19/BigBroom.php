document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("addMotorcycleModal");
    var modalDelete = document.getElementById("deleteMotorModal");
    var modalEdit = document.getElementById("updateMotorModal");
    var btnAdd = document.getElementById("addMotor");
    var btnEdit = document.getElementById("editMotor");
    var btnDel = document.getElementById("delMotor");
    var span = document.getElementsByClassName("close")[0];
    var spann = document.getElementsByClassName("closee")[0];
    var spannn = document.getElementsByClassName("closeee")[0];

    btnAdd.onclick = function(event) {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    // CLOSE and OPEN UPDATE MODAL
    btnEdit.onclick = function(event) {
        modalEdit.style.display = "block";
    }

    spann.onclick = function() {
        modalEdit.style.display = "none";
    }

    // CLOSE and OPEN DELETE MODAL
    btnDel.onclick = function(event) {
        modalDelete.style.display = "block";
    }

    spannn.onclick = function() {
        modalDelete.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        } else if (event.target == modalEdit){
            modalEdit.style.display = "none";
        } else if (event.target == modalDelete){
            modalDelete.style.display = "none";
        }
    }

});