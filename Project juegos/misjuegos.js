function deletee(id){
    if (confirm("Estas seguro que quieres eliminar este juego?")) {
        $.ajax({
            url: "delete.php",
            type: "post",
            data: {id:id},
            error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
            },
            success: function () {
                location.reload();
            },
        });
    }
}

function darkmode(){
    var element = document.body;
    element.classList.toggle("darkmode");
}

function editar(id){
    window.location.href = "edit.php?e="+id
}