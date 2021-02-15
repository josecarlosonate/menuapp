function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if ($(window).scrollTop() != scroll_to) {
        $("html, body")
            .stop()
            .animate({ scrollTop: scroll_to }, 0);
    }
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data("number-of-steps");
    var now_value = progress_line_object.data("now-value");
    var new_value = 0;
    if (direction == "right") {
        new_value = now_value + 100 / number_of_steps;
    } else if (direction == "left") {
        new_value = now_value - 100 / number_of_steps;
    }
    progress_line_object
        .attr("style", "width: " + new_value + "%;")
        .data("now-value", new_value);
}

var BandCategoria;

function preguntar(){
    if(localStorage.getItem('cat0')){
        BandCategoria = true; 
        $('#licat').text('Listado de categorias agregadas');
        $('#licat').removeClass('text-danger');
        $('#licat').addClass('text-success');
    }else{
        BandCategoria = false;
        $('#licat').text('Aun no hay categorias agregadas');
        $('#licat').removeClass('text-success');
        $('#licat').addClass('text-danger');
    }
    return BandCategoria;  
}

var BandSubCategoria = false;

function preguntarsub(){
    for(var cat = 0; cat < localStorage.length; cat++){
        if(localStorage.getItem('cat'+cat) != null){
            if(localStorage.getItem('sub0'+'cat'+cat)){
                BandSubCategoria = true;
                $('#lblsub').removeClass('ocultar');
                $('#lblsub').addClass('text-success');
                $('#tbSinSubCategorias').addClass('ocultar');
                return BandSubCategoria; 
            }
        }
    }
    if(BandSubCategoria){
        $('#lblsub').removeClass('ocultar');
        $('#lblsub').addClass('text-success');
        $('#tbSinSubCategorias').addClass('ocultar');
    }else{
        BandSubCategoria = false;
        $('#lblsub').addClass('ocultar');
        $('#tbSinSubCategorias').removeClass('ocultar');
    }

}

preguntar();
preguntarsub();

// mostrar primera caja paso 1
$(".f1 fieldset:first").fadeIn("slow");

// quitar clase error del input si esta en focus
$('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on(
    "focus",
    function() {
        $(this).removeClass("input-error");
    }
);

// click sobre el boton siguiente 
$(".f1 .btn-next").on("click", function() {
    // seleccionar fieldset o caja con pasa actual 
    var padre_fieldset = $(this).parents("fieldset");
    // activar bandera 
    var next_step = true;
    // seleccionar icono activo actual
    var current_active_step = $(this).parents(".f1").find(".f1-step.active");
    // seleccionar linea de progreso actual
    var progress_line = $(this).parents(".f1").find(".f1-progress-line");
    // validar que los campos no esten vacios 
    padre_fieldset.find('input[type="text"], input[type="password"], textarea')
        .each(function() {
            if(BandCategoria){  
                next_step = true;
            }else{  
                if ($(this).val() == "") {
                    $(this).addClass("input-error");
                    next_step = false;
                } else {
                    $(this).removeClass("input-error");
                }
            }
        });
    // fin validacion

    // si bandera es true 
    if (next_step) {
        // ocultar caja paso actual 
        padre_fieldset.fadeOut(400, function() {
            // cambiar icono activo al siguiente icono con siguiente paso
            current_active_step.removeClass("active").addClass("activated").next().addClass("active");
            // barra de progreso
                bar_progress(progress_line, "right");
            // mostrar proxima caja con paso siguiente
                $(this).next().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($(".f1"), 20);
                // cambiar titulo y subtitulo  de la caja 
                if($(this).next().attr('id') == 'p2'){
                    $(".stepTitulo").text("Crea Tus Categorias");
                    $(".stepInfo").text("Ejemplo categoria: Almuerzos - Desayunos - Bebidas.");
                    pintarCategoriaspaso2();
                    // console.log('paso2');
                }
                if($(this).next().attr('id') == 'p3'){
                    $(".stepTitulo").text("Crea Tus SubCategorias");
                    $(".stepInfo").text("Ejemplo Almuerzo ejecutivo - Vino rojo");
                    pintarCategoriaspaso3();
                    pintarSubCategoriaspaso3();
                }
            
        })
    }
});

