
  function unCheck() {
	$( '.glyphicon' ).removeClass( 'glyphicon-check' );
	$( '.btn-select-all-list' ).removeClass( 'down' );
	$( '.btn-select-all-pend' ).removeClass( 'down' );
	$( '.btn-select-all-list .glyphicon' ).addClass( 'glyphicon-unchecked' );	
	$( '.btn-select-all-pend .glyphicon' ).addClass( 'glyphicon-unchecked' );	  
  }	

// Crea el boton cerrar al lado de cada item de la lista
var Nodolist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < Nodolist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  Nodolist[i].appendChild(span);
}

// Elimina elemento al hacer click en el boton Cerrar adjunto 
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Agrega icono de check al hacer click en un elemento de la lista
var list = document.querySelector('#myUL');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

var list2 = document.querySelector('#myUL-2');
list2.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// agrega nuevo elemento  a la lista al presionar boton agregar
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  //valida campo vacio
  if (inputValue === '') {
    alert("Debe ingresar un valor!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
  
    $( '.glyphicon' ).removeClass( 'glyphicon-check' );
	$( '.btn-select-all-list' ).removeClass( 'down' );
	$( '.btn-select-all-pend' ).removeClass( 'down' );
	$( '.btn-select-all-list .glyphicon' ).addClass( 'glyphicon-unchecked' );	
	$( '.btn-select-all-pend .glyphicon' ).addClass( 'glyphicon-unchecked' );
  
}

				

$(document).ready(function(){
//Aplicar la función sortable a la lista con id myUL          
				$( ".list-1" ).sortable({});
//seleccionar/deseleccionar todos los elementos de la columna pendiente
				 $('.btn-select-all-pend').click(function(){					
				  $(this).toggleClass("down");
						if( $( '.btn-select-all-pend' ).hasClass( "down" ) ) {
							$( '.btn-select-all-pend .glyphicon' ).removeClass( 'glyphicon-unchecked' );
							$( '.btn-select-all-pend .glyphicon' ).addClass( 'glyphicon-check' );	
							$('#myUL li').each(function() { 
									$('#myUL li').addClass('checked');
																	   
							});
						}else{
							$( '.btn-select-all-pend .glyphicon' ).removeClass( 'glyphicon-check' );
							$( '.btn-select-all-pend .glyphicon' ).addClass( 'glyphicon-unchecked' );	
							$('#myUL li').each(function() {
								$('#myUL li').removeClass('checked');								
									
							});        
						}		
				});
				
//seleccionar/deseleccionar todos los elementos de la columna listo
				
				$('.btn-select-all-list').click(function(){					
				  $(this).toggleClass("down");
						if( $( '.btn-select-all-list' ).hasClass( "down" ) ) {
							$( '.btn-select-all-list .glyphicon' ).removeClass( 'glyphicon-unchecked' );
							$( '.btn-select-all-list .glyphicon' ).addClass( 'glyphicon-check' );	
							$('#myUL-2 li').each(function() { 
								   $('#myUL-2 li').addClass('checked');  
							});
						}else{
							$( '.btn-select-all-list .glyphicon' ).removeClass( 'glyphicon-check' );
							$( '.btn-select-all-list .glyphicon' ).addClass( 'glyphicon-unchecked' );							
							$('#myUL-2 li').each(function() {							
								$('#myUL-2 li').removeClass('checked');
								
							});        
						}		
				});
			
            });
			
		$(".btn-pass-list").click(function () {
            $("#myUL li.checked").removeClass("checked").appendTo('#myUL-2');
			$( '.btn-select-all-list' ).removeClass( 'down' );
			$( '.btn-select-all-pend' ).removeClass( 'down' );
			$( '.glyphicon' ).removeClass( 'glyphicon-check' );
			$( '.btn-select-all-list .glyphicon' ).addClass( 'glyphicon-unchecked' );	
			$( '.btn-select-all-pend .glyphicon' ).addClass( 'glyphicon-unchecked' );
            
            });

        $(".btn-pass-pend").click(function () {
            $("#myUL-2 li.checked").removeClass("checked").appendTo('#myUL');		
			$( '.btn-select-all-list' ).removeClass( 'down' );
			$( '.btn-select-all-pend' ).removeClass( 'down' );
			$( '.glyphicon' ).removeClass( 'glyphicon-check' );
			$( '.btn-select-all-list .glyphicon' ).addClass( 'glyphicon-unchecked' );	
			$( '.btn-select-all-pend .glyphicon' ).addClass( 'glyphicon-unchecked' );
         
            });

// ordena elementos de la listas por orden alfabetico numerico o caracteres especiales 		
  $("#menu-pend .btn-ord-up").click(function() {
    var sort_by_name = function(a, b) {
        return a.innerHTML.toLowerCase().localeCompare(b.innerHTML.toLowerCase());
		
    }

    var list = $("#myUL > li").get();
    list.sort(sort_by_name);
    for (var i = 0; i < list.length; i++) {
        list[i].parentNode.appendChild(list[i]);
    }});
	
	  $("#menu-pend .btn-ord-dw").click(function() {
    var sort_by_name = function(a, b) {
        return b.innerHTML.toLowerCase().localeCompare(a.innerHTML.toLowerCase());
		
    }

    var list = $("#myUL > li").get();
    list.sort(sort_by_name);
    for (var i = 0; i < list.length; i++) {
        list[i].parentNode.appendChild(list[i]);
    }});
	
	  $("#menu-list .btn-ord-up").click(function() {
    var sort_by_name = function(a, b) {
        return a.innerHTML.toLowerCase().localeCompare(b.innerHTML.toLowerCase());
		
    }

    var list = $("#myUL-2 > li").get();
    list.sort(sort_by_name);
    for (var i = 0; i < list.length; i++) {
        list[i].parentNode.appendChild(list[i]);
    }});
	
	  $("#menu-list .btn-ord-dw").click(function() {
    var sort_by_name = function(a, b) {
        return b.innerHTML.toLowerCase().localeCompare(a.innerHTML.toLowerCase());
		
    }

    var list = $("#myUL-2 > li").get();
    list.sort(sort_by_name);
    for (var i = 0; i < list.length; i++) {
        list[i].parentNode.appendChild(list[i]);
    }});