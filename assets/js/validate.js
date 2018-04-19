jQuery().ready(function() {;

    jQuery("#teste").validate({
        rules: {
            nome: "required",

            lote: {
                required: true,
            },

            codigo: {
                required: true,
            },

            recebimento: {
                required: true,
            },

            fabricacao: {
                required: true,
            },

            validade: {
                required: true,
            },
        },
        messages: {
            nome: "Insira o nome do produto",

            lote: {
                required: "Insira o lote do produto",
            },

            codigo: {
                required: "Insira o código do produto",
            },

            recebimento: {
                required: "Insira a data de recebimento",
            },

            fabricacao: {
                required: "Insira a data de fabricação",
            },

            validade: {
                required: "Insira a data de validade",
            },
        },

    });

})

  // jQuery("#teste").validate();