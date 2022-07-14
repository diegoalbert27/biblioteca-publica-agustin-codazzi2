document.addEventListener("DOMContentLoaded", function () {
  const calendarEl = document.getElementById("calendar")

  function eventComponent({ date, title, place }) {
    let currentDate = new Date(date)
    let month = ("0" + (currentDate.getMonth() + 1)).slice(-2)
    return `
      <div class="mt-4 px-5 row">
        <div class="col-lg-1 font-weight-bold">
          <h1 class="mb-0">${currentDate.getUTCDate()}</h1>
        </div>
        <div class="col-lg-2">
          <p class="mb-0 text-secondary font-weight-bold">Fecha:</p>
          <h6 class="mt-0 font-weight-bold">${
            currentDate.getFullYear() + "-" + month
          }</h6>
        </div>
        <div class="col">
          <h5 class="mt-0 font-weight-bold">${title}</h5>
          <p>${place}</p>
        </div>
      </div>
      <hr>
    `
  }

  if (calendarEl != undefined) {
    $.get("?controller=events&action=get")
      .done((res) => {
        let rawData = JSON.parse(res)
        let events = rawData.message.map((event) => ({
          title: event.title_event,
          start: event.date_realized_event,
        }))

        let calendar = new FullCalendar.Calendar(calendarEl, {
          locale: 'es',
          initialView: "dayGridMonth",
          headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
          },
          dateClick: function (e) {
            let dateCurrent = e.dateStr
            let templates = ""
            clickedDateValue = rawData.message
              .filter((event) => event.date_realized_event === dateCurrent)
              .map((event) => ({
                date: event.date_realized_event,
                title: event.title_event,
                place: event.place_event,
              }))
              .forEach((event) => {
                let component = eventComponent(event)
                templates += component
              })

            containerEventCurrent.innerHTML = templates
            containerEventCurrent.classList.remove("d-none")
          },
          events,
        })

        calendar.render()
      })
      .fail((err) => console.log(err))
  }
})
