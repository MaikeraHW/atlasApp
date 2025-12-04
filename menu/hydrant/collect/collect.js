document.addEventListener("DOMContentLoaded", function () {
  // Seleciona todos os botões de rádio com a classe 'choose'
  const radios = document.querySelectorAll('input.choose[type="radio"]')

  radios.forEach(function (radio) {
    radio.addEventListener("change", function () {
      const radioName = radio.name // Ex: 'hose1', 'hose2'
      const radioValue = radio.value // Ex: 'Sim' ou 'Não'
      const relatedInputId = radioName + "v" // Ex: 'hose1v'

      const relatedInput = document.getElementById(relatedInputId)

      if (!relatedInput) return // Se o input não existe, sai da função

      if (radioValue === "Sim") {
        relatedInput.readOnly = false
        relatedInput.required = true
      } else {
        relatedInput.value = ""
        relatedInput.readOnly = true
      }
    })
  })
})

function stringToDate(dateStr) {
  // Divide "MM/YYYY"
  let [month, year] = dateStr.split("/")
  return new Date(year, month - 1) // cria data com dia 1 automaticamente
}

function aplicarFormatacao(input) {
  let hoje = new Date()
  let dataTexto = input.value.trim()

  // Limpa classes antigas
  input.classList.remove("vencido", "avencer", "valido")

  // Garante que o formato é MM/YYYY
  if (!/^\d{2}\/\d{4}$/.test(dataTexto)) return

  let data = stringToDate(dataTexto)

  // Pega mês e ano atuais
  let mesAtual = hoje.getMonth()
  let anoAtual = hoje.getFullYear()

  // Calcula diferença em meses entre a data e hoje
  let diffMeses = (data.getFullYear() - anoAtual) * 12 + (data.getMonth() - mesAtual)

  // Aplica classes conforme a diferença
  if (diffMeses < 0) {
    input.classList.add("vencido") // já passou
  } else if (diffMeses === 0) {
    input.classList.add("avencer") // vence neste mês
  } else {
    input.classList.add("valido") // válido para o próximo mês ou mais
  }
}

document.addEventListener("DOMContentLoaded", function () {
  let inputs = document.querySelectorAll(".data-vencimento")

  inputs.forEach(function (input) {
    aplicarFormatacao(input)

    input.addEventListener("input", function () {
      aplicarFormatacao(input)
    })
  })
})

$(".hoseinput").mask("00/0000")

setTimeout(() => {
  document.querySelector(".success-message")?.remove()
}, 3000)

window.history.replaceState({}, document.title, window.location.pathname)