// click sobre el boton atras
$(".f1 .btn-previous").on("click", function() {
    // seleccionar icono activo actual
    var current_active_step = $(this).parents(".f1").find(".f1-step.active");
    // seleccionar linea de progreso actual
    var progress_line = $(this).parents(".f1").find(".f1-progress-line");
    $(this).parents("fieldset").fadeOut(400, function() {
        // cambiar icono
        current_active_step.removeClass("active").prev().removeClass("activated").addClass("active");
        // barra de progreso
        bar_progress(progress_line, "left");
        // ver paso previo
        $(this).prev().fadeIn();
//      // scroll window to beginning of the form
        scroll_to_class($(".f1"), 20);
    });

});

// click sobre el boton ver menu
$("#btnverMenu").on("click", function(e) {
    e.preventDefault();
    preguntarsub();
    if(BandSubCategoria){
        $('#nameSubcategoria').removeClass("input-error");
        window.location.href = "http://menuapp.test/TuMenu";
    }else{
        $('#nameSubcategoria').addClass('input-error');
    }
})

//************************Bloque remover clase de error en los campos****************************
    // quitar error de categoria
    $("#categoria").on("focus", function() {
        $("#errorCategoria").addClass("ocultar");
    });
    // quitar error select de categoria
    $("#sltcategoria").on("focus", function() {
        $("#errorSltCategoria").addClass("ocultar");
        $("#sltcategoria").removeClass("input-error");
    });
    // quitar error input precio
    $("#precio").on("focus", function() {
        $("#errorPrecio").addClass("ocultar");
        $("#precio").removeClass("input-error");
    });
    // quitar error input nombre subcategoria
    $("#nameSubcategoria").on("focus", function() {
        $("#errorsubc").addClass("ocultar");
        $("#nameSubcategoria").removeClass("input-error");
    });
//************************FIN Bloque remover clase de error en los campos****************************


//************************Bloque para  agregar una categoria****************************

   // capturar elementos del DOM para bloque paso 2 (agregar una categoria)
    var btnAgregar = $('#btnAgregar');
    var ul = $('#ulCategoria');
    var categoria = $('#categoria');
    // FIN capturar elementos del DOM para bloque paso 2 (agregar una categoria)
    
    // array para capturar las categorias guardadas en local storage 
    var arraycat = [];

    // rrecorrer el localstorage en busca de categorias
    function rrecorerLocalstorage() {
        for (var j = 0; j < localStorage.length; j++) {
            if (localStorage.getItem("cat" + j) != null) {
                arraycat.push(localStorage.getItem("cat" + j));
            }
        }
        return arraycat;
    }
    // FIN rrecorrer el localstorage en busca de categorias 

    // // llamo funcio que rrecorre el localstorage 
    var arrayConCategorias = rrecorerLocalstorage();

    // declaracion de contadores
    if(arrayConCategorias.length <= 1){
        var cont2 = 1;
    }else{
        cont2 = arrayConCategorias.length;
    }
    var cont = 0;

    // dar click  a boton agregar categoria
    btnAgregar.on('click', function(){
        // validar que el campo categoria no venga vacio 
        if(categoria.val()){
            // validar que no exista ninguna categoria creada
            if (!BandCategoria) {
                // crear nuevo elemento li
                var li = document.createElement("li");
                li.className = "list-group-item";
                // pasar texto que viene como categoria a un formato de su primera letra en mayuscula 
                // tomo  el nombre de categoria y la convierto en array 
                var arraytext2 = categoria.val().split(" ");
                // array para nuevo texto
                var arraytextNuevoenMayuscula2 = [];
                for (var i = 0; i < arraytext2.length; i++) {
                    arraytextNuevoenMayuscula2.push(arraytext2[i].charAt(0).toUpperCase() +arraytext2[i].slice(1));
                }
                // FIN pasar texto que viene como categoria a un formato de su primera letra en mayuscula
                // asigno nuevo texto al li 
                li.append(arraytextNuevoenMayuscula2.join(" "));
                // agrego al DOM
                ul.append(li);
                // resetear campo 
                categoria.val(" ");
                // agrego al localstorage  con subindice cont
                localStorage.setItem('cat'+cont,arraytextNuevoenMayuscula2.join(" "));
                rrecorerLocalstorage();
                preguntar();
                // agregar valor al contador 
                // cont++;
            }else{                  
                // guardar sin sobrescribir las categorias ()
                    // crear nuevo elemento li con su clase 
                    var li2 = document.createElement("li");
                    li2.className = "list-group-item";
                    // pasar texto que viene como categoria a un formato de su primera letra en mayuscula 
                    // tomo  el nombre de categoria y la convierto en array 
                    var arraytext = categoria.val().split(" ");
                    // array para nuevo texto
                    var arraytextNuevoenMayuscula = [];
                    for (var i = 0; i < arraytext.length; i++) {
                        arraytextNuevoenMayuscula.push(arraytext[i].charAt(0).toUpperCase() +arraytext[i].slice(1));
                    }
                    // FIN pasar texto que viene como categoria a un formato de su primera letra en mayuscula
                    // asigno nuevo texto al li 
                    li2.append(arraytextNuevoenMayuscula.join(" "));
                    // agrego al DOM
                    ul.append(li2);
                    // agrego al localstorage  con subindice cont2                   
                    localStorage.setItem('cat'+cont2,arraytextNuevoenMayuscula.join(" "));
                    // agregar valor al contador 
                    cont2++;
                    // resetear campo 
                    categoria.val(" ");
            }
        }else{
            // alert si el campo categoria viene vacio 
            $('#errorCategoria').removeClass('ocultar');
            return false;            
        }
    });
    // FIN dar click  a boton agregar categoria

