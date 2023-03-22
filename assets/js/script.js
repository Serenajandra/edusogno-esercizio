
function validaRegistration(form) {
    // Verifico se il nome è stato inserito
    if (form.name.value == "") {
        alert("Inserisci il tuo nome");
        form.name.focus();
        return false;
    }
    
    // Verifico se il cognome è stato inserito
    if (form.surname.value == "") {
        alert("Inserisci il tuo cognome");
        form.surname.focus();
        return false;
    }
    
    // Verifico se l'email è stata inserita correttamente
    const email = form.email.value;
    const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        alert("Inserisci un indirizzo email valido");
        form.email.focus();
        return false;
    }

    // Verifico se la password è stata inserita correttamente
    if (form.password.value == "") {
        alert("Inserisci la tua password");
        form.password.focus();
        return false;
    }

    
    // Tutti i dati sono stati validati con successo
    return true;
};


function validaLogin(form) {
    
    // Verifico se l'email è stata inserita correttamente
    const email = form.email.value;
    const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        alert("Inserisci un indirizzo email valido");
        form.email.focus();
        return false;
    }

    // Verifico se la password è stata inserita correttamente
    if (form.password.value == "") {
        alert("Inserisci la tua password");
        form.password.focus();
        return false;
    }
    
    // Tutti i dati sono stati validati con successo
    return true;
}

