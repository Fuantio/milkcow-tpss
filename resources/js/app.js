/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//******* CONSTANTE NOVEDADES ANIMALES DE JHORMAN */
const consultaCantidadNovedades = "http://127.0.0.1:8000/contarNovedades"
//******* CONSTANTE PRODUCCIONES -FUAN */
const consultaCantidadProducciones = "http://127.0.0.1:8000/contarProduccion"
//+++++++ CONSTANTE USUARIOS - WILFREN */
const consultarCantidadUsuarios = "http://127.0.0.1:8000/contarUsuarios"
//********* CONSTANTE VACAS - DANIELA */
const consultarCantidadAnimales = "http://127.0.0.1:8000/contarAnimales"
//********* CONSTANTE DESPACHOS - JUAN */
const consultaCantidadDespachos = "http://127.0.0.1:8000/contarDespachos"
//********* CONSTANTE NOVEDAD PRODUCCION - JOHAN */
const consultaCantidadNovedadesProduccion = "http://127.0.0.1:8000/contarNovedadesProduccion"

const app = new Vue({

    el: '#app',
    data:{
             //*************VARIABLES DE NOVEDADES DE ANIMALES -JHORMAN */ 
        fechaNovedad: '',
        nombreVaca: '',
        novedades: [],
        totalNovedades: 0,
        novedadesPagina: 6,
        paginasNovedadAnimal: '', 
        paginaActualNovedadAnimal: 1, 
        desdeNovedadAnimal: '',
        hastaNovedadAnimal: '', 
        ocultarMostrarAnteriorNovedadAnimal: '',
        ocultarMostrarSiguienteNovedadAnimal: '', 
        botonesNovedadAnimal: [],

      //*************VARIABLES DE PRODUCCION -FUAN */ 

        textoProduccion: '',
        producciones: [],
        textoVaca: '',
        totalProduccion: 0,
        produccionPagina: 10,
        paginasProduccion: '',
        paginaActualProduccion: 1,
        desdeProduccion: '',
        hastaProduccion: '',
        ocultarMostrarAnteriorProduccion: '',
        ocultarMostrarSiguienteProduccion: '',
        botonesProduccion: [],
        graficarProduccion: '',
        produccionMonth: [],
      
        //*************VARIABLES DE USUARIOS - WILFREN */

        textoUsuario: '',
        usuarios: [],
        totalUsuarios: 0,
        usuariosPagina: 3,
        paginasUsuarios: '',
        paginaActualUsuarios: '',
        desdeUsuarios: '',
        hastaUsuarios: '',
        ocultarMostrarAnteriorUsuarios: '',
        ocultarMostrarSiguienteUsuarios: '',
        botones: [],

        //*************VARIABLES DE VACAS - DANIELA */

        buscar_Animal: '',
        tipo_usuario: '',
        nombre_vaca: '',
        arregloAnimales: [],
        totalAnimales: 0,
        animalesPaginas: 6,
        paginasVaca: '',
        paginaActual: 1,
        desdeVaca: '',
        hastaVaca: '',
        ocultarMostrarAnteriorVaca: '',
        ocultarMostrarSiguienteVaca: '',
        botonesVaca: [],

        //*************VARIABLES DE DESPACHO - JUAN */

        cantidad: '',
        fecha: '',
        destinos: [],
        textoDespachos: '',
        fechaDespachos: '',
        despachos: [],
        totalDespachos: 0,
        despachosPagina: 5,
        paginasDespacho: '',
        paginaActual: 1,
        desdeDespacho: '',
        hastaDespacho: '',
        ocultarMostrarAnteriorDespacho: '',
        ocultarMostrarSiguienteDespacho: '',
        botonesDespacho: [],
        arregloDespachos: [],

        //*************VARIABLES DE NOVEDADES DE PRODUCCION - JOHAN  */

        id_novedad_produccion: 0,
        totalNovedadesProduccion: 0,
        novedadesProduccionPagina: 5,
        paginasNP: '',
        paginaActual: 1,
        desdeNP: '',
        hastaNP: '',
        ocultarMostrarAnteriorNP: '',
        ocultarMostrarSiguienteNP: '',
        botonesNP: [],
        arregloNovedadesProduccion: [],
        ID_Produccion: 0,
        textoNovedadProduccion: '',
        datosProduccion: [],
        fecha_novedad_produccion: '',
        arregloProducciones: []
    },
    methods:{
         //*************M??TODOS DE NOVEDADES DE ANIMALES -JHORMAN */ 
        consultaNumeroNovedades: function(){

            axios.get(consultaCantidadNovedades).then((respuesta)=> {

                this.totalNovedades = respuesta.data

                this.paginasNovedadAnimal = Math.ceil(this.totalNovedades / this.novedadesPagina);

            })
        },

        paginarNovedadAnimal: function(pagina){

            
            this.paginaActualNovedadAnimal = pagina;

            this.desdeNovedadAnimal = ((this.paginaActualNovedadAnimal - 1) * this.novedadesPagina);
            this.hastaNovedadAnimal = this.paginaActualNovedadAnimal * this.novedadesPagina;

            console.log(this.desdeNovedadAnimal)

            if(this.paginaActualNovedadAnimal == 1){

                this.ocultarMostrarAnteriorNovedadAnimal = "page-item disabled";

            }else{

                this.ocultarMostrarAnteriorNovedadAnimal = "page-item";

            }


            if(this.paginaActualNovedadAnimal == this.paginasNovedadAnimal){

                this.ocultarMostrarSiguienteNovedadAnimal = "page-item disabled";

            }else{

                this.ocultarMostrarSiguienteNovedadAnimal = "page-item";
            }

            for (i = 0; i <= this.paginasNovedadAnimal; i++){

                if ((i + 1) == this.paginaActualNovedadAnimal){

                    this.botonesNovedadAnimal[i] = "page-item active";

                }else{

                    this.botonesNovedadAnimal[i] = "page-item";
                }

            }
        },

        anterior: function(){

            this.paginaActualNovedadAnimal = this.paginaActualNovedadAnimal - 1;
            this.paginarNovedadAnimal(this.paginaActualNovedadAnimal);

        },

        siguiente: function(){

            this.paginaActualNovedadAnimal = this.paginaActualNovedadAnimal + 1;
            this.paginarNovedadAnimal(this.paginaActualNovedadAnimal);

        },

        eliminarNovedad: function(id_novedades){

            var eliminar = confirm("??Esta seguro que quiere eliminar este dato de novedad?");
        
            if(eliminar == true){
        
                axios.delete('http://127.0.0.1:8000/novedades/'+id_novedades).then((respuesta)=>{
        
                console.log(respuesta);
        
                window.location.href = "http://127.0.0.1:8000/novedades/";
        

                
                });
            }
        },

        buscarNovedades:function(){

            console.log("holaaaa")
            if(this.fechaNovedad.length > 0){

                
                axios.get('http://127.0.0.1:8000/novedadAnimalBuscar/'+this.fechaNovedad).then((respuesta)=>{
                    this.novedades = respuesta.data;

                    this.paginasNovedadAnimal = Math.ceil(this.novedades.length / this.novedadesPagina);

                });
            
            }else{
                axios.get('http://127.0.0.1:8000/novedadAnimalBuscar/-').then((respuesta)=>{this.novedades = respuesta.data;
                console.log(this.novedades)

                this.paginasNovedadAnimal = Math.ceil(this.novedades.length / this.novedadesPagina);

                });
            } 
        },


        buscarNovedadesVaca:function(){

            if(this.nombreVaca.length > 0){

                
                axios.get('http://127.0.0.1:8000/novedadAnimalBuscarVaca/'+this.nombreVaca).then((respuesta)=>{
                    this.novedades = respuesta.data;

                    this.paginasNovedadAnimal = Math.ceil(this.novedades.length / this.novedadesPagina);
                });
            
            }else{
                axios.get('http://127.0.0.1:8000/novedadAnimalBuscarVaca/-').then((respuesta)=>{this.novedades = respuesta.data;
                });

                    this.paginasNovedadAnimal = Math.ceil(this.novedades.length / this.novedadesPagina);
            }
        },  
        
         //*************M??TODOS DE PRODUCCION -FUAN */ 
         
        eliminarProduccion: function (ID_Produccion) {

            var eliminar = confirm("??Esta seguro que quiere eliminar la produccion?");

            if (eliminar == true) {

                axios.delete('http://127.0.0.1:8000/produccion/' + ID_Produccion).then((respuesta) => {

                    console.log(respuesta);

                    window.location.href = "http://127.0.0.1:8000/produccion/";

                });
            }
        },

    

        buscarProduccion: function () {

            var produccionMa??ana = 0
            var produccionTarde = 0



            if (this.textoProduccion.length > 0) {

                axios.get('http://127.0.0.1:8000/produccionBuscar/' + this.textoProduccion).then((respuesta) => {

                    this.producciones = respuesta.data;

                    this.producciones.forEach(element => {
                        if (element.jornada == "ma??ana") {

                            produccionMa??ana = produccionMa??ana + element.cantidad

                        } else {

                            produccionTarde = produccionTarde + element.cantidad

                        }
                    });
                    titulo="PRODUCCI??N DIARIA (Litros)"
                    this.dibujarGrafico(produccionMa??ana, produccionTarde, titulo)

                    this.paginasProduccion = Math.ceil(this.producciones.length / this.produccionPagina);


                });

                return this.producciones

            } else {


                axios.get('http://127.0.0.1:8000/produccionBuscar/-').then((respuesta) => {
                    this.producciones = respuesta.data;

                    this.producciones.forEach(element => {
                        if (element.jornada == "ma??ana") {

                            produccionMa??ana = produccionMa??ana + element.cantidad

                        } else {

                            produccionTarde = produccionTarde + element.cantidad

                        }
                    });
                    titulo="PRODUCCI??N TOTAL (Litros)"
                    this.dibujarGrafico(produccionMa??ana, produccionTarde, titulo)
                

                    this.paginasProduccion = Math.ceil(this.producciones.length / this.produccionPagina);


                });



                return this.producciones

            }



        },

        buscarVaca: function () {


            if (this.textoVaca.length > 0) {

                axios.get('http://127.0.0.1:8000/vacaBuscar/' + this.textoVaca).then((respuesta) => {
                    this.producciones = respuesta.data;
                    this.paginasProduccion = Math.ceil(this.producciones.length / this.produccionPagina);
                });

            } else {

                axios.get('http://127.0.0.1:8000/vacaBuscar/-').then((respuesta) => {
                    this.producciones = respuesta.data;
                    this.paginasProduccion = Math.ceil(this.producciones.length / this.produccionPagina);
                });
            }

        },
        consultaNumeroProducciones: function () {

            axios.get(consultaCantidadProducciones).then((respuesta) => {

                this.totalProduccion = respuesta.data
                this.paginasProduccion = Math.ceil(this.totalProduccion / this.produccionPagina);
            })

        },
        paginarProduccion: function (pagina) {
            this.paginaActualProduccion = pagina;
            this.desdeProduccion = ((this.paginaActualProduccion - 1) * this.produccionPagina);
            this.hastaProduccion = this.paginaActualProduccion * this.produccionPagina;

            if (this.paginaActualProduccion == 1) {

                this.ocultarMostrarAnteriorProduccion = "page-item disabled";

            } else {

                this.ocultarMostrarAnteriorProduccion = "page-item";
            }

            if (this.paginaActualProduccion == this.paginasProduccion) {

                this.ocultarMostrarSiguienteProduccion = "page-item disabled";

            } else {

                this.ocultarMostrarSiguienteProduccion = "page-item"

            }

            for (i = 0; i <= this.paginasProduccion; i++) {

                if ((i + 1) == this.paginaActualProduccion) {

                    this.botonesProduccion[i] = "page-item active"

                } else {

                    this.botonesProduccion[i] = "page-item"
                }
            }
        },
        anterior: function () {

            this.paginaActualProduccion = this.paginaActualProduccion - 1;
            this.paginarProduccion(this.paginaActualProduccion);
        },
        siguiente: function () {

            this.paginaActualProduccion = this.paginaActualProduccion + 1;
            this.paginarProduccion(this.paginaActualProduccion);
        },

        dibujarGrafico: function (produccionMa??ana, produccionTarde, titulo) {

            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Litros", { role: "style" }],
                    ["MA??ANA", produccionMa??ana, "cyan"],
                    ["TARDE", produccionTarde, "brown"],
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {
                        calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"
                    },
                    2]);

                var options = {
                    title: titulo,
                    width: 480,
                    height: 300,
                    bar: { groupWidth: "95%" },
                    legend: { position: "none" },
                };
                var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                chart.draw(view, options);
            }

        },

        buscarMonthYear: function () {


            if (this.graficarProduccion.length > 0) {


                axios.get('http://127.0.0.1:8000/buscarGraficoMonthYear/' + this.graficarProduccion).then((respuesta) => {
                    this.produccionMonth = respuesta.data;

                    //Debo crear un arreglo con la estructura que maneja google chart
                    //y enviarlo como parametro a la funcion del grafico

                    var datos = [
                        ["Element", "Litros", { role: "style" }]]

                        this.produccionMonth.forEach(element=>{

                            datos.push(
                                [element.fecha, element.cantidad, "orange, red"],
                              
                            )


                        })

                    console.log(datos)

                    this.dibujarGraficoMes(datos)

                });
            }
        },

        dibujarGraficoMes: function (datos) {

            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable(datos);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {
                        calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"
                    },
                    2]);

                var options = {
                    title: "PRODUCCION MENSUAL",
                    width: 900,
                    height: 500,
                    bar: { groupWidth: "95%" },
                    legend: { position: "none" },
                };
                var chart = new google.visualization.BarChart(document.getElementById("barchart_month"));
                chart.draw(view, options);
            }
        },

        //*************M??TODOS DE USUARIOS - WILFREN */

        eliminarUsuario: function (idUsuario) {

            var eliminar = confirm("??Est?? seguro de eliminar usuario?");

            if (eliminar == true) {

                axios.delete('http://127.0.0.1:8000/usuarios/' + idUsuario).then((respuesta) => {
                    console.log(respuesta);

                    window.location.href = "http://127.0.0.1:8000/usuarios/";
                });
            }

        },
        buscarUsuario: function () {
            
            if (this.textoUsuario.length > 0) {
                axios.get('http://127.0.0.1:8000/buscarUsuario/' + this.textoUsuario).then((respuesta) => {
                    this.usuarios = respuesta.data;
                    this.paginasUsuarios = Math.ceil(this.usuarios.length/ this.usuariosPagina);

                });
            } else {
                axios.get('http://127.0.0.1:8000/buscarUsuario/-').then((respuesta) => {
                    this.usuarios = respuesta.data;
                    console.log(this.usuarios)
                    this.paginasUsuarios = Math.ceil(this.usuarios.length/ this.usuariosPagina);
                });

            }
        },
        eliminarRebano: function (id_rebano) {

            var eliminar = confirm("??Est?? seguro de eliminar el reba??o?");

            if (eliminar == true) {

                axios.delete('http://127.0.0.1:8000/rebano/' + id_rebano).then((respuesta) => {
                    console.log(respuesta);

                    window.location.href = "http://127.0.0.1:8000/rebano/";
                });
            }
        },

        consultarNumerosUsuarios: function () {

            axios.get(consultarCantidadUsuarios).then((respuesta) => {

                this.totalUsuarios = respuesta.data
                this.paginasUsuarios = Math.ceil(this.totalUsuarios / this.usuariosPagina);
            })
        },
        
        paginarUsuario: function (pagina) {

            this.paginaActualUsuarios = pagina;
            this.desdeUsuarios = ((this.paginaActualUsuarios - 1) * this.usuariosPagina);
            console.log("desdeUsuarios: "+this.desdeUsuarios)
            this.hastaUsuarios = this.paginaActualUsuarios * this.usuariosPagina;
            console.log("hastaUsuarios: "+this.hastaUsuarios)

            if (this.paginaActualUsuarios == 1) {

                this.ocultarMostrarAnteriorUsuarios = "page-item disabled";

            } else {
                this.ocultarMostrarAnteriorUsuarios = "page-item";
            }
            if (this.paginaActualUsuarios == this.paginasUsuarios) {


                this.ocultarMostrarSiguienteUsuarios = "page-item disabled";

            } else {
                this.ocultarMostrarSiguienteUsuarios = "page-item";
            }

            for (i = 0; i <= this.paginasUsuarios; i++) {


                if ((i + 1) == this.paginaActualUsuarios) {
                    this.botones[i] = "page-item active";

                } else {
                    this.botones[i] = "page-item";
                }
            }

        },

        anterior: function () {
            this.paginaActualUsuarios = this.paginaActualUsuarios - 1;
            this.paginar(this.paginaActualUsuarios);

        },
        siguiente: function () {
            this.paginaActualUsuarios = this.paginaActualUsuarios + 1;
            this.paginar(this.paginaActualUsuarios);

        },

        //*************METODOS DE VACAS - DANIELA */

            eliminarAnimal: function (Id_animal) {
    
                var eliminar = confirm("??esta seguro que quiere eliminar la vaca?");
    
                if (eliminar == true) {
                    axios.delete('http://127.0.0.1:8000/animales/' + Id_animal).then((respuesta) => {
    
                        console.log(respuesta);
                        window.location.href = "http://127.0.0.1:8000/animales/";
    
                    });
                }
            },
    
            buscar_animales: function () {
                
                if (this.nombre_vaca.length > 0) {
                    axios.get('http://127.0.0.1:8000/buscarAnimales/' + this.nombre_vaca).then((respuesta) => {
                    
                        this.arregloAnimales = respuesta.data;
                        this.paginasVaca = Math.ceil(this.arregloAnimales.length / this.animalesPaginas);
                    });
                } else {
                    axios.get('http://127.0.0.1:8000/buscarAnimales/-').then((respuesta) => {
                        this.arregloAnimales = respuesta.data;
                        this.paginasVaca = Math.ceil(this.arregloAnimales.length / this.animalesPaginas);
    
                    });
                }
    
            },
            consultarNumeroAnimales: function () {
                axios.get(consultarCantidadAnimales).then((respuesta) => {
                    this.totalAnimales = respuesta.data
                    this.paginasVaca = Math.ceil(this.totalAnimales / this.animalesPaginas);
                })
            },
            paginar: function (pagina) {
                this.paginaActual = pagina;
                this.desdeVaca = ((this.paginaActual - 1) * this.animalesPaginas);
                this.hastaVaca = this.paginaActual * this.animalesPaginas;
    
                if (this.paginaActual == 1) {
                    this.ocultarMostrarAnteriorVaca = "page-item disabled";
                } else {
                    this.ocultarMostrarAnteriorVaca = "page-item";
                }
    
                if (this.paginaActual == this.paginasVaca) {
                    this.ocultarMostrarSiguienteVaca = "page-item disabled";
    
                } else {
                    this.ocultarMostrarSiguienteVaca = "page-item";
                }
                for (i = 0; i <= this.paginasVaca; i++) {
    
                    if ((i + 1) == this.paginaActual) {
                        this.botonesVaca[i] = "page-item active";
    
                    } else {
                        this.botonesVaca[i] = "page-item";
                    }
    
                }
    
            },
            anterior: function () {
                this.paginaActual = this.paginaActual - 1;
                this.paginar(this.paginaActual);
            },
            siguiente: function () {
                this.paginaActual = this.paginaActual + 1;
                this.paginar(this.paginaActual);
    
            },
            //************* METODOS DE DESPACHO - JUAN */
            eliminarDespachos: function (id_despacho) {

                var eliminar = confirm("??Esta seguro  que quiere eliminar el Despacho?");
    
                if (eliminar == true) {
    
                    axios.delete('http://127.0.0.1:8000/despachos/' + id_despacho).then((respuesta) => {
    
                        console.log(respuesta);
    
                        window.location.href = "http://127.0.0.1:8000/despachos/";
    
                    });
    
                }
            },
            buscarDespacho: function () {
    
                if (this.textoDespachos.length > 0) {
    
                    axios.get('http://127.0.0.1:8000/despachosBuscar/' + this.textoDespachos).then((respuesta) => {
    
                        this.despachos = respuesta.data;
    
                        this.paginasDespacho = Math.ceil(this.despachos.length / this.despachosPagina);
    
                    });
    
                } else {
    
                    axios.get('http://127.0.0.1:8000/despachosBuscar/-').then((respuesta) => {
    
                        this.despachos = respuesta.data;
    
                        this.paginasDespacho = Math.ceil(this.despachos.length / this.despachosPagina);
    
                    });
                }
            },
            buscarDespachoFecha: function () {
    
                if(this.fechaDespachos.length > 0) {
    
                    axios.get('http://127.0.0.1:8000/despachosBuscarFecha/' + this.fechaDespachos).then((respuesta) => {
    
                        this.despachos = respuesta.data;
    
                        this.paginasDespacho = Math.ceil(this.despachos.length / this.despachosPagina);
                    });
    
                } else {
    
                    axios.get('http://127.0.0.1:8000/despachosBuscarFecha/-').then((respuesta) => {
    
                        this.despachos = respuesta.data;
    
                        this.paginasDespacho = Math.ceil(this.despachos.length / this.despachosPagina);
    
                    });
                }
            },
            consultaNumeroDespachos: function(){
    
                axios.get(consultaCantidadDespachos).then((respuesta) => {
    
                    this.totalDespachos = respuesta.data
    
                    this.paginasDespacho = Math.ceil(this.totalDespachos / this.despachosPagina);
    
                })
            },
            paginarDespacho: function(pagina){
    
                this.paginaActual = pagina;
    
                this.desdeDespacho = ((this.paginaActual - 1 ) * this.despachosPagina);
                this.hastaDespacho = this.paginaActual * this.despachosPagina;
    
                if (this.paginaActual == 1){
    
                    this.ocultarMostrarAnteriorDespacho = "page-item disabled";
    
                }else{
    
                    this.ocultarMostrarAnteriorDespacho = "page-item";
                }
    
                if (this.paginaActual == this.paginasDespacho){
    
                    this.ocultarMostrarSiguienteDespacho = "page-item disabled";
    
                }else{
    
                    this.ocultarMostrarSiguienteDespacho = "page-item";
                }
    
                for (i = 0; i <= this.paginasDespacho; i++){
    
    
                    if (( i + 1) == this.paginaActual){
    
                        this.botonesDespacho[i] = "page-item active";
    
                    } else{
    
                        this.botonesDespacho[i] = "page-item";
                    }
                }
    
            },
            anterior: function() {
    
                this.paginaActual = this.paginaActual - 1;
                this.paginarDespacho(this.paginaActual);
    
            },
            siguiente: function() {
    
                this.paginaActual = this.paginaActual + 1;
                this.paginarDespacho(this.paginaActual);
    
            },

            //****************METODOS NOVEDAD PRODUCCION - JOHAN */
            eliminarNovedadProduccion: function(id_novedad_produccion){

                var  eliminar = confirm("Est?? segur@ de que quiere eliminar el registro?");
    
                if(eliminar == true){
    
                    axios.delete('http://127.0.0.1:8000/novedadesProduccion/'+ id_novedad_produccion).then((respuesta)=>{
    
                    console.log(respuesta);
    
                    window.location.href="http://127.0.0.1:8000/novedadesProduccion/"
                    });
                }
            },
    
            buscarNovedadesProduccion: function () {
    
                if (this.fecha_novedad_produccion.length > 0) {
    
                     console.log(this.fecha_novedad_produccion)
                    axios.get('http://127.0.0.1:8000/buscarNovedadesProduccion/' + this.fecha_novedad_produccion).then((respuesta) => {
    
                        this.arregloNovedadesProduccion = respuesta.data;
    
                        this.paginasNP = Math.ceil(this.arregloNovedadesProduccion.length / this.novedadesProduccionPagina);
    
                        return this.arregloNovedadesProduccion;
                    });
                } else {
    
                    axios.get('http://127.0.0.1:8000/buscarNovedadesProduccion/-').then((respuesta) => {
    
                        this.arregloNovedadesProduccion = respuesta.data;
    
                        this.paginasNP = Math.ceil(this.arregloNovedadesProduccion.length / this.novedadesProduccionPagina);
    
                        return this.arregloNovedadesProduccion;
                    });
                }
    
    
            },
            buscarProduccionesParaNovedad: function () {
    
                if (this.fecha_novedad_produccion.length > 0) {
    
                     console.log(this.fecha_novedad_produccion)
                    axios.get('http://127.0.0.1:8000/buscarParaNovedad/' + this.fecha_novedad_produccion).then((respuesta) => {
    
                        this.arregloProducciones = respuesta.data;
    
    
                        return this.arregloProducciones;
                    });
                } else {
    
                    axios.get('http://127.0.0.1:8000/buscarParaNovedad/-').then((respuesta) => {
    
                        this.arregloProducciones = respuesta.data;
    
    
                        return this.arregloProducciones;
                    });
                }
    
    
            },
    
    
            buscarNovedadesProduccion: function () {
    
                axios.get('http://127.0.0.1:8000/buscarNovedadesProduccion/-').then((respuesta) => {
    
                    
                this.arregloNovedadesProduccion = respuesta.data
                this.paginasNP = Math.ceil(this.arregloNovedadesProduccion.length / this.novedadesProduccionPagina);

    
                })
                return this.arregloNovedadesProduccion
            },
    
            consultaNumeroNovedadesProduccion: function () {
    
                axios.get(consultaCantidadNovedadesProduccion).then((respuesta) => {
    
                    this.totalNovedadesProduccion = respuesta.data
    
                })
            },
    
            paginarNP: function (pagina) {
    
                this.paginaActual = pagina;
    
                this.desdeNP = ((this.paginaActual - 1) * this.novedadesProduccionPagina);
                this.hastaNP = this.paginaActual * this.novedadesProduccionPagina;
    
                if (this.paginaActual == 1) {
    
                    this.ocultarMostrarAnteriorNP = "page-item disabled";
    
                } else {
    
                    this.ocultarMostrarAnteriorNP = "page-item";
    
                }
    
                if (this.paginaActual == this.paginasNP) {
    
                    this.ocultarMostrarSiguienteNP = "page-item disabled";
    
                } else {
    
                    this.ocultarMostrarSiguienteNP = "page-item";
    
                }
    
                for (i = 0; i <= this.paginasNP; i++) {
    
    
                    if ((i + 1) == this.paginaActual) {
    
                        this.botonesNP[i] = "page-item active";
    
                    } else {
    
                        this.botonesNP[i] = "page-item";
    
                    }
                }
    
    
            },
    
            anterior: function () {
    
                this.paginaActual = this.paginaActual - 1;
                this.paginarNP(this.paginaActual);
    
            },
    
            siguiente: function () {
    
                this.paginaActual = this.paginaActual + 1;
                this.paginarNP(this.paginaActual);
    
            }
    },

        mounted(){

            //*************MOUNTED DE NOVEDADES ANIMAL -JHORMAN */ 
            this.buscarNovedades()
            this.consultaNumeroNovedades()
            this.paginarNovedadAnimal(1)
            //*************MOUNTED DE PRODUCCION -FUAN */ 
            this.buscarProduccion()
            this.consultaNumeroProducciones()
            this.paginarProduccion(1)
            //*************MOUNTED DE USUARIOS - WILFREN */
            this.buscarUsuario()
            this.consultarNumerosUsuarios()
            this.paginarUsuario(1)
            //*************MOUNTED DE VACAS - DANIELA */
            this.buscar_animales()
            this.consultarNumeroAnimales()
            this.paginar(1)
            //************MOUNTED DE DESPACHO - JUAN */
            this.buscarDespacho()
            this.buscarDespachoFecha()
            this.consultaNumeroDespachos()
            this.paginarDespacho(1)
            //***********MOUNTED DE NOVEDAD PRODUCCIO - JOHAN  */
            this.buscarNovedadesProduccion()
            this.consultaNumeroNovedadesProduccion()
            this.paginarNP(1)
        }
});