//************************ FIN Bloque para  agregar una categoria****************************

//************************Bloque para  pintar categorias en el DOM****************************
    function pintarCategoriaspaso2() {
    // borrar o limpiar ul
    ul.empty();
    // tomar datos del localStorage
    for (var k = 0; k < localStorage.length; k++) {
        if (localStorage.getItem("cat" + k) != null) {
            // crear nuevo elemento li con su clase
            var li3 = document.createElement("li");
            li3.className = "list-group-item";
            li3.append(localStorage.getItem("cat" + k));
            // agrego al DOM
            ul.className = "list-group list-group-flush";
            ul.append(li3);
        }
    }
    }
//************************FIN Bloque para  pintar categorias en el DOM****************************    

//************************Bloque para  pintar categorias en el select y tabla del paso crear subcategorias*
    // capturar elementos del DOM
    var sltcategoria = $('#sltcategoria');
    var thead = $('#tablaCabeza');
    var tbody = $('#tablaCuerpo');
    // Fin capturar elementos del Dom

    // funcion para pintar 
    function pintarCategoriaspaso3(){
        // borrar o limpiar select
        sltcategoria.empty();
        // borrar o limpiar thead de tabla
        thead.empty();
        // borrar o limpiar tbody de tabla
        tbody.empty();
        // tomar datos del localStorage
        for (var m = 0; m < localStorage.length; m++) {
            if (localStorage.getItem("cat" + m) != null) {
                // pintar en el select
                var opcion = document.createElement("option");
                opcion.value = "cat" + m;
                opcion.append(localStorage.getItem("cat" + m));
                // agregar al DOM
                sltcategoria.append(opcion);
                // pintar en la tabla-head
                var th = document.createElement("th");
                th.id = "cat" + m;
                th.append(localStorage.getItem("cat" + m));
                // agregar al DOM
                thead.append(th);
                // tabla-body
                var thBody = document.createElement("th");
                thBody.id = "thcat" + m;
                // agregar al DOM
                tbody.append(thBody);
            }
        }
    }
//************************FIN Bloque pintar categorias en el select del paso crear subcategorias***
    
