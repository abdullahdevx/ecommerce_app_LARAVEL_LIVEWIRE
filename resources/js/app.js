import './bootstrap';
// import Alpine from 'alpinejs'

// window.Alpine = Alpine
// Alpine.start()



// document.addEventListener('livewire:navigated', () => {
//     Livewire.dispatch('navigated');
// })

window.addEventListener('popstate', function (event) {
    window.location.reload();
});


// window.addEventListener("popstate", function (event) { 
//     window.location.reload();
// });
