$(document).ready(function () {
  const currentDate = new Date()
  // const day = currentDate.getDate()
  const month = currentDate.getMonth() + 1
  const year = currentDate.getFullYear()

  const labels = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ].slice(0, month)

  // Obtener Todos los prestamos
  function getPrestamos(callback, elements = "prestamos") {
    $.get("?controller=prestamo&action=get").done((res) => {
      const data = JSON.parse(res)
      const object = {
        prestamos: data.message,
        devoluciones: data.message.filter(
          (prestamo) => Number(prestamo.estado) === 0
        ),
      }

      const results = object[elements]

      callback(results)
    })
  }

  // Obtener todos los solicitantes
  function getSolicitantes(callback, elements = "solicitantes") {
    $.get("?controller=solicitante&action=get").done((res) => {
      const data = JSON.parse(res)
      const object = {
        solicitantes: data.message,
      }

      const results = object[elements]

      callback(results)
    })
  }

  getSolicitantes(results => {
    const solInactivos = results
      .filter(sol => Number(sol.estado_s) === 0)
      .map(sol => sol.estado_s)

    const solActivos = results
      .filter(sol => Number(sol.estado_s) === 1)
      .map(sol => sol.estado_s)
    
      let solicitantesData        = {
      labels: [
        'Solicitantes Activos',
        'Solicitantes Inactivos', 
      ],
      datasets: [
        {
          data: [solActivos.length, solInactivos.length],
          backgroundColor : ['#00c0ef', '#f56954'],
        }
      ]
    }
    let donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    let pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    let pieData        = solicitantesData;
    let pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    let pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
  })

  // Barra de estadisiticas sobre la cantidad de prestamos que hay por mes
  const barChartElement = $("#barChart")
  // Render de muestra de barra de estadisticas
  getPrestamos((elements) => {
    const prestamos = elements.map((prestamo) => prestamo.fe.substring(0, 7))

    const specimens = prestamos.filter((date, i) =>
      i == 0 ? true : prestamos[i - 1] != date
    )

    const counterSpecimens = specimens.map((spec) => {
      return { number: spec, count: 0 }
    })

    counterSpecimens.map((countSpec) => {
      const actualSpecLength = prestamos.filter(
        (date) => date === countSpec.number
      ).length
      countSpec.count = actualSpecLength
    })

    let totalDay = counterSpecimens.map((number) => ({
      number: number.number,
      count: number.count,
    }))

    const filterYearCurrent = totalDay
      .filter((date) => date.number.substring(0, 4) == year)
      .filter(date => totalDay.indexOf(date))

    let datePrestamos = Array(month).fill(0);

    filterYearCurrent.forEach(date => {
      let index = Number(date.number.substring(5))
      datePrestamos[index - 1] = date.count
    })

    let areaChartData = {
      labels,
      datasets: [
        {
          label: "Prestamos",
          backgroundColor: "rgba(60,141,188,0.9)",
          borderColor: "rgba(60,141,188,0.8)",
          pointRadius: false,
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: datePrestamos, //[28, 48, 40, 19, 86, 27, 90]
        },
        // {
        //   label: "Devoluciones",
        //   backgroundColor: "rgba(210, 214, 222, 1)",
        //   borderColor: "rgba(210, 214, 222, 1)",
        //   pointRadius: false,
        //   pointColor: "rgba(210, 214, 222, 1)",
        //   pointStrokeColor: "#c1c7d1",
        //   pointHighlightFill: "#fff",
        //   pointHighlightStroke: "rgba(220,220,220,1)",
        //   data: [65, 59, 80, 81, 56, 55, 40],
        // },
      ],
    }

    let barChartCanvas = barChartElement.get(0).getContext("2d")

    
    let barChartData = jQuery.extend(true, {}, areaChartData)
    let temp0 = areaChartData.datasets[0]
    // let temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    barChartData.datasets[0] = temp0

    let barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false,
    }

    let barChart = new Chart(barChartCanvas, {
      type: "bar",
      data: barChartData,
      options: barChartOptions,
    })
  })



  // Conversion de los datatables
  $(".lazy__table").DataTable({
    language: {
      processing: "Procesando...",
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      emptyTable: "Ningún dato disponible en esta tabla",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      search: "Buscar:",
      infoThousands: ",",
      loadingRecords: "Cargando...",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior",
      },
      aria: {
        sortAscending: ": Activar para ordenar la columna de manera ascendente",
        sortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
        collection: "Colección",
        colvisRestore: "Restaurar visibilidad",
        copyKeys:
          "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
        copySuccess: {
          1: "Copiada 1 fila al portapapeles",
          _: "Copiadas %d fila al portapapeles",
        },
        copyTitle: "Copiar al portapapeles",
        csv: "CSV",
        excel: "Excel",
        pageLength: {
          "-1": "Mostrar todas las filas",
          _: "Mostrar %d filas",
        },
        pdf: "PDF",
        print: "Imprimir",
      },
      autoFill: {
        cancel: "Cancelar",
        fill: "Rellene todas las celdas con <i>%d</i>",
        fillHorizontal: "Rellenar celdas horizontalmente",
        fillVertical: "Rellenar celdas verticalmentemente",
      },
      decimal: ",",
      searchBuilder: {
        add: "Añadir condición",
        button: {
          0: "Constructor de búsqueda",
          _: "Constructor de búsqueda (%d)",
        },
        clearAll: "Borrar todo",
        condition: "Condición",
        conditions: {
          date: {
            after: "Despues",
            before: "Antes",
            between: "Entre",
            empty: "Vacío",
            equals: "Igual a",
            notBetween: "No entre",
            notEmpty: "No Vacio",
            not: "Diferente de",
          },
          number: {
            between: "Entre",
            empty: "Vacio",
            equals: "Igual a",
            gt: "Mayor a",
            gte: "Mayor o igual a",
            lt: "Menor que",
            lte: "Menor o igual que",
            notBetween: "No entre",
            notEmpty: "No vacío",
            not: "Diferente de",
          },
          string: {
            contains: "Contiene",
            empty: "Vacío",
            endsWith: "Termina en",
            equals: "Igual a",
            notEmpty: "No Vacio",
            startsWith: "Empieza con",
            not: "Diferente de",
          },
          array: {
            not: "Diferente de",
            equals: "Igual",
            empty: "Vacío",
            contains: "Contiene",
            notEmpty: "No Vacío",
            without: "Sin",
          },
        },
        data: "Data",
        deleteTitle: "Eliminar regla de filtrado",
        leftTitle: "Criterios anulados",
        logicAnd: "Y",
        logicOr: "O",
        rightTitle: "Criterios de sangría",
        title: {
          0: "Constructor de búsqueda",
          _: "Constructor de búsqueda (%d)",
        },
        value: "Valor",
      },
      searchPanes: {
        clearMessage: "Borrar todo",
        collapse: {
          0: "Paneles de búsqueda",
          _: "Paneles de búsqueda (%d)",
        },
        count: "{total}",
        countFiltered: "{shown} ({total})",
        emptyPanes: "Sin paneles de búsqueda",
        loadMessage: "Cargando paneles de búsqueda",
        title: "Filtros Activos - %d",
      },
      select: {
        cells: {
          1: "1 celda seleccionada",
          _: "%d celdas seleccionadas",
        },
        columns: {
          1: "1 columna seleccionada",
          _: "%d columnas seleccionadas",
        },
        rows: {
          1: "1 fila seleccionada",
          _: "%d filas seleccionadas",
        },
      },
      thousands: ".",
      datetime: {
        previous: "Anterior",
        next: "Proximo",
        hours: "Horas",
        minutes: "Minutos",
        seconds: "Segundos",
        unknown: "-",
        amPm: ["AM", "PM"],
        months: {
          0: "Enero",
          1: "Febrero",
          10: "Noviembre",
          11: "Diciembre",
          2: "Marzo",
          3: "Abril",
          4: "Mayo",
          5: "Junio",
          6: "Julio",
          7: "Agosto",
          8: "Septiembre",
          9: "Octubre",
        },
        weekdays: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      },
      editor: {
        close: "Cerrar",
        create: {
          button: "Nuevo",
          title: "Crear Nuevo Registro",
          submit: "Crear",
        },
        edit: {
          button: "Editar",
          title: "Editar Registro",
          submit: "Actualizar",
        },
        remove: {
          button: "Eliminar",
          title: "Eliminar Registro",
          submit: "Eliminar",
          confirm: {
            _: "¿Está seguro que desea eliminar %d filas?",
            1: "¿Está seguro que desea eliminar 1 fila?",
          },
        },
        error: {
          system:
            'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\/a&gt;).</a>',
        },
        multi: {
          title: "Múltiples Valores",
          info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
          restore: "Deshacer Cambios",
          noMulti:
            "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
        },
      },
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
    },
  })

  // Organizer Scripts
  const btnsViewOrganizer = Array.from(
    document.querySelectorAll("td .view-details-organizer")
  )
  const organizerDetails = document.getElementById("organizerDetails")
  const msgOrganizers = document.getElementById("msgOrganizers")

  const saveDatails = document.getElementById("saveDatails")

  btnsViewOrganizer.forEach((btn) => {
    btn.onclick = (e) => {
      let organizerId = btn.parentElement.parentElement.children[0].innerText

      saveDatails.classList.remove("d-none")
      saveDatails.classList.add("d-none")

      $.get("?controller=organizer&action=getById", { id: Number(organizerId) })
        .done((res) => {
          let { message } = JSON.parse(res)
          let organizer = message[0]

          let isActived = Boolean(Number(organizer.is_actived))

          organizerDetails.innerHTML = `
            <div class="col-md-3"><h5>Nombre:</h5></div>
            <div class="col-md-9"><span class="text-muted">${organizer.name_user}</span></div>
          
            <div class="col-md-3"><h5>Cuenta:</h5></div>
            <div class="col-md-9"><span class="text-muted">${organizer.email_user}</span></div>

            <div class="col-md-3"><h5>Estado:</h3></div>
          `

          let div = document.createElement("div")

          div.classList.add("col-md-9")
          div.style = "cursor: pointer"
          div.innerHTML = `
            <span class="text-muted"><span class="fas fa-circle fa-xs text-${
              isActived ? "success" : "danger"
            }"></span> ${isActived ? "Activo" : "Inactivo"}</span>
          `

          div.onclick = (e) => {
            isActived = !isActived

            div.innerHTML = `
              <span class="text-muted"><span class="fas fa-circle fa-xs text-${
                isActived ? "success" : "danger"
              }"></span> ${isActived ? "Activo" : "Inactivo"}</span>
            `

            saveDatails.classList.toggle("d-none")

            organizerInput.value = organizerId
            statusInput.value = Number(isActived)
          }

          organizerDetails.appendChild(div)
        })
        .fail((err) => console.error(err))

      $("#organizerModal").modal("show")
    }
  })

  if (msgOrganizers != null)
    msgOrganizers.onclick = (e) => msgOrganizers.classList.add("d-none")

  if (saveDatails != null) {
    saveDatails.onclick = (e) => {
      let data = {
        id: organizerInput.value,
        state: Number(statusInput.value),
      }

      $.post("?controller=organizer&action=updateState", data)
        .done((res) => {
          $("#organizerModal").modal("hide")

          msgOrganizers.classList.remove("d-none")
          msgOrganizers.innerHTML = `
            <span class="mr-2">Solicitud Aprobada con exito</span>
          `

          let rowsTableOrganizers = tableOrganizer.children[1].children

          for (const row of rowsTableOrganizers) {
            if (Number(row.children[0].innerText) === Number(data.id)) {
              row.children[3].innerHTML = `
                <span class="text-muted"><span class="fas fa-circle fa-xs text-${
                  data.state ? "success" : "danger"
                }"></span> ${data.state ? "Activo" : "Inactivo"}</span>
              `

              return
            }
          }
        })
        .fail((err) => console.error(err))
    }
  }

  // Notifications script
  const notificacions = document.getElementById("notificacions")
  if (notificacions != null) {
    $.get("?controller=events&action=get&query=new")
      .done((res) => {
        let eventsNews = JSON.parse(res).message

        if (typeof eventsNews[0].message === "string") {
          let div = document.createElement("div")
          div.className = "item"

          template = `
            <div class="dropdown-divider"></div>
            <p class="text-dark">
              <div class="small pl-4">Sin Notificaciones</div>
            </p>
          `

          div.innerHTML = template

          notificacions.appendChild(div)
          return
        }

        eventsNews.forEach((event) => {
          let div = document.createElement("div")
          div.className = "item"

          template = `
            <div class="dropdown-divider"></div>
            <a class="text-dark" href="?controller=client&action=viewbyid&id=${event.id_event}">
            <div class="small pl-4">Nuevo evento el ${event.date_realized_event}!</div>
            <p class="font-weight-bold px-4">${event.title_event}</p>
            </a>
          `

          div.innerHTML = template

          notificacions.appendChild(div)
        })
      })
      .fail((err) => console.log(err))

    $.get("?controller=events&action=get&query=current")
      .done((res) => {
        let eventsNews = JSON.parse(res).message

        if (typeof eventsNews[0].message === "string") return

        eventsNews.forEach((event) => {
          let div = document.createElement("div")
          div.className = "item"

          template = `
            <div class="dropdown-divider"></div>
            <a class="text-dark" href="?controller=client&action=viewbyid&id=${event.id_event}">
            <div class="small pl-4">${event.date_realized_event}!</div>
            <p class="font-weight-bold px-4">${event.title_event} es mañana.</p>
            </a>
          `

          div.innerHTML = template

          notificacions.appendChild(div)
        })
      })
      .fail((err) => console.log(err))
  }

  // Questions Scripts
  const btnAdd = document.getElementById("btnAdd")
  if (btnAdd != null) {
    btnAdd.onclick = function (e) {
      inputs = Array.from(
        document.querySelectorAll(".inputs-question .form-control")
      )

      inputs.forEach((input, i) => {
        let rawData = {}
        rawData[input.name] = input.value

        if (i % 2 === 0) {
          const user = document.getElementById("user")
          rawData[inputs[i + 1].name] = inputs[i + 1].value
          rawData["user"] = user.value
          $.post("?controller=question&action=crear", rawData).always((res) => {
            if (i + 2 >= inputs.length)
              window.location.href = "?controller=usuario"
          })
        }
      })
    }
  }

  const btnEdit = document.getElementById("btnEdit")
  if (btnEdit != null) {
    btnEdit.onclick = function (e) {
      inputs = Array.from(
        document.querySelectorAll(".inputs-question .form-control")
      )

      inputs.forEach((input, i) => {
        let rawData = {}
        rawData[input.name] = input.value

        if (i % 2 === 0) {
          const user = document.getElementById("user")
          rawData[inputs[i + 1].name] = inputs[i + 1].value
          rawData["user"] = user.value
          rawData["id"] = document.getElementById(i).value

          $.post("?controller=question&action=update", rawData).always(
            (res) => {
              if (i + 2 >= inputs.length)
                window.location.href = "?controller=usuario"
            }
          )
        }
      })
    }
  }
})
