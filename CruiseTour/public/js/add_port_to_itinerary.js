const add_port = document.getElementById('add_port')

const itinerary = document.getElementById('itinerary')

const ports = document.getElementById('ports')

add_port.addEventListener('click' , (e) => {
    e.preventDefault()
    itinerary.value += ports.options[ports.selectedIndex].text + ' , '
})