// ******************* AUTOCOMPLETADO *****************************
/**
 * 
 * @param {*} inp -> input al que se le está aplicando el autocompletado 
 * @param {*} inp_ids -> input que servirá ára settear el id del registro seleccionado
 * @param {*} arr -> Array que aloja la información obtenida de la BD a la cual se le aplica el autocompletado
 * @param {*} arr_ids -> Array que aloja los IDs de la información obtenida de la BD a la cual se le aplica el autocompletado
 */
function autocomplete(inp_ids, inp, arr_ids, arr) {
    // console.log('*******desde la libreria********');
    // console.log(arr);
    var currentFocus;
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
            
            if (( arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase() ) || (arr[i].toUpperCase().includes(val.toUpperCase())) ) {
                b = document.createElement("DIV");
                b.setAttribute("class", "list-group-item"); //si se pude modificar [list-group-item es de bootstrap5]
                // b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                // b.innerHTML += arr[i].substr(val.length);
                b.innerHTML += arr[i]; //MOSTRAMOS LOS DATOS
                b.innerHTML += "<input type='hidden' value='" + arr_ids[i] + "'>"; //obtenemos el id del registro
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                b.addEventListener("click", function(e) {
                    inp_ids.value = this.getElementsByTagName("input")[0].value; //seteamos el id del registro seleccionado
                    inp.value = this.getElementsByTagName("input")[1].value;
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            
            currentFocus++;
            
            addActive(x);
        } else if (e.keyCode == 38) { 
            currentFocus--;
            
            addActive(x);
        } else if (e.keyCode == 13) {
            
            e.preventDefault();
            if (currentFocus > -1) {
            
            if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
        }
    }
    }

    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}


// autocomplete(document.getElementById("marca"), marcas);
// // autocomplete(document.getElementById("linea"), lineas);
// autocomplete(document.getElementById("cilindrada"), cilindradas);
// autocomplete(document.getElementById("modelo"), modelos);
// let element_linea=document.getElementById("linea");

// element_linea.addEventListener("keydown", function(e) {
//     let pivote_marca = document.getElementById("marca").value;

//     if(pivote_marca.toUpperCase()=="BAJAJ")autocomplete(document.getElementById("linea"), lineas_bajaj);
//     if(pivote_marca.toUpperCase()=="HONDA")autocomplete(document.getElementById("linea"), lineas_honda);
//     if(pivote_marca.toUpperCase()=="SUZUKI")autocomplete(document.getElementById("linea"), lineas_suzuki);
//     if(pivote_marca.toUpperCase()=="YAMAHA")autocomplete(document.getElementById("linea"), lineas_yamaha);
// });

// ******************* AUTOCOMPLETADO *****************************