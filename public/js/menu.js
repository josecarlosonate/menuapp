var toogle = false;

$('#btnInfoMenu').on('click', function(){
    // console.log('click');
    // $('#infoHeader').after($('#infoBody').slideToggle("fast"));

    if(!toogle){
        toogle = true;
        $('#infoBody').slideUp("fast");
        $('#btnInfoMenu').html('<i class="fa fa-arrow-down "></i>');
    }else{
        toogle = false;
        $('#infoBody').slideDown("fast");
        $('#btnInfoMenu').html('<i class="fa fa-arrow-up"></i>');
    }
});


var arrayMenu = [];
// rrecorrer el localstorage en busca de categorias
function categoriasLocalstorage() {
    for (var j = 0; j < localStorage.length; j++) {
        if (localStorage.getItem("cat" + j) != null) {
            arrayMenu.push(localStorage.getItem("cat" + j));
        }
    }
    return arrayMenu;
}
categoriasLocalstorage();
divmenu(arrayMenu.length);
// FIN rrecorrer el localstorage en busca de categorias 



// crear div para crear cajas de categorias
function divmenu (num){
    for(var di = 0; di < num; di++ ){
        // div con la caja
        var div = document.createElement('div');
        div.className = 'caja';
        div.id = "cat" + di;

        // div con el nombre de la categoria 
        var divC = document.createElement('div');
        divC.className = 'nombreCategoria';

        // div con las subcategorias
        var divS = document.createElement('div');
        divS.className = 'subCategorias';
        // divS.id = "subcat" + di;

        // ul para div de subcategorias 
        var ul = document.createElement('ul');
        ul.className = 'ulsubcategorias';
        ul.id = "subcat" + di;

        // agregar ul a div de subcategorias 
        divS.append(ul);

        // p con el nombre de la categoria 
        var p = document.createElement('p');
        p.className = 'categoria'; 
        p.append(localStorage.getItem("cat" + di));
        // agregar p nombre de la categoria a div de categoria
        divC.append(p);
        // agregar div nombre de categoria a div de caja 
        div.append(divC);
        div.append(divS);
        
        // agregar div de caja a fondo
        $('.fondoMenu').append(div);

    }
    function repeat(nun){
        var data = 1+'fr';
        var repea = [];
        for(x = 0; x < nun; x++){
            repea.push(data);
        }
        return repea.join(' ');        
    }

    $('.fondoMenu').css({ 
        // gridTemplateColumns: repeat(num)
    });

}


// rrecorrer el localstorage en busca de subcategorias
var arraymenusubcat = [];
function subcategoeiaLocalstorage() {
    for (var sub = 0; sub < localStorage.length; sub++) {
        if(localStorage.getItem('cat'+sub) != null){
            for(var subc = 0; subc < localStorage.length; subc++){
                if(localStorage.getItem('sub'+subc+'cat'+sub) != null){
                    
                    arraymenusubcat.push(localStorage.getItem('sub'+subc+'cat'+sub));
                    var li = document.createElement('li');
                    // span con nombre 
                    var spanN = document.createElement('span');
                    spanN.append(localStorage.getItem('sub'+subc+'cat'+sub));
                    // span con precio 
                    var spanP = document.createElement('span');
                    spanP.append('$precio');
                    // h6 con descripcion 
                    var h6 = document.createElement('h6');
                    h6.append('Escriba aqui la descripcion del plato');
                    // div para info de plato 
                    var divInfo = document.createElement('div');
                    divInfo.className = 'precio';
                    // agregar span a iv precio 
                    divInfo.append(spanN);
                    divInfo.append(spanP);
                    // agregar divinfo al li 
                    li.append(divInfo);
                    li.append(h6);
                    // agregar al ul 
                    $('#subcat'+sub).append(li);
                }
            }
        }
    }
    return arraymenusubcat;
}
subcategoeiaLocalstorage();
// ocultar mas de 2 cajas 
var cajas = document.querySelectorAll('.caja');
for (let i = 3; i < cajas.length; i++) {
    $('#'+cajas[i].id).css({display:'none'});
    
}

//FIN rrecorrer el localstorage en busca de subcategorias
function foto(){
    var caja1 = $('#cat0');
    var divF = document.createElement('div');
    var divborder = document.createElement('div');
    divborder.className = 'fotoBorder';
    divF.className = 'foto';
    // divF.append('suba aqui la foto de la categoria ');
    divF.append(divborder);
    caja1.append(divF);
}
foto();
