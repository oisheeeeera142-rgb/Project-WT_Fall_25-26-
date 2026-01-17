function validateForm() {
    var roomNumber = document.getElementById("roomNumber").value.trim();
    var floor = document.getElementById("floor").value.trim();
    var view = document.getElementById("view").value.trim();
    var type = document.getElementById("type").value.trim();
    var status = document.getElementById("status").value;

    if (roomNumber === "" || isNaN(roomNumber)) {
        alert("Room Number must be a number!");
        return false;
    }

    if (floor === "" || isNaN(floor)) {
        alert("Floor must be a number!");
        return false;
    }

    if (view === "") {
        alert("View cannot be empty!");
        return false;
    }

    if (type === "") {
        alert("Type cannot be empty!");
        return false;
    }

    if (status === "") {
        alert("Please select a status!");
        return false;
    }

    return true;
}