//************************Bloque para  agregar una Subcategoria****************************
    // capturar elementos del DOM
    var btnAgregarSub = $('#btnAgregarS');
    var precio = $('#precio');
    var subcategoria = $('#nameSubcategoria');
    // Fin capturar elementos del Dom

    // array para capturar las subcategorias guardadas en local storage 
    var arraysubcat = [];

    // rrecorrer el localstorage en busca de subcategorias
    function recorerLocalstoragesub() {
        for (var sub = 0; sub < localStorage.length; sub++) {
            if(localStorage.getItem('cat'+sub) != null){
                for(var subc = 0; subc < localStorage.length; subc++){
                    if(localStorage.getItem('sub'+subc+'cat'+sub) != null){
                        // console.log(localStorage.getItem('sub'+subc+'cat'+sub));
                        arraysubcat.push(localStorage.getItem('sub'+subc+'cat'+sub));
                    }
                }
            }
        }
        return arraysubcat;
    }
    //FIN rrecorrer el localstorage en busca de subcategorias

    // // llamo funcio que rrecorre el localstorage 
    var arrayConSubCategorias = recorerLocalstoragesub();

    // declaracion de contadores
    if(arrayConSubCategorias.length <= 1){
        var contsub = 1;
    }else{
        contsub = arrayConSubCategorias.length;
    }

    // dar click  a boton agregar SubCategoria
    btnAgregarSub.on('click', function(){
        // validar campo lleno de seleccionar categoria 
        if(sltcategoria.val()){
            // validar campo lleno precio 
            if(precio.val()){
                // validar campo lleno precio
                if(subcategoria.val()){
                    // validar que no exista ninguna subcategoria creada
                    if (!BandSubCategoria) {
                        // todas las validaciones estan ok procedo a agregar subcategoria al DOM
                        // crear nuevo elemento
                        var pBody = document.createElement("p");
                        // cambio por primeras letras en mayusculas
                        // tomo  el nombre de subcategoria y la convierto en array
                        var arraytextsubcat = subcategoria.val().split(" ");
                        // array para nuevo texto
                        var arraytextNuevoenMayusculasubcat = [];
                        for (var i = 0; i < arraytextsubcat.length; i++) {
                            arraytextNuevoenMayusculasubcat.push(
                                arraytextsubcat[i].charAt(0).toUpperCase() +
                                    arraytextsubcat[i].slice(1)
                            );
                        }
                        // FIN pasar texto que viene como categoria a un formato de su primera letra en mayuscula
                        // asigno nuevo texto al thsubcat
                        pBody.append(arraytextNuevoenMayusculasubcat.join(" "));
                        // agrego al DOM *******
                        // seleciono th
                        $("#th" + sltcategoria.val()).append(pBody);
                        // agrego al localstorage  con subindice 0
                        localStorage.setItem(
                            "sub0" + sltcategoria.val(),
                            arraytextNuevoenMayusculasubcat.join(" ")
                        );
                        preguntarsub();
                        // resetear campo
                        subcategoria.val(" ");
                        // precio.val(" ");
                    }else{
                        // guardar sin sobrescribir las subcategorias ()
                        // crear nuevo elemento
                        var pBody2 = document.createElement("p");
                        // cambio por primeras letras en mayusculas
                        // tomo  el nombre de subcategoria y la convierto en array
                        var arraytextsubcat2 = subcategoria.val().split(" ");
                        // array para nuevo texto
                        var arraytextNuevoenMayusculasubcat2 = [];
                        for (var i = 0; i < arraytextsubcat2.length; i++) {
                            arraytextNuevoenMayusculasubcat2.push(
                                arraytextsubcat2[i].charAt(0).toUpperCase() +
                                    arraytextsubcat2[i].slice(1)
                            );
                        }
                        // FIN pasar texto que viene como categoria a un formato de su primera letra en mayuscula
                        // asigno nuevo texto al thsubcat
                        pBody2.append(arraytextNuevoenMayusculasubcat2.join(" "));
                        // agrego al DOM *******
                        // seleciono th
                        $("#th" + sltcategoria.val()).append(pBody2);
                        // agrego al localstorage
                        localStorage.setItem("sub"+contsub+sltcategoria.val(),arraytextNuevoenMayusculasubcat2.join(" ")
                        );
                        // agregar valor al contador 
                        contsub++;
                        // resetear campo
                        subcategoria.val(" ");
                        // precio.val(" ");
                    }
                }else{
                    // mostrar alert de sin subcategoria
                    subcategoria.addClass("input-error");
                    $('#errorsubc').removeClass('ocultar');
                }
            }else{
                // mostrar alert de sin precio
                precio.addClass("input-error");
                $('#errorPrecio').removeClass('ocultar');
            }
        }else{
            // mostrar alert de sin categoria seleccionada 
            sltcategoria.addClass("input-error");
            $('#errorSltCategoria').removeClass('ocultar');
        }
    })
    //FIN dar click  a boton agregar SubCategoria

//************************FIN Bloque para  agregar una Subcategoria****************************

//************************Bloque para  pintar subcategorias en el DOM****************************
function pintarSubCategoriaspaso3() {
    // borrar o limpiar tbody
    // tbody.empty();
    // tomar datos del localStorage
    for (var n = 0; n < localStorage.length; n++) {
        if(localStorage.getItem('cat'+n) != null){
            for(var o = 0; o < localStorage.length; o++){
                if(localStorage.getItem('sub'+o+'cat'+n) != null){
                    // console.log(localStorage.getItem('sub'+o+'cat'+n),'Categoria: '+'cat'+n);
                    // crear nuevo elemento
                    var pBody3 = document.createElement("p");
                    pBody3.append(localStorage.getItem('sub'+o+'cat'+n));

                    // console.log(localStorage.getItem('sub'+o+'cat'+n));

                    
                    $('#thcat'+n).append(pBody3);
                    // $("#th" + 'cat'+n).append(pBody3);
                    // $("#th" + 'cat'+n).append(pBody3);
                }
            }
        }
    }
}
pintarSubCategoriaspaso3();

//************************FIN Bloque para  pintar subcategorias en el DOM****************************

// tecla enter 


