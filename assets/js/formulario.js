$(document).ready(function () {
  const linkMsg = document.getElementById("link-msg");
  const formulario = $("#formulario");
  const inputs = $("#formulario input");

  const uriRelative = `${location.pathname}?`;
  const formTarget = $("#form").val();

  const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\W\s]{1,40}$/,
    apellido: /^[a-zA-ZÀ-ÿ\W\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/, // 7 a 14 numeros. /^\+[0-9]*\s[0-9]+/ tel_inst: /^\d{7,14}$/,
    cedula: /^\d{4,9}$/, // Formato cedula
    edad: /^\d{2}$/, // Edad,
    //Elementos de libro
    autor: /^[a-zA-ZÀ-ÿ\W\s]{1,40}$/,
    titulo: /^[a-zA-ZÀ-ÿ\W\s0-9]{1,40}$/,
  };

  let campos = [];

  for (const input of inputs) {
    campos = [...campos, input.name];
  }

  let campoObject = {};
  let campoFunc = {};

  campos.forEach((campo) => {
    if (expresiones[campo] != undefined) {
      campoObject[campo] = false;
    }
  });

  campos.forEach((campo) => {
    if (expresiones[campo] != undefined) {
      if (formTarget === "formupdate") {
        campos.forEach((campo) => {
          if (expresiones[campo] != undefined) {
            campoObject[campo] = true;
          }
        });
      }
    }
  });

  const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
      $(input).removeClass("formulario__grupo-incorrecto");
      $(input).addClass("formulario__grupo-correcto");
      $(input).siblings().hide();
      $("#msg").hide();
      campoObject[campo] = true;
    } else {
      $(input).addClass("formulario__grupo-incorrecto");
      $(input).siblings().show();
      campoObject[campo] = false;
    }
  };

  const validarFormulario = (e) => {
    campos.forEach(
      (campo) =>
        (campoFunc[campo] = () => {
          if (expresiones[e.target.name] != undefined) {
            validarCampo(expresiones[e.target.name], e.target, campo);
          }
        })
    );

    let handler = campoFunc[e.target.name];

    handler();
  };

  const msgShow = (msg, alert) => {
    const contentHtml = `<div class="alert alert-${alert} text-center">
                          <p><span>${msg}</span></p>
                        </div>`;
    $("#msg").show();
    $("#msg").html(contentHtml);
  };

  $.each(inputs, function (i, input) {
    input.onkeyup = validarFormulario;
    input.onblur = validarFormulario;
  });

  formulario.submit(function (e) {
    e.preventDefault();

    const dataForm = $(this).serialize();
    const url = $("#url").val();

    let toggle = true;

    const arrParse = Object.values(campoObject);

    arrParse.forEach((data) => {
      if (data === false) {
        toggle = false;
      }
    });

    if (toggle) {
      const spinner = `<div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`;

      $("#btnEnviar").html(spinner);

      $.post(url, dataForm)
        .done((res) => {
          const entidad = $("#entidad").val();

          const resp = JSON.parse(res);

          if (resp.type === "Error") {
            msgShow(`${resp.message}`, "danger");
            linkMsg.click();
            $("#btnEnviar").html("Agregar Registro");
          } else if (resp.type === "Success") {
            if (formTarget === "formupdate") {
              location.href = `${uriRelative}controller=${entidad}&r=4`;
            }

            formulario.trigger("reset");
            msgShow(
              `Un nuevo registro ha sido <b>agregado</b> <a href="${uriRelative}controller=${entidad}&action=viewbyid&id=${resp.message}">Clic para ver cambio</a>`,
              "success"
            );
            linkMsg.click();
            $("#btnEnviar").html("Agregar Registro");
          }
        })
        .fail((err) => console.log(err));
    } else {
      msgShow(`Es obligatorio llenar los campos correctamente`, "danger");
      linkMsg.click();
    }
  });

  setTimeout(() => $("#msg").hide(), 10000);

  // Smooth Scrolling
  $('a#link-msg[href^="#"]').click(function (event) {
    //Aquí elimina el evento normal de la etiqueta <a>
    event.preventDefault();
    //Aquí cojemos el elmento
    var elem = $(this).attr("href");
    $("html, body").animate(
      {
        scrollTop: $(elem).offset().top,
      },
      1000
    );
  });
});
