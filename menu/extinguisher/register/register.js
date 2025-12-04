document.addEventListener("DOMContentLoaded", function () {
  const dateInput = document.getElementById("valdate")

  // Get today's date
  const today = new Date()

  // Format today's date to YYYY-MM-DD for the min attribute
  const year = today.getFullYear()
  const month = String(today.getMonth() + 1).padStart(2, "0") // Months are 0-indexed
  const day = String(today.getDate()).padStart(2, "0")

  const formattedToday = `${year}-${month}-${day}`

  // Set the min attribute to today's date
  dateInput.min = formattedToday
})

document.addEventListener("DOMContentLoaded", function () {
  const dateInput = document.getElementById("valcildate")

  // Get today's date
  const today = new Date()

  // Format today's date to YYYY-MM-DD for the min attribute
  const year = today.getFullYear()
  const month = String(today.getMonth() + 1).padStart(2, "0") // Months are 0-indexed
  const day = String(today.getDate()).padStart(2, "0")

  const formattedToday = `${year}-${month}-${day}`

  // Set the min attribute to today's date
  dateInput.min = formattedToday
})

window.history.replaceState({}, document.title, window.location.pathname)
