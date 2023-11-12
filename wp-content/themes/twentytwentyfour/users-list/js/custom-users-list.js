jQuery(document).ready(function ($) {
    //variables globaleds
    let nombre, apellido1, apellido2, mail = '';
    let users_per_page = $("#users_per_page").val();
    console.log(users_per_page)
    obtenerJson();


    $(document).on('change', '#users_per_page', function (e) {
        if($("#users_per_page").val()>10 || $("#users_per_page").val()<5){
            alert("Error. Introduce un valor entre 5 y 10")
            $("#users_per_page").val(5);
            users_per_page = $("#users_per_page").val();
            obtenerJson(nombre, apellido1, apellido2, mail);
            return; 
        }
        users_per_page = $("#users_per_page").val();
        obtenerJson(nombre, apellido1, apellido2, mail);
    });
    $(document).on('click', '.btn_pagination', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        page = id.substring(id.length-1);
        obtenerJson(nombre ,apellido1, apellido2, mail, page);
    });
    
    
    $(document).on('keyup', '.filter_input', function(){
        nombre = $('#input_nombre').val();
        apellido1 = $('#input_apellido1').val();
        apellido2 = $('#input_apellido2').val();
        mail = $('#input_correo').val();
        obtenerJson(nombre, apellido1, apellido2, mail);
    })

    function filterUsers(allUsers, nombre, apellido1, apellido2, mail){
       const filteredUsers =  allUsers.filter(user => {
            let nameMatch = user.name.toLowerCase().includes(nombre.toLowerCase());
            let sur1Match = user.surname1.toLowerCase().includes(apellido1.toLowerCase());
            let sur2Match = user.surname2.toLowerCase().includes(apellido2.toLowerCase());
            let mailMatch = user.email.toLowerCase().includes(mail.toLowerCase());
            return nameMatch && sur1Match && sur2Match && mailMatch;
        })
        return filteredUsers;
    }
    function incluirPaginacion(users, currentPage){
        const total_users = users.length;
	    let pages = 1;
        pages = Math.floor(total_users / users_per_page);
        if (total_users%users_per_page != 0) {
            pages++;
        }
        if(pages==1){
            $('#contenedor_paginacion').empty();
            return null;
        }
	    let pagination = '<div id="pagination">';
        for (let i=1; i <= pages; i++) { 
            if(currentPage == i)
                pagination += '<button id="page_' + i + '" class="btn_pagination active_page">' + i + '</button>';
            else
                pagination += '<button id="page_' + i + '" class="btn_pagination">' + i + '</button>'; 
        }
        pagination += '</div>';
        return pagination; 
    }
    function obtenerJson(name='', surname1='', surname2='', mail='', page=1){
        $.post("../wp-content/themes/twentytwentyfour/users-list/js/users.json", function(data, status){
            if (status === "success"){
                $('#contenedor_usuarios').empty();
                $('#contenedor_paginacion').empty();
                const filteredUsers = filterUsers(data.usuarios, name, surname1, surname2, mail);
                mostrarUsuarios(filteredUsers, page)
                $('#contenedor_paginacion').append(incluirPaginacion(filteredUsers, page));
            }   
        });
    }
  
    function mostrarUsuarios(users, page){ 
        const initialIndex = (page * users_per_page) - users_per_page;
        let lastIndex = users_per_page*page;
        if(lastIndex > users.length) lastIndex = users.length;
        for(let i=initialIndex;i<lastIndex;i++){
            
            $('#contenedor_usuarios').append(
                '<table class="user_tables">' +
                   '<tr><th>id</th><th>Correo</th><th>Nombre</th><th>Primer apellido</th><th>Segundo apellido</th></tr>'  +
                   '<td>' + users[i].id + '</td><td>' + users[i].email + '</td><td>' + users[i].name + '</td><td>' + users[i].surname1 + '</td><td>' + users[i].surname2 + '</td>' + 
                '</table>'
            );
        }
    }
});

