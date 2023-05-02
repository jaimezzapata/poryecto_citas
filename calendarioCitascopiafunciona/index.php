<?php require('../usuarios/header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>



<!--Scripts CSS-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/bootstrap-clockpicker.css">
<link rel="stylesheet" href="fullcalendar/main.css">


<!--Scripts JS-->
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/bootstrap-clockpicker.js"></script>
<script src="js/clockpicker.js"></script>
<script src="js/moment-with-locales.js"></script>
<script src="fullcalendar/main.js"></script>


</head>
<body>
    <h1 class="text-center">Organiza tus citas</h1>
    <p class="text-center text-info">Recomendamos el modo semana</p>
   <button style="height:100px;widht:100px;margin-left:2rem;text-decoration:none ;"><a style="text-decoration:none ;" class="text-dark" href="reporte.php"><img class="img-fluid" style="width:50px; height:50px" src="../images/file-pdf-regular.svg">Descargar Citas</a> </button>
    <a href=""></a>
    <div class="container-fluid w-100">
        <section class="content-header">
            <div class="">
            <h1 class="text-center mt-5">Calendario
            </div>
            </h1>
        </section>
        <div class="row">
            <div class="col-md-12">
                <div id="calendario1" class=""  style="border:1px solid #000;padding:2px"></div>
            </div>
           
          
        </div>
    </div>

   
        <!--Formulario de eventos-->
        <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                    <span>Por favor ingrese todos los campos,para que funcione correctamente </span>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                           
                            <span  aria-hidden="true">X</span>
                        </button>
                    </div> 

                    <div class="modal-body">
                        <input type="hidden" id="Id">
                        
                        <div class="row">
                            <div class="form-group col-md-12" >
                                <label for="">Nombre del paciente</label>
                                <div class="input-group" >
                                <input type="text" id="Titulo" class="form-control" placeholder="">
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="">Fecha de inicio:</label>
                                <div class="input-group" data-autoclose="true">
                                    <input type="date" id="FechaInicio" class="form-control" >
                                
                                </div>
                            </div>

                            <div class="form-group col-md-6 " id="TituloHoraInicio">
                                <label for="">Hora de inicio:</label>
                                <div class="input-group  " data-autoclose="true">
                                    <input type="time" id="HoraInicio" class="form-control " autocomplete="off">
                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Fecha de Finalización:</label>
                            <div class="input-group" data-autoclose="true">
                                <input type="date" id="FechaFin" class="form-control " >
                            
                            </div>
                        </div>

                        <div class="form-group col-md-6 " id="TituloHoraFin">
                            <label for="">Hora de finalización:</label>
                            <div class="input-group  " data-autoclose="true">
                                <input type="time" id="HoraFin" class="form-control "  autocomplete="off">
                            </div>    
                        </div>
                        </div>
                       

                        <div class="row">
                            <label for="">Descripción</label>
                            <textarea name="" id="Descripcion" class="form-control"  rows="3"></textarea>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6" >
                            <label for="">Nro identificación Paciente:</label>
                            <div class="input-group" >
                            <input class="form-control" type="text" id="IdPacientes" >
                            </div>
                        </div>

                        <div class="form-group col-md-6 " >
                            <label for="">Nro identificación Médico:</label>
                            <div class="input-group" >
                            <input class="form-control" type="text" id="IdMedicos" >
                          
                            </div>    
                        </div>
                        </div>
                        
                        <div class="row">
                            <label for="">Color de fondo:</label>
                          <input type="color" value="#8D8efd" id="ColorFondo" class="form-control" style="heigth:36px;">
                        </div>

                        <div class="row">
                            <label for="">Color de texto:</label>
                          <input type="color" value="#000000" id="ColorTexto" class="form-control" style="heigth:36px;">
                        </div>

                        <div class="modal-footer">
                        <button type="button" id="BotonAgregar" class="btn ">Agregar</button>
                        <button type="button" id="BotonModificar" class="btn ">Modificar</button>
                        <button type="button" id="BotonBorrar" class="btn ">Borrar</button>
                        <button type="button" data-bs-dismiss="modal"  class="btn ">Cancelar</button>
                        
                        </div>
                </div>
            </div>
        </div>
    
 
    <script>
       
        let calendario1=new FullCalendar.Calendar(document.getElementById('calendario1'),{
            heigth:800,
            editable:true,
            events:'datoseventos.php?accion=listar',
            locale:'es',
            headerToolbar:{
            left:'prev,next,today',
            center:'title',
            right:'dayGridMonth,timeGridWeek,timeGridDay'},
            slotDuration: '00:05:00',
            timezone:'local',
            aspectRatio:2.9,
            dateClick:function(info){
                //Limpiar primero el html
                limpiarFormulario();
                $('#BotonAgregar').show();
                $('#BotonModificar').hide();
                $('#BotonBorrar').hide();
                if(info.allDay){
                    $('#FechaInicio').val(info.dateStr);
                    $('#FechaFin').val(info.dateStr);
                }else{
                    let fechaHora=info.dateStr.split("T");
                    $('#FechaInicio').val(fechaHora[0]);
                    $('#FechaFin').val(fechaHora[0]);
                    $('#HoraInicio').val(fechaHora[1].substring(0,5));
                   
                }
                //alert(info.dateStr),
                $("#FormularioEventos").modal('show');
            },
            eventClick:function(info){
                $("#FormularioEventos").modal('show');
                $('#BotonAgregar').hide();
                $('#BotonModificar').show();
                $('#BotonBorrar').show();
               // recupere el id del evento
                $('#Id').val(info.event.id);
                $('#Titulo').val(info.event.title);
                $('#IdPacientes').val(info.event.idPaciente1);
                $('#IdMedicos').val(info.event.idMedico1);
                $('#ColorTexto').val(info.event.textColor);
                $('#ColorFondo').val(info.event.backgroundColor);
                $('#Descripcion').val(info.event.extendedProps.descripcion);
                $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
                $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
                $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
                $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
               
                
                
             
            },
            eventResize:function(info){
                $('#Id').val(info.event.id);
                $('#Titulo').val(info.event.title);
                $('#Descripcion').val(info.event.extendedProps.descripcion);
                $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
                $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
                $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
                $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
                $('#IdPacientes').val(info.event.idPaciente1);
                $('#IdMedicos').val(info.event.idMedico1);
                $('#ColorTexto').val(info.event.textColor);
                $('#ColorFondo').val(info.event.backgroundColor);
                let registro=recuperarDatosFormulario();
                modificarRegistro(registro);
            },
            eventDrop:function(info){
                $('#Id').val(info.event.id);
                $('#Titulo').val(info.event.title);
                $('#Descripcion').val(info.event.extendedProps.descripcion);
                $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
                $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
                $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
                $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
                $('#IdPacientes').val(info.event.idPaciente1);
                $('#IdMedicos').val(info.event.idMedico1);
                $('#ColorTexto').val(info.event.textColor);
                $('#ColorFondo').val(info.event.backgroundColor);
                let registro=recuperarDatosFormulario();
                modificarRegistro(registro);
            }
         
           
        });
        calendario1.render();
        // Eventos de botones de la aplicación
        $('#BotonAgregar').click(function(){
            let registro=recuperarDatosFormulario();
            agregarRegistro(registro);
            $('#FormularioEventos').modal('hide');
          
        });

        $('#BotonModificar').click(function(){
            let registro=recuperarDatosFormulario();
            modificarRegistro(registro);
            $('#FormularioEventos').modal('hide');
            
        });

        $('#BotonBorrar').click(function(){
           let registro=recuperarDatosFormulario();
           borrarRegistro(registro);
            $('#FormularioEventos').modal('hide');

            
        });


         // funcion que lo manda a la base de datos através de ajax
        function agregarRegistro(registro){
            $.ajax({
                type:'POST',
                url:'datoseventos.php?accion=agregar',
                data:registro,
                success:function(msg){
                    calendario1.refetchEvents();
                    header('Location: index.php');
                },

                error:function(error){
                    
                    alert('Hubo un error al agregar el evento :'+error);
                }
            })
        }
        // Funcion modificar
        function modificarRegistro(registro){
            $.ajax({
                type:'POST',
                url:'datoseventos.php?accion=modificar',
                data:registro,
                success:function(msg){
                    calendario1.refetchEvents();
                    header('Location: index.php');
                },

                error:function(error){
                    alert('Hubo un error al modificar el evento :'+error);
                }
            })
        }
        // Eliminar
        function borrarRegistro(registro){
            $.ajax({
                type:'POST',
                url:'datoseventos.php?accion=borrar',
                data:registro,
                success:function(msg){
                    calendario1.refetchEvents();
                    
                },

                error:function(error){
                    alert('Hubo un error al eliminar el evento :'+error);
                }
            })
        }

        //Las funciones que  interactuan con el formulario eventos
        function limpiarFormulario(){
            $('#Id').val('');
            $('#Titulo').val('');
            $('#Descripcion').val('');
            $('#FechaInicio').val('');
            $('#HoraInicio').val('');
            $('#FechaFin').val('');
            $('#HoraFin').val('');
            $('#ColorTexto').val('');
            $('#ColorFondo').val('#3788D8');
            $('#IdPacientes').val('');
            $('#IdMedicos').val('');
        }

        function recuperarDatosFormulario(){
            let registro={
                id:$('#Id').val(),
                titulo:$('#Titulo').val(),
                descripcion:$('#Descripcion').val(),
                inicio:$('#FechaInicio').val()+' '+ $('#HoraInicio').val(),
                fin:$('#FechaFin').val()+' '+$('#HoraFin').val(),
                idPaciente1:$('#IdPacientes').val(),
                idMedico1:$('#IdMedicos').val(),
                textColor:$('#ColorFondo').val(),
                backgroundColor:$('#ColorTexto').val()

                
            }
            return registro;
        }

    </script>

</body>
</html>