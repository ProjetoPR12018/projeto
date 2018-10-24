 jQuery(document).ready(function($) {

    function loadCalendar(events){
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay, listWeek'
            },
            defaultDate: Date(),
            navLinks: true,
            editable: true,
            eventLimit: true,
            eventClick: function(event) {

                $('.ocultar-btn').show();
                $('.ocultar-btn-delete').show();

                $('#visualizar #id').text(event.id);
                $('#visualizar #title').text(event.title);
                $('#visualizar #start').text(event.start.format('DD/MM/YYYY'));
                $('#visualizar #startHour').text(event.start.format('HH:mm:ss'));
                $('#visualizar #end').text(event.end.format('DD/MM/YYYY'));
                $('#visualizar #endHour').text(event.end.format('HH:mm:ss'));

                $('#visualizar #id').val(event.id);
                $('#visualizar #title').val(event.title);
                $('#visualizar #start').val(event.start.format('DD/MM/YYYY'));
                $('#visualizar #startHour').val(event.start.format('HH:mm:ss'));
                $('#visualizar #end').val(event.end.format('DD/MM/YYYY'));
                $('#visualizar #endHour').val(event.end.format('HH:mm:ss'));
                $('#visualizar #color').val(event.color);

                if (event.criado_por != event.usuario_logado) {
                    $('.ocultar-btn').hide();
                    $('.ocultar-btn-delete').hide();
                }

                $('#visualizar').modal('show');
                getUsers(event.id);

            },
            selectable: true,
            selectHelper: true, // DESTACA A HORA SELECIONADA.
            select: function(inicio, fim) {
                $('#cadastrar #inicio').val(moment(inicio).format('DD/MM/YYYY'));
                $('#cadastrar #horaInicio').val(moment(inicio).format('HH:mm:ss'));
                $('#cadastrar #fim').val(moment(fim).format('DD/MM/YYYY'));
                $('#cadastrar #horaFim').val(moment(fim).format('HH:mm:ss'));
                $('#cadastrar').modal('show');
            },

            events: events,

            });
        }

        $.ajax({
            url: BASE_URL + "events",
            data: 'JSON',
            success: (value) => {
                var value = JSON.parse(value);
                loadCalendar(value);
            },
            error: (error) => {

            }
        });

        $('.ocultar-btn').on('click', function(){
            $('.editar').slideToggle();
            $('.visualizar').slideToggle();
        });

        $('.edit-btn').on('click', function(){
            $('.visualizar').slideToggle();
            $('.editar').slideToggle();
        });

        $('.ocultar-btn-delete').on('click', function(){
            $('.excluir').slideToggle();
            $('.visualizar').slideToggle();
        });

        $('.delete-btn').on('click', function(){
            $('.visualizar').slideToggle();
            $('.excluir').slideToggle();
        });

        $('.compartilhar').on('click', function(){
            $('#compartilhar').removeAttr('hidden');
        });

        let $select = $('.calendar_users').selectize({})
        let selectize = $select[0].selectize;

        let getUsers = (id) => {

            $('.compartilhado_com').html("");

            $.ajax({
                url: BASE_URL + "events/getUsers/" + id,
                data: 'JSON',
                success: (value) => {
                    var users = JSON.parse(value)
                    var shared_with = Object.assign({}, users);
                    users = Object.keys(users).map((key) => { return users[key].id_usuario })
                    selectize.setValue(users)

                    for(user in shared_with) {
                        $('.compartilhado_com').append(
                            `<div class="">${shared_with[user].nome}</div>`
                        );
                    }

                },
                error: (error) => {

                }
            });

        }

    });
